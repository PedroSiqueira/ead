<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicacoesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('publicacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->unsignedInteger('disciplina_id');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
            $table->unsignedInteger('pai')->nullable();
            $table->foreign('pai')->references('id')->on('publicacoes');
            $table->tinyInteger('tipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('publicacoes');
    }

}
