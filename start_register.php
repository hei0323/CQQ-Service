<?php
namespace think;

// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');
// 加载基础文件
require __DIR__ . '/thinkphp/base.php';

// 执行应用并响应
Container::get('app')->path(APP_PATH)->bind('service/WinRegister/index')->run();