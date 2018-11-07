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

Route::get('/disciplina/ler/{disciplina_id}/{publicacao_id?}', 'DisciplinaController@ler');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verificaMail');

Route::middleware(['auth'])->group(function () {
    Route::get('/disciplinas', 'DisciplinaController@lerTodas');
    Route::get('/disciplina/matricular/{disciplina_id}', 'DisciplinaController@matricular');
});

Route::middleware(['participante'])->group(function () {
    Route::get('/disciplina/participantes/{disciplina_id}', 'DisciplinaController@participantes');
    Route::post('/tarefa/entregar', 'PublicacaoController@entregarTarefa');
});

Route::middleware(['professor'])->group(function () {
    Route::view('/disciplina/novo', 'disciplina.disciplina_formulario');
    Route::post('/disciplina/criar', 'DisciplinaController@criar');
    Route::get('/disciplina/editar/{id}', 'DisciplinaController@editar');
    Route::post('/disciplina/salvar/{id}', 'DisciplinaController@salvar');
//   Route::get('/disciplina/remover/{id}', 'DisciplinaController@remover');
    Route::get('/aceitar/{userID}/{disciplina_id}', 'DisciplinaController@aceitar');
    Route::get('/aceitartodos/{disciplina_id}', 'DisciplinaController@aceitartodos');

    Route::get('/secao/novo/{disciplina_id}/{publicacao_id?}', 'PublicacaoController@novaSecao');
    Route::post('/secao/criar', 'PublicacaoController@criarSecao');
    Route::post('/secao/salvar/{id}', 'PublicacaoController@salvarSecao');
    Route::get('/secao/editar/{id}', 'PublicacaoController@editarSecao');
//    Route::get('/secao/remover/{id}', 'PublicacaoController@removerSecao');

    Route::get('/postagem/novo/{disciplina_id}/{publicacao_id?}', 'PublicacaoController@novaPostagem');
    Route::post('/postagem/criar', 'PublicacaoController@criarPostagem');
    Route::post('/postagem/salvar/{id}', 'PublicacaoController@salvarPostagem');
    Route::get('/postagem/editar/{id}', 'PublicacaoController@editarPostagem');
//    Route::get('/postagem/remover/{id}', 'PublicacaoController@removerPostagem');

    Route::get('/tarefa/novo/{disciplina_id}/{publicacao_id?}', 'PublicacaoController@novaTarefa');
    Route::post('/tarefa/criar', 'PublicacaoController@criarTarefa');
    Route::post('/tarefa/salvar/{id}', 'PublicacaoController@salvarTarefa');
    Route::get('/tarefa/editar/{id}', 'PublicacaoController@editarTarefa');
//    Route::get('/tarefa/remover/{id}', 'PublicacaoController@removerTarefa');
    Route::get('/tarefa/baixar/{disciplina_id}/{tarefa_id}', 'PublicacaoController@baixarTarefa');
});
