<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

}
