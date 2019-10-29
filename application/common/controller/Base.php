<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2019/10/27
 * Time: 19:04
 */

namespace app\common\controller;


use think\App;
use think\Controller;

class Base extends Controller
{
    public function __construct(App $app = null)
    {
        parent::__construct($app);
    }
}