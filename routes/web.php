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

    Route::get('/secao/novo/{disciplina_id}/{publicacao_id?}', 'PublicacaoController@novaSecao');
    Route::post('/secao/criar', 'PublicacaoController@criarSecao');
    Route::post('/secao/salvar/{id}', 'PublicacaoController@salvarSecao');
    Route::get('/secao/editar/{id}', 'PublicacaoController@editarSecao');
//    Route::get('/secao/remover/{id}', 'PublicacaoController@removerSecao');

    Route::view('/publicacao/novo/{id}', 'publicacao.publicacao_formulario');
    Route::post('/publicacao/criar', 'PublicacaoController@criarPublicacao');
    Route::post('/publicacao/salvar/{id}', 'PublicacaoController@salvarPublicacao');
    Route::get('/publicacao/editar/{id}', 'PublicacaoController@editarPublicacao');
//    Route::get('/publicacao/remover/{id}', 'PublicacaoController@removerPublicacao');

    Route::view('/tarefa/novo/{id}', 'publicacao.tarefa_formulario');
    Route::post('/tarefa/criar', 'PublicacaoController@criarTarefa');
    Route::post('/tarefa/salvar/{id}', 'PublicacaoController@salvarTarefa');
    Route::get('/tarefa/editar/{id}', 'PublicacaoController@editarTarefa');
//    Route::get('/tarefa/remover/{id}', 'PublicacaoController@removerTarefa');
});
