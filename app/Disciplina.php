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
        'nome', 'descricao', 'inicio', 'termino',
    ];

    /**
     * o professor da disciplina
     */
    public function professor() {
        return $this->belongsToMany('App\User')->wherePivot('tipo', Tipo::PROFESSOR)->first();
    }

    /**
     * todos os inscritos na disciplina (professor e alunos)
     */
    public function users() {
        return $this->belongsToMany('App\User');
    }

    public function novasInscricoes() {
        return \App\DisciplinaUser::where('tipo', \App\Tipo::ALUNO_INSCRITO)->where('disciplina_id', $this->id)->first() != null;
    }

}
