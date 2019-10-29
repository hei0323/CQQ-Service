<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2019/10/27
 * Time: 19:08
 */

namespace app\common\controller;


use GatewayClient\Gateway;
use think\App;

class ChatBase extends Base
{
    public function __construct(App $app = null)
    {
        parent::__construct($app);
    }
}