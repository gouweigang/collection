<?php

namespace app\admin\controller;

use think\Controller;
use think\Session;

class Base extends Controller
{
    //
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub

        if (!Session('id')){
            $this->redirect('login/index');
        }
    }
}
