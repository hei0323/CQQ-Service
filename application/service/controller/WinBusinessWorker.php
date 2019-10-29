<?php

namespace app\service\controller;

use GatewayWorker\BusinessWorker;
use Workerman\Worker;

class WinBusinessWorker
{
    public function index()
    {
        // bussinessWorker 进程
        $worker = new BusinessWorker();
        // worker名称
        $worker->name = 'ChatBusinessWorker';
        // bussinessWorker进程数量
        $worker->count = 4;
        // 服务注册地址
        $worker->registerAddress = '127.0.0.1:1236';
        $worker->eventHandler = 'app\service\controller\ChatEvents';
        // 如果不是在根目录启动，则运行runAll方法
        if(!defined('GLOBAL_START'))
        {
            Worker::runAll();
        }
    }
}
