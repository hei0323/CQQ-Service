<?php
namespace app\service\controller;

use GatewayWorker\BusinessWorker;
use GatewayWorker\Gateway;
use GatewayWorker\Register;
use Workerman\Worker;

class LinuxWorkman
{
    public function index()
    {
        // register 服务必须是text协议
        $sockName = config('register.protocol').'://'.config('register.ip').':'.config('register.port');
        $register = new Register($sockName);

        // gateway 进程
        $sockName = config('gateway.protocol').'://'.config('gateway.ip').':'.config('gateway.port');
        $gateway = new Gateway($sockName);
        $gateway->name = config('gateway.name');
        $gateway->count = config('gateway.count');
        $gateway->lanIp = config('gateway.lanIp');
        $gateway->startPort = config('gateway.startPort');
        $gateway->pingInterval = config('gateway.pingInterval');
        $gateway->pingNotResponseLimit = config('gateway.pingNotResponseLimit');
        $gateway->pingData = config('gateway.pingData');
        $gateway->registerAddress = config('register.registerAddress').':'.config('register.port');

        // bussinessWorker 进程
        $worker = new BusinessWorker();
        $worker->name = config('worker.name');
        $worker->count = config('worker.count');
        $worker->registerAddress = config('register.registerAddress').':'.config('register.port');
        $worker->eventHandler = config('worker.eventHandler');

        //设置WorkerMan进程的pid文件路径
        Worker::$pidFile = config('worker.pidFile');

        //运行所有Worker;
        Worker::runAll();
    }
}
