<?php


namespace app\facade;


use think\Facade;

/**
 * Class Rbac
 * @package app\facade
 *
 * @method string createTable(string $db) static 生成所需的数据表
 * @method string setDb(string $db) static 获取银行卡名称
 * @method Permission createPermission(array $data) static 创建权限
 * @method Permission editPermission(array $data,null $id) static 修改权限数据(版本兼容暂时保留建议使用createPermission方法)
 * @method bool delPermission(int $id) static 根据主键删除权限(支持多主键用数组的方式传入)
 * @method bool delPermissionBatch(string $condition) static 根据条件删除权限条件请参考tp5 where条件的写法
 * @method array|\PDOStatement|string|\think\Collection|\think\Model|null getPermission(string $condition) static 根据主键/标准条件来查询权限
 * @method PermissionCategory savePermissionCategory(array $data) static 编辑权限分组
 * @method bool delPermissionCategory(int $id) static 根据主键删除权限分组(支持多主键用数组的方式传入)
 * @method array|\PDOStatement|string|\think\Collection|\think\Model|null getPermissionCategory(string $where) static 获取权限分组
 * @method Role createRole(array $data,string $permissionIds) static 编辑角色
 */
class Rbac extends Facade
{
    protected static function getFacadeClass()
    {
        return '\gmars\rbac\Rbac';
    }
}