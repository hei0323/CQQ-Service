<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2019/11/5
 * Time: 23:52
 */

namespace app\api\controller\event;


class Goods
{
    public function get($id){
        return '成功获取ID是'.$id.'的商品！';
    }
}