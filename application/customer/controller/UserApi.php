<?php

namespace app\customer\controller;

use app\common\controller\GateWayClient;
use think\Controller;
use think\Request;

class UserApi extends Controller
{
    /**
     * 广播用户登录信息
     *
     * @return \think\Response
     */
    public function broadcast()
    {
        $clientId = $this->request->param('client_id');

        GateWayClient::sendToAll('用户'.$clientId.'进入系统！');
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $clientId = $this->request->param('client_id');

        GateWayClient::sendToAll('用户'.$clientId.'进入系统！');

        return [$clientId];
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
