<?php

namespace app\home\controller;

use app\home\model\Attribute;
use app\home\model\GoodsPics;
use think\Controller;
use think\Request;
use app\home\model\Category;
use app\home\model\Goods;

class GoodsController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request,Category $category)
    {
        //查询出 等级 的商品
        if($category->cat_level == '0')
        {
            //获取 第一等级分类商品信息
            $goodsinfo = Goods::where('cat_one_id',$category->cat_id)->select();
        }elseif($category->cat_level == '1'){
            //获取 等级2 下所有 商品
            $goodsinfo = Goods::where('cat_two_id',$category->cat_id)->select();
        }else{
            //获取等级3 自身所有商品数据
            $goodsinfo = Goods::where('cat_three_id',$category->cat_id)->select();

        }
        $this->assign('goodsinfo',$goodsinfo);
        return $this->fetch();
    }

    public function detail(Goods $goods)
    {

       $picsinfo = GoodsPics::where('goods_id',$goods->goods_id)->select();
       //传递相册到模型
      $this->assign('picsinfo',$picsinfo);

        //查询属性
        $attr_info = Attribute::where('type_id',$goods->type_id)->select();

        //将此时 商品数据属形反序列化
        $attrValue = unserialize($goods->goods_attrs);

        //将此时数据属性 拼接到 所有属性中
        foreach($attr_info as $k => $v)
        {
            $attr_info[$k]['values'] = $attrValue[$v->attr_id];
        }

       $this->assign('attr_info',$attr_info);




        $this->assign('goods',$goods);
        return $this->fetch();
    }




}
