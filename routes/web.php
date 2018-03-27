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

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group( function () {
    Route::get('/adm/usuario',['as'=>'adm.usuario.inicio','uses'=>'UsuarioController@index']);
    Route::get('/adm/usuario/cadastro',['as'=>'adm.usuario.cadastro','uses'=>'UsuarioController@cadastro']);
    Route::post('/adm/usuario/salvar',['as'=>'adm.usuario.salvar','uses'=>'UsuarioController@salvar']);
    Route::get('/adm/usuario/excluir/{id}',['as'=>'adm.usuario.excluir','uses'=>'UsuarioController@excluir']);
    /*Fim rotas Usuários*/

    /*Rotas Cidades*/
    Route::get('/adm/cidade',['as'=>'adm.cidade.inicio','uses'=>'CidadeController@index']);
    Route::get('/adm/cidade/cadastro',['as'=>'adm.cidade.cadastro','uses'=>'CidadeController@cadastro']);
    Route::post('/adm/cidade/salvar',['as'=>'adm.cidade.salvar','uses'=>'CidadeController@salvar']);
    Route::get('/adm/cidade/excluir/{id}',['as'=>'adm.cidade.excluir','uses'=>'CidadeController@excluir']);
    /*Fim rotas Cidades*/

    /*Rotas Setor*/
    Route::get('/adm/setor',['as'=>'adm.setor.inicio','uses'=>'SetoreController@index']);
    Route::get('/adm/setor/cadastro',['as'=>'adm.setor.cadastro','uses'=>'SetoreController@cadastro']);
    Route::post('/adm/setor/salvar',['as'=>'adm.setor.salvar','uses'=>'SetoreController@salvar']);
    Route::get('/adm/setor/excluir/{id}',['as'=>'adm.setor.excluir','uses'=>'SetoreController@excluir']);
    Route::post('/adm/setor/consulta', 'SetoreController@consulta');
    /*Fim rotas Setor*/

    /*Rotas CI*/
    Route::get('/adm/ci',['as'=>'adm.ci.inicio','uses'=>'CiController@index']);
    Route::get('/adm/ci/cadastro',['as'=>'adm.ci.cadastro','uses'=>'CiController@cadastro']);
    Route::post('/adm/ci/salvar',['as'=>'adm.ci.salvar','uses'=>'CiController@salvar']);
    Route::get('/adm/ci/excluir/{id}',['as'=>'adm.ci.excluir','uses'=>'CiController@excluir']);
    /*Fim rotas Ci*/

    /*Rotas Dashboard*/
    Route::get('/adm/dashboard',['as'=>'adm.dashboard.inicio','uses'=>'DashboardController@index']);
    /*Fim rotas Dashboard*/
});
