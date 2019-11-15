<?php
/**
 * Created by PhpStorm.
 * User: ZDYTYF
 * Date: 2019/11/15
 * Time: 15:51
 */

namespace app\common\model;


use think\Model;

class AdminMenu extends Model
{
    /**
     * 菜单列表
     */
    public function indexOp(){
        //TODO 获取菜单列表
    }

    public function personalOp(){
        //查询所有菜单
        $menuModel = Model('admin_menu');
        $param['order'] = 'order_number asc';
        $menuData = $menuModel->getAll($param);
        $treeData = $this->treeData($menuData);

        //过滤出有权限的菜单
        if(empty($treeData)){
            $this->jsonReturn(0,$treeData);
        }
        $auth=new Auth();
        foreach ($treeData as $key => $value) {

            if ($auth->check($value['mca'],$_SESSION['admin_info']['admin_id'])) {
                foreach ($value['childs'] as $m => $n) {
                    if(!$auth->check($n['mca'],$_SESSION['admin_info']['admin_id'])){
                        unset($treeData[$key]['childs'][$m]);
                    }
                }
            }else{
                // 删除无权限的菜单
                unset($treeData[$key]);
            }
        }

        $this->jsonReturn(1,'success',array_values($treeData));

    }

    /**
     * 添加菜单
     */
    public function addOp(){

        //构造数据
        $menuData['pid'] = $_POST['pid'];
        $menuData['name'] = $_POST['name'];
        $menuData['mca'] = $_POST['mca'];
        $menuData['ico'] = $_POST['ico'];
        $menuData['order_number'] = $_POST['order_number'];

        //数据验证
        $adminMenuModel = Model('admin_menu');
        if(!$adminMenuModel->validate($menuData,'add')){
            $this->jsonReturn(1001,$adminMenuModel->error);
        }

        //数据插入
        $menuId = $adminMenuModel->insertData($menuData);
        if(!$menuId){
            $this->jsonReturn(1002,'新增失败！');
        }

    }

    /**
     * 修改菜单
     */
    public function editOp(){
        //构造数据
        $menuData['id'] = $_POST['id'];
        $menuData['pid'] = $_POST['pid'];
        $menuData['name'] = $_POST['name'];
        $menuData['mca'] = $_POST['mca'];
        $menuData['ico'] = $_POST['ico'];
        $menuData['order_number'] = $_POST['order_number'];

        //数据验证
        $adminMenuModel = Model('admin_menu');
        if(!$adminMenuModel->validate($menuData,'add')){
            $this->jsonReturn(1001,$adminMenuModel->error);
        }

        //更新数据
        $where = ['id','=',$menuData['id']];
        $result = $adminMenuModel->updateData($menuData,$where);
        if(!$result){
            $this->jsonReturn(1002,'新增失败！');
        }

    }

    /**
     * 删除菜单
     */
    public function delOp(){

        if(!is_numeric($_GET['id'])){
            $this->jsonReturn(0);
        }

        $where = ['id','=',$_GET['id']];
        $adminMenuModel = Model('admin_menu');
        $result = $adminMenuModel->delData($where);
        if(!$result){
            $this->jsonReturn(1002,'删除失败！');
        }
    }

    /**
     * 菜单排序
     */
    public function orderOp(){
        //TODO 给菜单排序 看前端设计图
    }

    //菜单一维数组转三维数组
    function treeData($data,$pid = 0){
        $result = array();
        foreach($data as $key=>$value){
            if($value['pid'] == $pid){
                unset($data[$key]);
                $value['childs'] = $this->treeData($data,$value['id']);
                $result[] = $value;
            }
        }
        return $result;
    }
}