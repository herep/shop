<?php
namespace app\home\controller;

use app\home\model\Goods;
use think\Controller;

class IndexController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        //查询 促销商品
        $redis = get_redis_obj();
        $key = config('pro_key');
        $id = $redis->smembers($key);
        $is_pro = Goods::where('goods_id','in', $id)->select();
        $this->assign('is_pro',$is_pro);

        //查询 销量热卖商品
        $key = config('host_key');
        $id = $redis->zrevrange($key,0,-1);
        $hostsalenum = Goods::where('goods_id','in',$id)->select();
        $this->assign('hostsalenum',$hostsalenum);

        //查询 新更新商品
        $key = config('new_key');
        $id = $redis->lrange($key,0,-1);
        $newgoods = Goods::where('goods_id','in',$id)->select();
        $this->assign('newgoods',$newgoods);

       return $this->fetch();
    }

}
