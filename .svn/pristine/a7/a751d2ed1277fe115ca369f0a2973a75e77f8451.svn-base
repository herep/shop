<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"D:\www\pygshop\public/../application/home\view\shop\jiesuan.html";i:1544271354;s:54:"D:\www\pygshop\application\home\view\public\head2.html";i:1544236267;s:54:"D:\www\pygshop\application\home\view\public\foot2.html";i:1528537546;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>我的购物车</title>

    <link rel="stylesheet" type="text/css" href="<?php echo config('home_css'); ?>/all.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo config('home_css'); ?>/pages-cart.css" />
</head>

<body>
<!--head-->
<div class="top">
    <div class="py-container">
        <div class="shortcut">
            <ul class="fl">
                <?php if(!(empty(\think\Request::instance()->session('username')) || ((\think\Request::instance()->session('username') instanceof \think\Collection || \think\Request::instance()->session('username') instanceof \think\Paginator ) && \think\Request::instance()->session('username')->isEmpty()))): ?>
                欢迎你！【<?php echo \think\Request::instance()->session('username'); ?>】
                <span><a href="<?php echo url('user/logout'); ?>">退出系统</a></span>
                <?php else: ?>
                <li class="f-item">品优购欢迎您！</li>
                <li class="f-item">请登录　<span><a href="#">免费注册</a></span></li>
                <?php endif; ?>

            </ul>
            <ul class="fr">
                <li class="f-item">我的订单</li>
                <li class="f-item space"></li>
                <li class="f-item">我的品优购</li>
                <li class="f-item space"></li>
                <li class="f-item">品优购会员</li>
                <li class="f-item space"></li>
                <li class="f-item">企业采购</li>
                <li class="f-item space"></li>
                <li class="f-item">关注品优购</li>
                <li class="f-item space"></li>
                <li class="f-item">客户服务</li>
                <li class="f-item space"></li>
                <li class="f-item">网站导航</li>
            </ul>
        </div>
    </div>
</div>
<title>结算页</title>
<link rel="stylesheet" type="text/css" href="<?php echo config('home_css'); ?>pages-getOrderInfo.css" />

<div class="cart py-container">
    <!--logoArea-->
    <div class="logoArea">
        <div class="fl logo"><span class="title">结算页</span></div>
        <div class="fr search">
                <div class="input-append">
                    <input type="text" type="text" class="input-error input-xxlarge" placeholder="品优购自营" />
                    <button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
                </div>
        </div>
    </div>
    <!--主内容-->
    <form method="post" action="<?php echo url('makeorder'); ?>">
        <div class="checkout py-container">
            <div class="checkout-tit">
                <h4 class="tit-txt">填写并核对订单信息</h4>
            </div>
            <div class="checkout-steps">
                <!--收件人信息-->
                <div class="step-tit">
                    <h5>收件人信息<span><a data-toggle="modal" data-target=".edit" data-keyboard="false" class="newadd">新增收货地址</a></span></h5>
                </div>
                <div class="step-cont">
                    <div class="addressInfo">
                        <ul class="addr-detail">
                            <li class="addr-item">
                                <?php if(is_array($consignee) || $consignee instanceof \think\Collection || $consignee instanceof \think\Paginator): $k = 0; $__LIST__ = $consignee;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>

                                <div class="con name">
                                    <input type="radio" name="cgn_id" value="<?php echo $v['cgn_id']; ?>"
                                           <?php if($k == '1'): ?>checked="checked"<?php endif; ?> />
                                    <?php echo $v['cgn_name']; ?></div>
                                <div class="con address"><?php echo $v['cgn_address']; ?><span><?php echo $v['cgn_tel']; ?></span>
                                    <span class="edittext">
                                    <a data-toggle="modal" data-target=".edit"
                                       data-keyboard="false" >编辑</a>&nbsp;&nbsp;
                                    <a href="javascript:;">删除</a></span>
                                </div>
                                <div class="clearfix"></div>

                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="hr"></div>
                <!--支付和送货-->
                <div class="payshipInfo">
                    <div class="step-tit">
                        <h5>支付方式</h5>
                    </div>
                    <div class="step-cont">
                        <ul class="payType">
                            <li><input type="radio" name="order_pay" value="0" checked="checked" />支付宝</li>
                            <li><input type="radio" name="order_pay" value="1" />微信</li>
                            <li><input type="radio" name="order_pay" value="2" />银行卡</li>
                        </ul>
                    </div>
                    <div class="hr"></div>
                    <div class="step-tit">
                        <h5>送货清单</h5>
                    </div>
                    <div class="step-cont">
                        <ul class="send-detail">
                            <li>
                                <div class="sendType">
                                    <span>配送方式：</span>
                                    <ul>
                                        <li>
                                            <div class="con express">天天快递</div>
                                            <div class="con delivery">配送时间：预计8月10日（周三）09:00-15:00送达</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="sendGoods">
                                    <span>商品清单：</span>
                                    <?php if(is_array($cgninfos) || $cgninfos instanceof \think\Collection || $cgninfos instanceof \think\Paginator): $i = 0; $__LIST__ = $cgninfos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                    <ul class="yui3-g">
                                        <li class="yui3-u-1-6"><span><img src="<?php echo substr($v['cgoods_logo'],1); ?>"/></span></li>
                                        <li class="yui3-u-7-12">
                                            <div class="desc"><?php echo $v['cgoods_name']; ?></div>
                                            <div class="seven">7天无理由退货</div>
                                        </li>
                                        <li class="yui3-u-1-12"><div class="price">￥<?php echo $v['cgoods_price']; ?></div></li>
                                        <li class="yui3-u-1-12"><div class="num">X<?php echo $v['cgoods_number']; ?></div></li>
                                        <li class="yui3-u-1-12"><div class="price"><?php echo $v['cgoods_price_sum']; ?></div></li>
                                    </ul>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="hr"></div>
                </div>
                <div class="linkInfo">
                    <div class="step-tit">
                        <h5>发票信息</h5>
                    </div>
                    <div class="step-cont">
                        <span>普通发票（电子）</span>
                        <span>个人</span>
                        <span>明细</span>
                    </div>
                </div>
                <div class="cardInfo">
                    <div class="step-tit">
                        <h5>使用优惠/抵用</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="order-summary">
            <div class="static fr">
                <div class="list">
                    <span><i class="number"><?php echo $numberprice['cnumber']; ?></i>件商品，总商品金额</span>
                    <em class="allprice">¥<?php echo $numberprice['cprice']; ?></em>
                </div>
                <div class="list">
                    <span>返现：</span>
                    <em class="money">0.00</em>
                </div>
                <div class="list">
                    <span>运费：</span>
                    <em class="transport">0.00</em>
                </div>
            </div>
        </div>
        <div class="clearfix trade">
            <div class="fc-price">应付金额:　<span class="price">¥<?php echo $numberprice['cprice']; ?></span></div>
            <div class="fc-receiverInfo">寄送至:北京市海淀区三环内 中关村软件园9号楼 收货人：某某某 159****3201</div>
        </div>
        <div class="submit">
            <!--<a class="sui-btn btn-danger btn-xlarge" href="pay.html">提交订单</a>-->
            <input type="submit" value="提交订单" class="sui-btn btn-danger btn-xlarge" />
        </div>
    </form>
</div>
<!-- 底部栏位 -->
<!--页面底部-->
<div class="clearfix footer">
    <div class="py-container">
        <div class="footlink">
            <div class="Mod-service">
                <ul class="Mod-Service-list">
                    <li class="grid-service-item intro  intro1">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item  intro intro2">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item intro  intro3">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item  intro intro4">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item intro intro5">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                </ul>
            </div>
            <div class="clearfix Mod-list">
                <div class="yui3-g">
                    <div class="yui3-u-1-6">
                        <h4>购物指南</h4>
                        <ul class="unstyled">
                            <li>购物流程</li>
                            <li>会员介绍</li>
                            <li>生活旅行/团购</li>
                            <li>常见问题</li>
                            <li>购物指南</li>
                        </ul>

                    </div>
                    <div class="yui3-u-1-6">
                        <h4>配送方式</h4>
                        <ul class="unstyled">
                            <li>上门自提</li>
                            <li>211限时达</li>
                            <li>配送服务查询</li>
                            <li>配送费收取标准</li>
                            <li>海外配送</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>支付方式</h4>
                        <ul class="unstyled">
                            <li>货到付款</li>
                            <li>在线支付</li>
                            <li>分期付款</li>
                            <li>邮局汇款</li>
                            <li>公司转账</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>售后服务</h4>
                        <ul class="unstyled">
                            <li>售后政策</li>
                            <li>价格保护</li>
                            <li>退款说明</li>
                            <li>返修/退换货</li>
                            <li>取消订单</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>特色服务</h4>
                        <ul class="unstyled">
                            <li>夺宝岛</li>
                            <li>DIY装机</li>
                            <li>延保服务</li>
                            <li>品优购E卡</li>
                            <li>品优购通信</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>帮助中心</h4>
                        <img src="<?php echo config('home_img'); ?>wx_cz.jpg">
                    </div>
                </div>
            </div>
            <div class="Mod-copyright">
                <ul class="helpLink">
                    <li>关于我们<span class="space"></span></li>
                    <li>联系我们<span class="space"></span></li>
                    <li>关于我们<span class="space"></span></li>
                    <li>商家入驻<span class="space"></span></li>
                    <li>营销中心<span class="space"></span></li>
                    <li>友情链接<span class="space"></span></li>
                    <li>关于我们<span class="space"></span></li>
                    <li>营销中心<span class="space"></span></li>
                    <li>友情链接<span class="space"></span></li>
                    <li>关于我们</li>
                </ul>
                <p>地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</p>
                <p>京ICP备08001421号京公网安备110108007702</p>
            </div>
        </div>
    </div>
</div>
<!--页面底部END-->

<script type="text/javascript" src="<?php echo config('home_js'); ?>all.js"></script>
<script type="text/javascript" src="<?php echo config('home_js'); ?>pages/getOrderInfo.js"></script>
</body>

</html>









