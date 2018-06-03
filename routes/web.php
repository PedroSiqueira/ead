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

Route::get('/disciplinas', 'DisciplinaController@lerTodas')->middleware('auth');

Route::get('/disciplina/ler/{id}', 'DisciplinaController@ler');

Route::get('/disciplina/matricular/{id}', 'DisciplinaController@matricular')->middleware('auth');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verificaMail');

Route::middleware(['professor'])->group(function () {
    Route::view('/disciplina/novo', 'disciplina.disciplina_formulario');
    Route::post('/disciplina/criar', 'DisciplinaController@criar');
    Route::get('/disciplina/editar/{id}', 'DisciplinaController@editar');
    Route::post('/disciplina/salvar/{id}', 'DisciplinaController@salvar');
//   Route::get('/disciplina/remover/{id}', 'DisciplinaController@remover');
});
