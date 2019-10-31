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

        $sockName = config('workman.register.protocol').'://'.config('workman.register.ip').':'.config('workman.register.port');
        $register = new Register($sockName);

        // gateway 进程
        $sockName = config('workman.gateway.protocol').'://'.config('workman.gateway.ip').':'.config('workman.gateway.port');
        $gateway = new Gateway($sockName);
        $gateway->name = config('workman.gateway.name');
        $gateway->count = config('workman.gateway.count');
        $gateway->lanIp = config('workman.gateway.lanIp');
        $gateway->startPort = config('workman.gateway.startPort');
        $gateway->pingInterval = config('workman.gateway.pingInterval');
        $gateway->pingNotResponseLimit = config('workman.gateway.pingNotResponseLimit');
        $gateway->pingData = config('workman.gateway.pingData');
        $gateway->registerAddress = config('workman.register.registerAddress').':'.config('workman.register.port');

        // bussinessWorker 进程
        $worker = new BusinessWorker();
        $worker->name = config('workman.worker.name');
        $worker->count = config('workman.worker.count');
        $worker->registerAddress = config('workman.register.registerAddress').':'.config('workman.register.port');
        $worker->eventHandler = config('workman.worker.eventHandler');

        //设置WorkerMan进程的pid文件路径
        Worker::$pidFile = config('workman.worker.pidFile');

        //运行所有Worker;
        Worker::runAll();
    }
}
