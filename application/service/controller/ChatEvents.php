<?php
/**
 * 聊天业务逻辑处理类
 */

namespace app\service\controller;

use GatewayWorker\Lib\Gateway;

class ChatEvents
{
    /**
     * businessWorker进程启动时触发
     */
    public static function onWorkerStart($businessWorker)
    {
        echo "WorkerStart\n";
    }

    /**
     * 当客户端连接上gateway进程时(TCP三次握手完毕时)触发的回调函数
     */
    public static function onConnect($client_id)
    {
        Gateway::sendToClient($client_id, json_encode(array(
            'type'      => 'init',
            'client_id' => $client_id
        )));
    }

    /**
     * 当客户端连接上gateway完成websocket握手时触发的回调函数
     */
    public static function onWebSocketConnect($client_id, $data)
    {
        //直接返回$client_id 由让web项目处理
        Gateway::sendToClient($client_id, json_encode(array(
            'type'      => 'init',
            'client_id' => $client_id
        )));
    }

    /**
     * 有消息时触发该方法
     */
    public static function onMessage($client_id, $message)
    {
        //不做任何业务逻辑
        Gateway::sendToClient($client_id, json_encode(array(
            'type'      => 'init',
            'client_id' => $client_id
        )));
    }

    /**
     * 当用户断开连接时触发的方法
     */
    public static function onClose($client_id)
    {
        // 广播 xxx logout
        //GateWay::sendToAll("client[$client_id] logout\n");
    }
}