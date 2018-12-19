<?php

namespace app\admin\model;

use think\Model;

use traits\model\SoftDelete;

class Role extends Model
{
    //使用trait
    use SoftDelete;
    //定义软删除
    protected $deleteTime = 'delete_time';

    public static  function invoke()
    {
        //依赖注入
        $id = request()->param('role_id');
        return self::get($id);
    }

}
