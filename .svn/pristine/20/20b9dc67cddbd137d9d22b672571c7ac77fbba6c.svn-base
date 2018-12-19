<?php

namespace app\admin\model;

use think\Model;

use traits\model\SoftDelete;

class Category extends Model
{
    //进行软删除
     use SoftDelete;
     protected $deleteTime = 'delete_time';


     //依赖注入
    public static function invoke()
    {
       $id = request()->param('cate_id');
       return self::get($id);
    }

}
