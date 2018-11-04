<?php

namespace App\Http\Controllers;

use App\Disciplina;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisciplinaController extends Controller {

    public function lerDisponiveis() {
        $dt = Carbon::now();
        $disciplinas = null;
        if (Auth::check()) {
            $matriculadas = Auth::user()->disciplinas->pluck('id')->toArray();
            $disciplinas = Disciplina::whereNotIn('id', $matriculadas)
                            ->where('termino', '>=', Carbon::now()->toDateString())
                            ->orderBy('termino', 'desc')->paginate(3);
        } else {
            $disciplinas = Disciplina::where('termino', '>=', Carbon::now()->toDateString())->orderBy('termino', 'desc')->paginate(3);
        }
        return view('welcome')->with('disciplinas', $disciplinas);
    }

    public function ler($disciplina_id, $publicacao_id = null) {
        $disciplina = Disciplina::find($disciplina_id);
        $tipo = \App\Tipo::NAO_AUTENTICADO;
        if (Auth::check()) {
            $tipo = \App\DisciplinaUser::select('tipo')->where('user_id', Auth::user()->id)->where('disciplina_id', $disciplina->id)->pluck('tipo')->first();
        }
        if ($tipo == \App\Tipo::ALUNO_MATRICULADO || $tipo == \App\Tipo::PROFESSOR) {
            $publicacao = \App\Publicacoes::find($publicacao_id);
            if ($publicacao != null && $publicacao->tipo == \App\TipoPublicacao::POSTAGEM) {
                $post = \App\Postagem::where('publicacao_id', $publicacao_id)->first();
                return view('publicacao.postagem', ['disciplina' => $disciplina, 'tipo' => $tipo, 'publicacao' => $publicacao, 'post' => $post]);
            } else {
                $publicacoes = \App\Publicacoes::where('pai', $publicacao_id)->where('disciplina_id', $disciplina_id)->get();
                return view('publicacao.secao', ['disciplina' => $disciplina, 'tipo' => $tipo, 'publicacoes' => $publicacoes, 'publicacao' => $publicacao]);
            }
        }
        return view('disciplina.disciplina_principal', ['disciplina' => $disciplina, 'tipo' => $tipo]);
    }

    public function matricular($id) {
        $du = new \App\DisciplinaUser;
        $du->disciplina_id = $id;
        $du->user_id = Auth::user()->id;
        $du->tipo = \App\Tipo::ALUNO_INSCRITO;
        $du->save();
        return redirect('/disciplina/ler/' . $id);
    }

    public function lerTodas() {
        $disciplinas = [];
        $disciplinasProfessor = [];
        $disciplinasAluno = [];
        if (Auth::check()) {
            $disciplinas = Auth::user()->disciplinas;
        }
        foreach ($disciplinas as $disciplina) {
            if ($disciplina->pivot->tipo == \App\Tipo::PROFESSOR) {
                $disciplinasProfessor[] = $disciplina;
            } else if ($disciplina->pivot->tipo == \App\Tipo::ALUNO_INSCRITO || $disciplina->pivot->tipo == \App\Tipo::ALUNO_MATRICULADO) {
                $disciplinasAluno[] = $disciplina;
            }
        }

        return view('disciplina.disciplinas', ['disciplinasAluno' => $disciplinasAluno, 'disciplinasProfessor' => $disciplinasProfessor]);
    }

    public function criar(Request $request) {
        $disciplina = Disciplina::create($request->all());
        $du = new \App\DisciplinaUser;
        $du->disciplina_id = $disciplina->id;
        $du->user_id = Auth::user()->id;
        $du->tipo = \App\Tipo::PROFESSOR;
        $du->save();
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

    public function participantes($discID) {
        $disciplina = Disciplina::find($discID);
        $matriculados = $disciplina->matriculados()->sortBy('name');
        $inscritos = $disciplina->professor()->id == Auth::user()->id ? $disciplina->inscritos() : null;
        $tipo = \App\DisciplinaUser::select('tipo')->where('user_id', Auth::user()->id)->where('disciplina_id', $disciplina->id)->pluck('tipo')->first();

        return view('disciplina.participantes', ['disciplina' => $disciplina, 'inscritos' => $inscritos, 'matriculados' => $matriculados, 'tipo' => $tipo]);
    }

    public function aceitar($userID, $discID) {
        $du = \App\DisciplinaUser::where('disciplina_id', $discID)->where('user_id', $userID)->first();
        $du->tipo = \App\Tipo::ALUNO_MATRICULADO;
        $du->save();
        return back()->withInput();
    }

    public function aceitartodos($discID) {
        \App\DisciplinaUser::where('disciplina_id', $discID)->where('tipo', \App\Tipo::ALUNO_INSCRITO)->update(['tipo' => \App\Tipo::ALUNO_MATRICULADO]);
        return back()->withInput();
    }

}
