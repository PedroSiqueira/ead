<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model {

    /**
     * Get the user that owns the disciplina.
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

}
