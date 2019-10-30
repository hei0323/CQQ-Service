<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2019/10/29
 * Time: 23:40
 */

namespace app\customer\controller;


use think\Controller;
use think\facade\Session;

class Login extends Controller
{
    public function index()
    {
        $clientId = $this->request->param('client_id');
        $content = $this->request->param('content');

        Session::set('clientId',$clientId);

        $this->result([],0,'ok');
    }
}