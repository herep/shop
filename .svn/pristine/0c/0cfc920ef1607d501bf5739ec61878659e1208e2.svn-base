<?php

namespace app\home\model;

use think\Model;
use traits\model\SoftDelete;

class User extends Model
{
    //软删除
    use SoftDelete;
    protected  $deleteTime = 'delete_time';

    //依赖注入
    public static function  invoke()
    {
        $id = request()->param('user_id');
        return self::get($id);
    }
}
