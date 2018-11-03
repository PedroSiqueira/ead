<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $pub->pai = $publicacao_id;
        $pub->save();
        $routeparam = $disciplina_id;
        if ($publicacao_id) {
            $routeparam .= '/' . $publicacao_id;
        }
        return redirect('/disciplina/ler/' . $routeparam);
    }

}
