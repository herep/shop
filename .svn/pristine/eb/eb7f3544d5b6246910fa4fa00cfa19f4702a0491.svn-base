<?php

namespace app\admin\controller;

use app\admin\model\Attribute;
use app\admin\model\Order;
use app\admin\model\OrderGoods;
use app\home\model\Consignee;
use think\Controller;
use think\Request;

class OrderController extends Controller
{

    public function index()
    {
        //获取订单，列表信息
        $orderinfos = Order::with('user')
            ->order('order_id desc')
            ->paginate(8);

        $this->assign('orderinfos',$orderinfos);

        //显示页码列表
        $page = $orderinfos->render();
        $this->assign('page',$page);

        return $this->fetch();
    }

    //订单详情 信息查询
    public function detail(Request $request,Order $order)
    {
        //查询出 订单信息
        $this->assign('order',$order);


        $cgninfo = unserialize($order->cgn_address);
        $this->assign('cgninfo',$cgninfo);

        //获取订单关联 商品信息
        $goodsinfos = OrderGoods::alias('og')
            ->join('__GOODS__ g','og.goods_id = g.goods_id')
            ->field('og.*,g.goods_name')
            ->where('og.order_id',$order->order_id)
            ->select();

        $this->assign('goodsinfos',$goodsinfos);

        //反序列化商品 单选属性信息
        foreach ($goodsinfos as $k => $v)
        {
            if (!empty($v->goods_attrs))
            {
                $goodsinfos[$k]['goods_attrs'] = unserialize($v->goods_attrs);
            }
        }

        //将所有 全部属性 信息 只要id和名称 并且要把 id和名称 组织效果为 一维数组
        $attrinfo = Attribute::column('attr_name','attr_id');
        $this->assign('attrinfo',$attrinfo);

        $this->assign('order_pay_method',['0'=>'支付宝','1'=>'微信','2'=>'银行卡']);

        return $this->fetch();




    }


}
