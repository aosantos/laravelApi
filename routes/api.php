<?php

//Route::post('auth', 'Auth\AuthApiController@authenticate');
//Route::get('me', 'Auth\AuthApiController@getAuthenticatedUser');
//Route::post('auth-refresh', 'Auth\AuthApiController@refreshToken');

Route::namespace('Api\v1')
    ->prefix('v1')
    //->middleware('auth:api')
    ->group(function () {
    Route::resource('cliente', 'ClienteController');
    Route::resource('pastel', 'PastelController');
    Route::resource('pedido', 'PedidoController');

});

