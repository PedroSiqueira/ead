<?php

namespace App\Http\Controllers;

use App\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisciplinaController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function ler($id) {
        $disciplina = Disciplina::find($id);
        return view('disciplina.disciplina', ['disciplina' => $disciplina]);
    }

    public function lerTodas() {
        $disciplinasProfessor = null;
        if (Auth::user()->professor) {
            $disciplinasProfessor = Auth::user()->disciplinas;
        }
        return view('disciplina.disciplinas', ['disciplinasProfessor' => $disciplinasProfessor]);
    }

    public function criar(Request $request) {
        $disciplina = Disciplina::create($request->all() + ['user_id' => Auth::user()->id]);
        return redirect('/disciplina/ler/' . $disciplina->id);
    }

    public function editar($id) {
        $disciplina = Disciplina::find($id);
        return view('disciplina.disciplina_formulario')->with('disciplina', $disciplina);
    }

    public function salvar(Request $request, $id) {
        $disciplina = Disciplina::find($id);
        $disciplina->nome = $request->input("nome");
        $disciplina->descricao = $request->input("descricao");
        $disciplina->inicio = $request->input("inicio");
        $disciplina->termino = $request->input("termino");
        $disciplina->save();
        return redirect('/disciplina/ler/' . $disciplina->id);
    }

}
