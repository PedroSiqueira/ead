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

Route::get('/disciplinas', 'DisciplinaController@readAll');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verificaMail');

//Route::middleware(['professor'])->group(function () {

//    Route::get('/noticia/update/{id}', 'NoticiaController@update');
//
//    Route::get('/noticia/delete/{id}', 'NoticiaController@delete');
//
//    Route::post('/noticia/save', 'NoticiaController@save');
//
//    Route::view('/noticia/novo', 'noticia_formulario');
//
//    Route::post('/noticia/add', 'NoticiaController@create');
//});
