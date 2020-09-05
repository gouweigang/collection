<?php

namespace app\admin\controller;

use app\admin\model\User;
use app\admin\validate\LoginVlidate;
use think\Controller;
use think\Request;
use think\captcha\Captcha;

class Login extends Controller
{
    //首页
    public function index()
    {
        return view();
    }
    //登录逻辑
    public function login(Request $request)
    {

        $data =$request->param();
        //规则验证
        $validate = new LoginVlidate();
        if (!$validate->check($data)){
            return ['code'=>0,'msg'=>$validate->getError()];
        }
        if(!captcha_check($data['code'])){
            // 验证失败
            return ['code'=>0,'msg'=>'验证码错误'];
        };
        //实例化模型
        $db = new User();
        //查用户数据
        $res = $db->where('username',$data['username'])->find();

        //判断用户名
        if (!$res){
            return ['code'=>0,'msg'=>'用户不存在'];
        }
        //判断密码
        if ($res['password']!=md5($data['password'])){
            return ['code'=>0,'msg'=>'密码错误'];
        }
        //存入Session
        Session('id',$res['id']);
        Session('username',$res['username']);
        //验证成功
        return ['code'=>1,'msg'=>'登录成功'];
    }
    //验证码
    public function verify()
    {
        $config =    [
            // 验证码字体大小
            'fontSize'    =>    30,
            // 验证码位数
            'length'      =>    4,
            // 关闭验证码杂点
            'useNoise'    =>    false,
            'useCurve'    =>    false,
        ];
        $captcha = new Captcha($config);
        return $captcha->entry();
    }

    //退出登录
    public function logout()
    {
        //清楚Session
        Session('id',null);
        Session('username',null);

        return ['code'=>1,'msg'=>'退出成功','url'=>url('Login/index')];
    }
}
