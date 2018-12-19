<?php

namespace app\home\controller;

use think\Controller;
use think\Request;

class SeckillController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //判断是否登录
        $back_url = "/home/seckill/index";

        \think\Hook::listen('user_login',$back_url);

        //连接redis'
        $redis = get_redis_obj(9);
        //将set集合中秒杀数据取出来
        $goods_ids = $redis->smembers(config('goods_key'));

       //根据$goods_ids 获得全部秒杀商品的基本信息
        $goodsinfos = [];
        foreach ($goods_ids as $key => $id)
        {
            $goodsinfos[$key] = unserialize($redis->get(config('base_key').$id));
            $goodsinfos[$key]['goods_number_seckill'] = $redis->get(config('number_key').$id);
        }

        //传递秒杀商品信息
        $this->assign('goodsinfos',$goodsinfos);


        return $this->fetch();
    }

    public function shop($goods_id)
    {
        //判断是否登录
        $back_url = "/home/seckill/index";

        \think\Hook::listen('user_login',$back_url);

        //实例化redis
        $redis = get_redis_obj(9);

        //对于key 进行递减操作
        $num = $redis -> decr(config('number_key').$goods_id);

        //判断 剩余库存是否有效
        if($num>=0)
        {
            //枪购东西
            $user_id = session('user_id');

            $redis->lPush(config('success_key').$goods_id,$user_id);
            echo "商品秒杀成功";
        }else{
            //抢购失败
            $redis->incr(config('number_key').$goods_id);
            exit('商品秒杀失败');
        }
    }


}
