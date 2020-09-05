<?php

namespace app\admin\model;

use think\Model;

class User extends Model
{
    //
    protected $pk= 'id';
    protected $table = 'tp_user';
    protected $autoWriteTimestamp = true;//自动写入时间戳
}
