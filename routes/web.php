<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Auth::routes();

Route::get('/', 'DisciplinaController@lerDisponiveis');

Route::get('/disciplina/ler/{id}', 'DisciplinaController@ler');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verificaMail');

Route::middleware(['auth'])->group(function () {
    Route::get('/disciplinas', 'DisciplinaController@lerTodas');
    Route::get('/disciplina/matricular/{id}', 'DisciplinaController@matricular');
});

Route::middleware(['participante'])->group(function () {
    Route::get('/disciplina/participantes/{discID}', 'DisciplinaController@participantes');
});

Route::middleware(['professor'])->group(function () {
    Route::view('/disciplina/novo', 'disciplina.disciplina_formulario');
    Route::post('/disciplina/criar', 'DisciplinaController@criar');
    Route::get('/disciplina/editar/{id}', 'DisciplinaController@editar');
    Route::post('/disciplina/salvar/{id}', 'DisciplinaController@salvar');
//   Route::get('/disciplina/remover/{id}', 'DisciplinaController@remover');
    Route::get('/aceitar/{userID}/{discID}', 'DisciplinaController@aceitar');
    Route::get('/aceitartodos/{discID}', 'DisciplinaController@aceitartodos');
});
