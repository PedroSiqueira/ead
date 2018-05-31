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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/disciplinas', 'DisciplinaController@lerTodas');

Route::get('/disciplina/ler/{id}', 'DisciplinaController@ler');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verificaMail');

Route::middleware(['professor'])->group(function () {
    Route::view('/disciplina/novo', 'disciplina.disciplina_formulario');
    Route::post('/disciplina/criar', 'DisciplinaController@criar');
    Route::get('/disciplina/editar/{id}', 'DisciplinaController@editar');
    Route::post('/disciplina/salvar/{id}', 'DisciplinaController@salvar');
//   Route::get('/disciplina/remover/{id}', 'DisciplinaController@remover');
});
