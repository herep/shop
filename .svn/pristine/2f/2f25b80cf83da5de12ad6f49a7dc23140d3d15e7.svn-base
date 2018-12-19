<?php

namespace app\home\model;

use think\Model;
use traits\model\SoftDelete;

class Attribute extends Model
{
    //软删除
    use SoftDelete;
    protected $delecteTime = 'delete_time';

    //依赖注入
    public static function invoke()
    {
        $id = request()->param('attr_id');
        return self::get($id);
    }

    public function type()
    {
        return $this->hasOne('Type',"type_id","type_id");
    }

}
