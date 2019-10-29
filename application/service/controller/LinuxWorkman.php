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
        $register = new Register('text://0.0.0.0:1236');

        // gateway 进程
        $gateway = new Gateway("Websocket://0.0.0.0:7272");
        $gateway->name = 'ChatGateway';
        $gateway->count = 4;
        $gateway->lanIp = '127.0.0.1';
        $gateway->startPort = 2300;
        $gateway->pingInterval = 55;
        $gateway->pingNotResponseLimit = 0;
        $gateway->pingData = '{"type":"ping"}';
        $gateway->registerAddress = '127.0.0.1:1236';

        // bussinessWorker 进程
        $worker = new BusinessWorker();
        $worker->name = 'ChatBusinessWorker';
        $worker->count = 4;
        $worker->registerAddress = '127.0.0.1:1236';
        $worker->eventHandler = 'app\service\controller\ChatEvents';

        //设置WorkerMan进程的pid文件路径
        Worker::$pidFile = '/var/run/workerman.pid';

        //运行所有Worker;
        Worker::runAll();
    }
}
