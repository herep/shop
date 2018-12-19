<?php

namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Type extends Model
{
    //软删除
    use SoftDelete;
    protected  $deletetime = 'delete_time';

    //依赖注入
    public static function invoke()
    {
        $id = request()->param('type_id');
        return self::get($id);
    }
}
