<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2019/10/29
 * Time: 23:40
 */

namespace app\customer\controller;


use app\common\controller\GateWayClient;
use think\Controller;
use think\facade\Session;

class Message extends Controller
{
    public function send()
    {
        $nickname = $this->request->param('nickname');
        $content = $this->request->param('content');

        $returnData = [
            'type'=>'getMsg',
            'nickname'=>$nickname,
            'content'=>$content,
        ];
        $clientId = Session::get('clientId');
        $string = json_encode($returnData,JSON_UNESCAPED_UNICODE);
        GateWayClient::sendToAll($string,null,$clientId);
    }
}