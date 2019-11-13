<?php

namespace app\cjjweb\controller\v1;

use app\common\controller\GateWayClient;
use think\Controller;
use think\Request;

class Notice extends Controller
{
    /**
     * 显示 client_id与用户绑定资源 列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $allClientId = GateWayClient::getAllClientIdList();

        $this->result($allClientId,200,'ok');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        echo 'create';die;
    }

    /**
     * 发送通知到个人
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //接收参数
        $content = $request->param('content');
        $userId =  $request->param('userId');
        //发送通知给个人
        GateWayClient::sendToUid($userId,$content);

        $this->result([],200,'ok');

    }

    /**
     * 显示指定的资源
     *
     * @param  int  $userId
     * @return \think\Response
     */
    public function read($userId)
    {
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
        echo 'edit';die;
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
        echo 'update';die;
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
        echo 'delete';die;
    }
}
