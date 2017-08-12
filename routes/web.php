<?php

Route::get('/', function() {
    return '<h1>Aprendendo Laravel</h1>';
});

Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos/exibir/{id}', 'ProdutoController@exibir')->where('id', '[0-9]+');
Route::get('/produtos/novo', 'ProdutoController@novo');
Route::post('/produtos/adiciona', 'ProdutoController@adiciona');
Route::get('/produtos/json', 'ProdutoController@listaJson');
Route::get('/produtos/excluir/{id}', 'ProdutoController@excluir');

Route::get('home', 'HomeController@index');
Route::get('/login', 'LoginController@login');
//Route::get('/produtos/alterar/{id}', 'ProdutoController@alterar');
