<?php

namespace app\home\model;

use think\Model;
use traits\model\SoftDelete;

class Category extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    //设置依赖注入
    public  static function invoke()
    {
        $id = request()->param('cat_id');
        return self::get($id);
    }

}
