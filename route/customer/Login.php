<?php
use think\facade\Route;

Route::group('customer', function() {
    Route::get('login', '@Login/index');
});