<?php

namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Order extends Model
{
    //软删除
    use SoftDelete;
   protected $deleteTime = 'delete_time';

   public static  function invoke()
   {
       $id = request()->param('order_id');
       return self::get($id);
   }

   //关联模型 order-user
   public function user()
   {
       return $this->hasOne('User','user_id','user_id');
   }

}
