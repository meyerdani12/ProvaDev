<?php

Route::prefix('produtos')->group(function () {
    Route::get('/', 'ProdutosController@index');
    Route::get('/{produto}', 'ProdutosController@show');
    Route::post('/', 'ProdutosController@store');
    Route::put('/{produto}', 'ProdutosController@update');
    Route::delete('/{produto}', 'ProdutosController@delete');
});

Route::prefix('vendas')->group(function () {
    Route::get('/', 'VendasController@index');
    Route::get('/{venda}', 'VendasController@show');
    Route::post('/', 'VendasController@store');
    Route::put('/{venda}', 'VendasController@update');
    Route::delete('/{venda}', 'VendasController@delete');
});
Route::prefix('vendaitens')->group(function () {
    Route::get('/', 'VendaItensController@index');
    Route::get('/{vendaitem}', 'VendaItensController@show');
    Route::post('/', 'VendaItensController@store');
    Route::delete('/{vendaitem}', 'VendaItensController@delete');
});

