<?php

namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Goods extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    //书写依赖注入方法
    public  static  function invoke()
    {
        $id = request()->param('goods_id');
        return self::get($id);
    }
}
