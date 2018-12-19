<?php

namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Manager extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    /*****************控制器创建依赖注册*********************/
    public  static  function invoke()
    {
        $id = request()->param('mg_id');
        return self::get($id);
    }
}
