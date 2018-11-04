<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostagemsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('postagems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 4095);
            $table->unsignedInteger('publicacao_id');
            $table->foreign('publicacao_id')->references('id')->on('publicacoes');
            $table->string('anexo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('postagems');
    }

}
