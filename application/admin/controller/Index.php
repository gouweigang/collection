<?php

namespace app\admin\controller;

use think\Controller;
use think\Session;

class Index extends Base
{
    public function index()
    {
        return $this->fetch();
    }
}
