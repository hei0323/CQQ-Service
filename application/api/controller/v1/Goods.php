<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2019/11/5
 * Time: 22:40
 */

namespace app\api\controller\v1;

use think\facade\App;

class Goods
{
    public function listAll()
    {
        return json(['code'=>0,'msg'=>'success','data'=>'商品列表']);
    }

    public function get($id){

        $event = App::controller('api\controller\event\Goods','event');
        return $event->get($id);
    }
}