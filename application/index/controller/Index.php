<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    //服务大厅入口
    public function index()
    {
        return $this->fetch();
    }
}
