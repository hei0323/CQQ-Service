<?php
namespace app\admin\controller\v1;

use think\Controller;

class Index extends Controller
{
    public function index()
    {

        return $this->fetch();
    }

    public function text()
    {
        return $this->fetch();
    }
}
