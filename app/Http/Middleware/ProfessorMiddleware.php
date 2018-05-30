<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProfessorMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!Auth::check()) {//se nao estiver autenticado
            return redirect('/');
        }
        if (Auth::user()->professor != 1) {//se nao for professor
            return redirect('/');
        }
        return $next($request);
    }

}
