<?php

namespace app\home\model;

use think\Model;
use traits\model\SoftDelete;

class Consignee extends Model
{
    use SoftDelete;
    private $deleteTime = 'delete_time';

    public static function invoke()
    {
        $id = request()->param('cgn_id');
        return self::get($id);

    }
}
