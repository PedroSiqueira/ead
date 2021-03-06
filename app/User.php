<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * todas as disciplinas que participa
     * @return type
     */
    public function disciplinas() {
        return $this->belongsToMany('App\Disciplina')->withPivot('tipo');
    }

    public function professorDaDisciplina($id) {
        return DisciplinaUser::where('user_id', $this->id)->where('disciplina_id', $id)->where('tipo', Tipo::PROFESSOR)->first() != null;
    }

}
