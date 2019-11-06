<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    //设置中间件
    protected $middleware = ['Check'];
    //服务大厅入口
    public function index()
    {
        return $this->fetch();
    }
}
