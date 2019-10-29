<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2019/10/29
 * Time: 23:00
 */

namespace app\api\controller\v1;


use think\Controller;

class Push extends Controller
{
    //推送网页通知消息
    public function webMsg(){
        $this->result(array('uid'=>345646,'des'=>'推送网页消息成功'),0,'ok','json');
    }
}