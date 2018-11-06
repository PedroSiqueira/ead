<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model {

    public function users() {
        return $this->belongsToMany('App\User', 'tarefa_user', 'tarefa_id', 'user_id');
    }

}
