<?php
use think\facade\Route;

Route::group('api/v1', function() {
    Route::get('pushWebMsg', '@api/v1/Push/webMsg');
});


Route::group('api/v2', function() {
    Route::get('pushWebMsg', '@api/v1/Push/webMsg');
});