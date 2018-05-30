<?php

namespace App\Http\Controllers;

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

    public function readAll() {
        $disciplinasProfessor = null;
        if (Auth::user()->professor) {
            $disciplinasProfessor = Auth::user()->disciplinas;
        }
        return view('disciplinas', ['disciplinasProfessor' => $disciplinasProfessor]);
    }

}
