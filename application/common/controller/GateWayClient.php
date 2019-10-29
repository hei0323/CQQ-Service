<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2019/10/27
 * Time: 19:19
 */

namespace app\common\controller;


use GatewayClient\Gateway;

class GateWayClient extends Gateway
{
    public function __construct()
    {
        //初始化GatewayClient
        Gateway::$registerAddress = '127.0.0.1:1236';
    }
}