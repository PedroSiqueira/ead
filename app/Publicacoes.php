<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacoes extends Model {

    public function papi() {
        return $this->belongsTo('App\Publicacoes', 'pai');
    }

    public function tarefa() {
        return $this->hasOne('App\Tarefa', 'publicacao_id');
    }

    public function pais() {
        $pais = [];
        $p = $this->papi;
        while ($p != null) {
            array_unshift($pais, $p);
            $p = $p->papi;
        }
        return $pais;
    }

}
