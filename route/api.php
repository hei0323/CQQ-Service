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

Route::group('v1', function() {
    Route::group('cjjweb', function() {
        Route::resource('clientId', '@cjjweb/v1/ClientId');
        Route::resource('notice', '@cjjweb/v1/Notice');
    });
    //后台admin路由
    Route::group('backend', function() {
        Route::resource('permissionCate', '@admin/v1/PermissionCategory');
        Route::resource('permission', '@admin/v1/Permission');
        Route::resource('admin', '@admin/v1/Admin');
        Route::resource('role', '@admin/v1/Role');
        Route::resource('menu', '@admin/v1/AdminMenu');
    });
})->middleware(['Cors']);

Route::group('v2', function() {
    Route::group('cjjweb', function() {
        Route::resource('clientId', '@cjjweb/v2/ClientId');
        Route::resource('notice', '@cjjweb/v2/Notice');
    });
})->middleware(['Cors']);