<?php

namespace app\admin\validate;

use think\Validate;

class RpwdValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'oldpwd'         => 'require|length:6,20',
        'newpwd'         => 'require|length:6,20',
        'confirmpwd'     => 'require|length:6,20',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'oldpwd.require'        => '旧密码不能为空',
        'oldpwd.length'         => '旧密码长度必须是6到20位',
        'newpwd.require'        => '新密码不能为空',
        'newpwd.length'         => '新密码长度必须是6到20位',
        'confirmpwd.require'    => '确认密码不能为空',
        'confirmpwd.length'     => '确认密码长度必须是6到20位',
    ];
}
