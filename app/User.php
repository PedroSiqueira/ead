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
     * todas as disciplinas que é professor
     * @param type $order
     * @param type $direction
     * @return type
     */
    public function disciplinas($order = 'termino', $direction = 'desc') {
        return $this->hasMany('App\Disciplina')->orderBy($order, $direction);
    }

    /**
     * todas as disciplinas que é aluno
     * @return type
     */
    public function matriculas() {
        return $this->belongsToMany('App\Disciplina', 'disciplina_users');
    }

}
