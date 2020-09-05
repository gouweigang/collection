<?php

namespace app\admin\controller;

use app\admin\model\User;
use app\admin\validate\RpwdValidate;
use think\Request;
use think\facade\Cache;

class Rpwd extends Base
{
    /**
     *修改密码首页
     */
    public function index()
    {
       /* $value = session('id');
        Cache('uid',$value,3600);*/
        return view();
    }

    /**
     * 修改密码逻辑
     */
    public function save(Request $request)
    {
        //$id         =  Cache('id');
        $data       = $request->param();
        $validate   = new RpwdValidate();

        if (!$validate->check($data)){
            return ['code'=>0,'msg'=>$validate->getError()];
        }

        $db   = new User();
        $res  = $db->where('id',$id)->find();

        if ($res['password'] != md5($data['oldpwd'])){
            return ['code'=>0,'msg'=>'旧密码错误'];
        }
        if ($res['oldpwd'] != $data['confirmpwd']){
            return ['code'=>0,'msg'=>'两次密码不一致'];
        }
         //$result =
    }

}
