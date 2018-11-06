<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model {

    public function users() {
        return $this->belongsToMany('App\User', 'tarefa_user', 'tarefa_id', 'user_id')->withPivot('mensagem', 'anexo');
    }

    public function entrega($user_id) {
        return \App\TarefaUser::where('tarefa_id', $this->id)->where('user_id', $user_id)->first();
    }

}
