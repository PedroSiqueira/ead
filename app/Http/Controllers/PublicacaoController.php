<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublicacaoController extends Controller {

    public function novaSecao(Request $request, $disciplina_id, $publicacao_id = null) {
        return view('publicacao.secao_formulario', ['disciplina_id' => $disciplina_id, 'publicacao_id' => $publicacao_id]);
    }

    public function criarSecao(Request $request) {
        $disciplina_id = $request->input('disciplina_id');
        $publicacao_id = $request->input('publicacao_id');
        $pub = new \App\Publicacoes;
        $pub->titulo = $request->input('nome');
        $pub->tipo = \App\TipoPublicacao::SECAO;
        $pub->disciplina_id = $disciplina_id;
        $routeparam = $disciplina_id;
        if ($publicacao_id) {
            $pub->pai = $publicacao_id;
            $routeparam .= '/' . $publicacao_id;
        }
        $pub->save();
        return redirect('/disciplina/ler/' . $routeparam);
    }

    public function novaPostagem(Request $request, $disciplina_id, $publicacao_id = null) {
        return view('publicacao.postagem_formulario', ['disciplina_id' => $disciplina_id, 'publicacao_id' => $publicacao_id]);
    }

    public function criarPostagem(Request $request) {
        $disciplina_id = $request->input('disciplina_id');
        $publicacao_id = $request->input('publicacao_id');
        DB::transaction(function() use ($request, $disciplina_id, $publicacao_id) {
            $pub = new \App\Publicacoes;
            $pub->titulo = $request->input('nome');
            $pub->tipo = \App\TipoPublicacao::POSTAGEM;
            $pub->disciplina_id = $disciplina_id;
            $pub->pai = $publicacao_id;
            $pub->save();

            $post = new \App\Postagem;
            $post->descricao = $request->input('descricao');
            $post->publicacao_id = $pub->id;
            if ($request->hasFile('anexo') && $request->file('anexo')->isValid()) {
                $nome_arquivo = $pub->id . '_' . $request->file('anexo')->getClientOriginalName();
                $post->anexo = $request->file('anexo')->storeAs('public/disciplina' . $disciplina_id . '/postagens', $nome_arquivo);
            }

            $post->save();
        });

        $routeparam = $disciplina_id;
        if ($publicacao_id) {
            $routeparam .= '/' . $publicacao_id;
        }
        return redirect('/disciplina/ler/' . $routeparam);
    }

    public function novaTarefa(Request $request, $disciplina_id, $publicacao_id = null) {
        return view('publicacao.tarefa_formulario', ['disciplina_id' => $disciplina_id, 'publicacao_id' => $publicacao_id]);
    }

    public function criarTarefa(Request $request) {
        $disciplina_id = $request->input('disciplina_id');
        $publicacao_id = $request->input('publicacao_id');
        DB::transaction(function() use ($request, $disciplina_id, $publicacao_id) {
            $pub = new \App\Publicacoes;
            $pub->titulo = $request->input('nome');
            $pub->tipo = \App\TipoPublicacao::TAREFA;
            $pub->disciplina_id = $disciplina_id;
            $pub->pai = $publicacao_id;
            $pub->save();

            $tarefa = new \App\Tarefa;
            $tarefa->descricao = $request->input('descricao');
            $tarefa->publicacao_id = $pub->id;
            $tarefa->inicio = $request->input('inicio');
            $tarefa->termino = $request->input('termino');
//            $temp = $request->hasFile('anexo');
//            $temp = $request->file('anexo')->isValid();
//            $temp = $request->file('anexo')->getClientOriginalName();
            if ($request->hasFile('anexo') && $request->file('anexo')->isValid()) {
                $nome_arquivo = $pub->id . '_' . $request->file('anexo')->getClientOriginalName();
                $tarefa->anexo = $request->file('anexo')->storeAs('public/disciplina' . $disciplina_id . '/tarefas', $nome_arquivo);
            }

            $tarefa->save();
        });

        $routeparam = $disciplina_id;
        if ($publicacao_id) {
            $routeparam .= '/' . $publicacao_id;
        }
        return redirect('/disciplina/ler/' . $routeparam);
    }

    public function entregarTarefa(Request $request) {
        $entrega = \App\TarefaUser::where('tarefa_id', $request->input('tarefa_id'))->where('user_id', Auth::user()->id)->first();
        if (!$entrega) {
            $entrega = new \App\TarefaUser;
            $entrega->user_id = Auth::user()->id;
            $entrega->tarefa_id = $request->input('tarefa_id');
        }
        $entrega->mensagem = $request->input('mensagem');
//        $temp = $request->hasFile('anexo');
//        $temp = $request->file('anexo')->isValid();
//        $temp = $request->file('anexo')->getClientOriginalName();
        if ($request->hasFile('anexo') && $request->file('anexo')->isValid()) {
            $nome_arquivo = $request->file('anexo')->getClientOriginalName();
            if ($entrega->anexo) {//se tiver algum anexo, apaga do disco e salva outro
                Storage::delete($entrega->anexo);
            }

            $entrega->anexo = $request->file('anexo')->storeAs(
                    'public/disciplina' . $request->input('disciplina_id') . '/tarefa' . $entrega->tarefa_id . '/' . Auth::user()->name, $nome_arquivo);
        }
        $entrega->save();
        return redirect()->back()->with('status', ['success', 'Tarefa Entregue com Sucesso!']);
    }

    public function baixarTarefa(Request $request, $disciplina_id, $tarefa_id) {
        $tarefa = \App\Tarefa::find($tarefa_id);
        $entregas = $tarefa->users;
        $zip = new \ZipArchive();
        $zip_name = 'storage/disciplina' . $disciplina_id . '/tarefa' . $tarefa_id . '/download.zip';

        if ($zip->open($zip_name, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
            foreach ($entregas as $entrega) {
                $nome_arquivo = 'disciplina' . $disciplina_id . '/' . $entrega->name . '/' . basename(Storage::path($entrega->pivot->anexo));
                $temp = Storage::path($entrega->pivot->anexo);
                $temp = file_get_contents($temp);
                $zip->addFromString($nome_arquivo, $temp);
//                $zip->addFile(Storage::get($entrega->pivot->anexo), basename(Storage::path($entrega->pivot->anexo)));
            }
            $zip->close();
        }
        return Storage::download('public/disciplina' . $disciplina_id . '/tarefa' . $tarefa_id . '/download.zip');
    }

}
