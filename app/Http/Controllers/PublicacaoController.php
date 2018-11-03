<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicacaoController extends Controller {

    public function novaSecao(Request $request, $disciplina_id) {
        return view('publicacao.secao_formulario', ['disciplina_id' => $disciplina_id]);
    }

    public function criarSecao(Request $request) {
        $disciplina_id = $request->input('disciplina_id');
        $pub = new \App\Publicacoes;
        $pub->titulo = $request->input('nome');
        $pub->tipo = \App\TipoPublicacao::SECAO;
        $pub->save();
        return redirect('/disciplina/ler/' . $disciplina_id);
    }

}
