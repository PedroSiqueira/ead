<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 127)->unique(); //mudando o tamanho maximo para consertar o erro: Specified key was too long
            $table->string('password');
            $table->boolean('professor')->default(false);
            $table->string('token', 32); //para verificacao de conta com email
            $table->boolean('verified')->default(false); //para verificacao de conta com email
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
