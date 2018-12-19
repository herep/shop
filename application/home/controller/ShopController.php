<?php

namespace app\home\controller;

use app\home\model\Attribute;
use app\home\model\Consignee;
use app\home\model\Goods;
use app\home\model\Order;
use app\home\model\OrderGoods;
use think\Controller;
use think\Request;
use cart\DbCart;
use cart\SessionCart;

class ShopController extends Controller
{
    private  $cart = null;

    public function __construct()
    {
        //调用父类构造方法
        parent::__construct();

        //判断登录状态
        if (session('?username'))
        {

            //登录
            $this->cart = new DbCart();
        }else
        {
            //未登录
            $this->cart = new SessionCart();
        }
    }

    /***
       'cgoods_attr_uid'       =>'商品属性唯一uid',
        'cgoods_id'             =>  '商品id',
        'cgoods_name'           =>  '名称',
        'cgoods_price'          =>  '单价',
        'cgoods_number'         =>  '购买数量',
        'cccgoods_price_sum'    =>  '小计价格',
        'cgoods_attrs'          =>  '附加属性',
        'cgoods_logo'           =>  '商品图片'
     *
    购物车中，每个商品本身有商品uid，
    其是商品的信息做序列化并md5加密后的内容
    商品uid作用：区分同一个商品的不同属性组合情况
      ***/
    public function acc(Request $request,Goods $goods)
    {
       //获取 加入购物车 商品信息
        $shuju['cgoods_id'] = $goods->goods_id;
        $shuju['cgoods_name'] = $goods -> goods_name;
        $shuju['cgoods_price'] = $goods->goods_price;
        $shuju['cgoods_number'] = 1;
        $shuju['cgoods_price_sum'] = $goods->goods_price;
        $shuju['cgoods_logo']   = $goods->goods_logo;

        //商品属性
        $shuju['cgoods_attrs'] = $request->post('attr/a');

        $shuju['cgoods_attr_uid'] = md5(serialize($shuju));

        //加入购物车
        $this->cart->add($shuju);

        //进行重定向
        return $this->redirect('acc_show',['goods_id'=>$goods->goods_id]);
    }

    public function acc_show(Goods $goods)
    {
       $this->assign('goods',$goods);
        return $this->fetch();
    }

    public function showgoods()
    {
        //获取 购物车所有商品
        $cateinfo = $this->cart->getCartInfo();
        $this->assign('cateinfo',$cateinfo);

        //获取属性
        $attribute = Attribute::column('attr_name','attr_id');
        $this->assign('attribute',$attribute);


       //获取 商品数量和价格
        $many = $this->cart->getNumberPrice();
        $this->assign('many',$many);


      return $this->fetch();
    }

    //删除购物车
    public function del_goods(Request $request)
    {
        $id = $request->post('cgoods_uid');
        //删除
         $this->cart->del($id);

         $numberprice = $this->cart->getNumberPrice();
         return $numberprice;

    }

    //改变 购物车数量
    public function changenum(Request $request)
    {
        //接受数据
       $cgoods_uid = $request->post('id');
       $num        = $request->post('num');

       $this->cart->modifynum($cgoods_uid,$num);

       //获得新的 数量 总价格
        $numberprice = $this->cart->getNumberPrice();
        return $numberprice;


    }

    public function jiesuan()
    {
        //定义跳转
        $back_url = "/home/shop/jiesuan";
        //监听标签
        \think\Hook::listen('user_login',$back_url);

        //判断 session session购物车对象
        $sessioncart = new SessionCart();
        //获取session 购物车信息
        $sessionInfo = $sessioncart-> getCartInfo();

        if (!empty($sessionInfo))
        {
            //遍历数据
            foreach ($sessionInfo as $v)
            {
                //添加商品到数据库
                $this->cart->add($v);
            }
            //清除session 购物车信息
            $sessioncart -> delall();
        }

        //查询出对应登录 收货地址
        $user_id = session('user_id');
        $consignee = Consignee::where('user_id',$user_id)->select();
        $this->assign('consignee',$consignee);

        //获取 购物车所有商品信息 购物车总价格 中数量cgninfos
        $cgninfos = $this->cart->getCartInfo();
        $numberprice = $this->cart->getNumberPrice();

        $this->assign('cgninfos',$cgninfos);
        $this->assign('numberprice',$numberprice);

        return $this->fetch();


    }

    public function makeorder(Request $request)
    {
        //限制登录
//        $url = '/home/index/index';
//        \think\Hook::listen('user_login',$url);

        //判断接受方式
        if ($request->isPost())
        {
           //查询地址信息
            $conginfos = Consignee::get($request->post('cgn_id'));


            //获取收货人详细信息：名称+地址+手机+邮编 的序列化信息',
            $address['cgn_name'] = $conginfos->cgn_name;
            $address['cgn_address'] = $conginfos->cgn_address;
            $address['cgn_tel']  =  $conginfos->cgn_tel;
            $address['cgn_id']   = $conginfos->cgn_id;

            $cgn_address = serialize($address);

            //获取购物车信息
            $numberprice = $this->cart->getNumberPrice();
            $shuju['user_id']  = session('user_id');
            $shuju['order_number'] = 'pshop'.uniqid().date('YmdHis');
            $shuju['order_price']  = $numberprice['cprice'];
            $shuju['order_pay']  = $request->post('order_pay');
            $shuju['cgn_address'] = $cgn_address;

            //入库
            $order = new Order();
            $order->save($shuju);

            $carinfo = $this->cart->getCartInfo();
            $value = [];

            foreach($carinfo as $k=> $v)
            {
                $value[$k]['order_id'] = $order->order_id;
                $value[$k]['goods_id'] = $v['cgoods_id'];
                $value[$k]['goods_price'] = $v['cgoods_price'];
                $value[$k]['goods_number'] = $v['cgoods_number'];
                $value[$k]['goods_price_sum'] = $v['cgoods_price_sum'];
                $value[$k]['goods_attrs']  =  serialize($v['cgoods_attrs']);
            }

            //入库
            $ordergoods = new  OrderGoods();
            $ordergoods->saveAll($value);

            //清除 购物车信息
            $this->cart->delall();

            //echo '订单已经存储完毕，请去支付...';

            //⑤ 制作支付form表单页面
            $ordernumber = $shuju['order_number'];
            $orderprice = $numberprice['cprice'];
            $url = url('orderpay');
            echo <<<eof
                    <form id="payform" action="$url" method="post">
                        <input type="hidden" id="WIDout_trade_no" name="WIDout_trade_no" value="$ordernumber" />
                        <input type="hidden" id="WIDsubject" name="WIDsubject" value="$ordernumber" />
                        <input type="hidden" id="WIDtotal_amount" name="WIDtotal_amount" value="$orderprice" />
                        <input type="hidden" id="WIDbody" name="WIDbody" />
                    </form>
                    <script type="text/javascript">
                        document.getElementById('payform').submit();
                    </script>
eof;

        }else
        {
            exit('还没有添加商品...');
        }

    }

    /*
     * 订单支付提交页面
     *
     * */
    public function orderpay(Request $request)
    {
        //判断接受方法
        if ($request->isPost())
        {
            require_once EXTEND_PATH.'alipay/config.php';
            require_once EXTEND_PATH.'alipay/pagepay/service/AlipayTradeService.php';
            require_once EXTEND_PATH.'alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';

            //商户订单号，商户网站订单系统中唯一订单号，必填
            $out_trade_no = trim($_POST['WIDout_trade_no']);

            //订单名称，必填
            $subject = trim($_POST['WIDsubject']);

            //付款金额，必填
            $total_amount = trim($_POST['WIDtotal_amount']);

            //商品描述，可空
            $body = trim($_POST['WIDbody']);

            //构造参数
            $payRequestBuilder = new \AlipayTradePagePayContentBuilder();
            $payRequestBuilder->setBody($body);
            $payRequestBuilder->setSubject($subject);
            $payRequestBuilder->setTotalAmount($total_amount);
            $payRequestBuilder->setOutTradeNo($out_trade_no);

            $aop = new \AlipayTradeService($config);

            /**
             * pagePay 电脑网站支付请求
             * @param $builder 业务参数，使用buildmodel中的对象生成。
             * @param $return_url 同步跳转地址，公网可以访问
             * @param $notify_url 异步通知地址，公网可以访问
             * @return $response 支付宝返回的信息
             */
            $response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);

            var_dump(1);
            //输出表单
            var_dump($response);

        }

    }


    public function return_url(Request $request)
    {
        require_once EXTEND_PATH.'alipay/config.php';
        require_once EXTEND_PATH.'alipay/pagepay/service/AlipayTradeService.php';


        $arr=$_GET;
        $alipaySevice = new \AlipayTradeService($config);
        $result = $alipaySevice->check($arr);

        if(!$result) {//验证成功

            //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

            //商户订单号
            $out_trade_no = htmlspecialchars($_GET['out_trade_no']);

            //支付宝交易号
            $trade_no = htmlspecialchars($_GET['trade_no']);

            //支付宝总金额
            $total_amout = htmlspecialchars($_GET['total_amount']);

            //更新订单
            $exits = Order::where(['order_number'=>'$out_trade_no','order_status'=>'1'])->find();

            //判断是否 支付
            if($exits === null)
            {
                $shuju['order_status']  = '1';
                $shuju['order_trade_no'] = $trade_no;
                $shuju['order_pay_money'] = $total_amout;
                $order = new order();
                $order->where('order_number',$out_trade_no)->update($shuju);
            }else
            {
                echo "订单已经付款,请勿重复操作";
                exit;
            }

            $this->assign('out_trade_no',$out_trade_no);
            $this->assign('trade_no',$trade_no);
            $this->assign('total_amout',$total_amout);

            return $this->fetch();

            }
        else {
            //验证失败
            echo "验证失败-数据破坏";
            exit;
        }

    }


}
