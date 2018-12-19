<?php

namespace app\admin\model;

use think\Model;

class GoodsAttr extends Model
{

    //不需要维护create_time 和 updata_time 屏蔽自动维护时间
    protected $autoWriteTimestamp = false;
}
