<?php
namespace app\customer\controller;


use app\common\controller\GateWayClient;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}
