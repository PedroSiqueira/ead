<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacoes extends Model {

    public function tarefa() {
        return $this->hasOne('App\Tarefa', 'publicacao_id');
    }

}
