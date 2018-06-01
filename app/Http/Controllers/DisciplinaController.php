<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\DisciplinaUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisciplinaController extends Controller {

    public function lerDisponiveis() {
        $dt = Carbon::now();
        $disciplinas = null;
        if (Auth::check()) {
            $matriculadas = DisciplinaUser::select('disciplina_id')->where('user_id', Auth::user()->id)->get();
            $disciplinas = Disciplina::whereNotIn('id', $matriculadas)
                            ->where('user_id', '<>', Auth::user()->id)
                            ->where('termino', '>=', Carbon::now()->toDateString())
                            ->orderBy('termino', 'desc')->paginate(3);
        } else {
            $disciplinas = Disciplina::where('termino', '>=', Carbon::now()->toDateString())->orderBy('termino', 'desc')->paginate(3);
        }
        return view('welcome')->with('disciplinas', $disciplinas);
    }

    public function ler($id) {
        $disciplina = Disciplina::find($id);
        $matricula = 0; //0=nao inscrito; 1=inscrito e não matriculado; 2=inscrito e matriculado
        if (Auth::check()) {
            if ($disciplina->user_id == Auth::user()->id) {
                $matricula = 2;
            }
            $matriculado = DisciplinaUser::select('matriculado')->where('user_id', Auth::user()->id)->where('disciplina_id', $disciplina->id)->first();
            if ($matriculado == null) {
                
            } else if (!$matricula) {
                $matricula = 1;
            } else {
                $matricula = 2;
            }
        }
        return view('disciplina.disciplina', ['disciplina' => $disciplina, 'matricula' => $matricula]);
    }

    public function matricular($id) {
        if (!Auth::check()) {
            return redirect('/login')->with('warning', 'Você precisa se autenticar no site antes de matricular em uma disciplina.');
        }
        $disciplina = Disciplina::find($id);
        $du = new DisciplinaUser;
        $du->disciplina_id = $disciplina->id;
        $du->user_id = Auth::user()->id;
        $du->created_at = Carbon::now();
        $du->save();
        return redirect('/disciplina/ler/' . $disciplina->id);
    }

    public function lerTodas() {
        $disciplinasAluno = null;
        $disciplinasProfessor = null;
        if (Auth::check()) {
            if (Auth::user()->professor) {
                $disciplinasProfessor = Auth::user()->disciplinas;
            }
            $disciplinasAluno = Auth::user()->matriculas;
        }

        return view('disciplina.disciplinas', ['disciplinasAluno' => $disciplinasAluno, 'disciplinasProfessor' => $disciplinasProfessor]);
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
