<?php
use think\facade\Route;

Route::group('api/v1', function() {
    Route::get('pushWebMsg', '@api/v1/Push/webMsg');
    Route::get('goodsList', 'api/v1.Goods/listAll');
    Route::get('goodsGet/:id', '@api/v1/Goods/get');
});

Route::group('api/v2', function() {
    Route::get('pushWebMsg', '@api/v2/Push/webMsg');
});

Route::group('cjjweb', function() {
    Route::group('v1', function() {
        Route::resource('clientId', '@cjjweb/v1/ClientId');
        Route::resource('notice', '@cjjweb/v1/Notice');
    });
    Route::group('v2', function() {
        Route::resource('clientId', '@cjjweb/v2/ClientId');
        Route::resource('notice', '@cjjweb/v2/Notice');
    });
})->middleware(['Cors']);