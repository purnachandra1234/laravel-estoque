<?php

Route::get('/', function() {
    return '<h1>Aprendendo Laravel</h1>';
});

Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos/exibir/{id}', 'ProdutoController@exibir')->where('id', '[0-9]+');
Route::get('/produtos/novo', 'ProdutoController@novo');
Route::get('/produtos/adiciona', ’ProdutoController@adiciona’);
