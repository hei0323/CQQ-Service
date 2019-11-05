<?php
use think\facade\Route;

Route::group('api/v1', function() {
    Route::get('pushWebMsg', '@api/v1/Push/webMsg');
    Route::get('goodsList', 'api/v1.Goods/listAll');
    Route::get('goodsGet/:id', '@api/v1/Goods/get');
});


Route::group('api/v2', function() {
    Route::get('pushWebMsg', '@api/v1/Push/webMsg');
});