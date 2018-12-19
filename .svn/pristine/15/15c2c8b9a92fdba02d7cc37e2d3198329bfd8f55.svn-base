<?php

namespace app\home\model;

use think\Model;
use traits\model\SoftDelete;

class Order extends Model
{
    use SoftDelete;
    private $deleteTime = 'delete_time';

    //依赖注入
    public static function invoke()
    {
        $id = request()->param('order_id');
        return self::get($id);
    }
}