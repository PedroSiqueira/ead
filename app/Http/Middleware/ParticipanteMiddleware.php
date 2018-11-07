<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ParticipanteMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!Auth::check()) {//se nao estiver autenticado
            return redirect('/')->with('status', ['danger', 'Autentique-se e matricule-se na disciplina antes!']);
        }
        $disciplina_id = $request->route('disciplina_id') ? $request->route('disciplina_id') : $request->input('disciplina_id');
        if (!\App\DisciplinaUser::where('user_id', Auth::user()->id)->where('disciplina_id', $disciplina_id)->first()) {//se nao for participante
            return redirect('/')->with('status', ['warning', 'Você não participa dessa matéria e não tem acesso a essa seção!']);
        }
        return $next($request);
    }

}
