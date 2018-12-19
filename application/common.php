<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use app\admin\model\Type;
use app\home\model\Category;
use mailer\tp5\Mailer;

// 获得全部可供使用的类型
function get_type_info()
{
    return Type::select();
}

/*
 * 通过 cat_id递归方法 获得全部上级分类 包括本身 id信息
 * 通过返回一结果的数组 元素个数 可以知道 分类级别
 *[1级分类id值]                    选取一级分类
 *[1级分类id值 2级分类id值]： 选取了 2级分类
 * ['一级分类id值，2级分类id值，3级分类id值]  选取3及分类
 * */

function getParentsCatIds($cat_id)
{
    //申明一个空数组 装值
    $result = [];

    //查询当前 $cat_id 所有值
   $category = Category::get($cat_id);

   //递归 方式获得 上级分类 id信息
    while($category)
    {
        //获取的 id  追加数组中
        $result[] = $category->cat_id;

        //查找上一级
        $cat_id = $category->cat_pid;
        //根据上一级 在查询数据
        $category = Category::get($cat_id);
    }
    //将 数组数据 进行一个颠倒处理
    return array_reverse($result);

}

//相册管理方法
function pics_deal($goods_id)
{
    //接受客户端图片
    $big_img = request() -> post('pics_big/a');
    $mid_img = request() -> post('pics_mid/a');

    //判断是否有新图片上传
    if(!empty($big_img) || !empty($mid_img))
    {
        //创建终极目录
        $path = './uploads/pics/'.date('Ymd');
        if (!file_exists($path))
        {
            mkdir($path,0777,true);
        }

        //遍历获取 旧目录
        foreach($big_img as $k=>$v)
        {
            //获取 大图 旧地址 ----  移动到新目录
            $old_bigpath = $big_img[$k];
            $new_bigpath = str_replace('picstmp','pics',$old_bigpath);
            rename($old_bigpath,$new_bigpath);

            //获取 中图  旧地址 -----移动到新目录
            $old_midpath = $mid_img[$k];
            $new_midpath = str_replace('picstmp','pics',$old_midpath);
            rename($old_midpath,$new_midpath);

            //整合数据 写入数据
            $shuju= [];

            $goodpics = new \app\admin\model\GoodsPics;
            $shuju['goods_id'] = $goods_id;
            $shuju['pics_big'] = $new_bigpath;
            $shuju['pics_mid'] = $new_midpath;

            $goodpics->save($shuju);

        }
    }


}

//查询权限 等级1
function getcat_levelA()
{
    $category = new Category();
    $levelA  = $category->where('cat_level','0')->select();
    return $levelA;
}
//查询权限 等级2
function getcat_levelB()
{
    $category = new Category();
    $levelB  = $category->where('cat_level','1')->select();
    return $levelB;
}
//查询权限 等级3
function getcat_levelC()
{
    $category = new Category();
    $levelC  = $category->where('cat_level','2')->select();
    return $levelC;
}

//连接redis
function get_redis_obj($dbindex=10)
{
    //实例化 扩展
    $redis = new Redis();
    //连接
    $redis->connect('192.168.16.149',6379);
    //设置密码
    $redis->auth('cpf');
    //选择数据库
    $redis->select($dbindex);

    //返回连接成功对象
    return $redis;
}

//发送邮件
function  set_register($user,$title,$html)
{
    //发送邮件
    $mailes = Mailer::instance();

    $mailes->to($user)
        ->subject($title)
        ->html($html)
        ->send();
}
