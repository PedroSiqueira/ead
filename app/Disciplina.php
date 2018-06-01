<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'descricao', 'inicio', 'termino', 'user_id',
    ];

    /**
     * Get the user that owns the disciplina.
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * os alunos matriculados na disciplina
     */
    public function users() {
        return $this->belongsToMany('App\User');
    }

}
