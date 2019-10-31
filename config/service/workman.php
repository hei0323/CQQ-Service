<?php
return [
    'register'=>[
        'protocol'=>'text',
        'ip'=>'0.0.0.0',
        'port'=>'1236',
        'registerAddress'=>'127.0.0.1',
    ],
    'gateway'=>[
        'protocol' =>'Websocket',
        'ip' =>'0.0.0.0',
        'port' =>'7272',
        'name' => 'ChatGateway',
        'count' => 4,
        'lanIp' => '127.0.0.1',
        'startPort' => 2300,
        'daemonize' => false,
        'pingInterval' => 55,
        'pingNotResponseLimit' => 0,
        'pingData' => '{"type":"ping"}',
    ],
    'worker'=>[
        'name' => 'ChatBusinessWorker',
        'count' => 4,
        'eventHandler' => 'app\service\controller\ChatEvents',
        'pidFile'=> '/var/run/workerman.pid',
    ],
];