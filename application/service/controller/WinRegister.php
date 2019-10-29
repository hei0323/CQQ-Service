<?php

namespace app\service\controller;

use GatewayWorker\Register;
use Workerman\Worker;

class WinRegister
{
    public function index()
    {
        // register 服务必须是text协议
        $register = new Register('text://0.0.0.0:1236');
        // 如果不是在根目录启动，则运行runAll方法
        if(!defined('GLOBAL_START'))
        {
            Worker::runAll();
        }
    }
}
