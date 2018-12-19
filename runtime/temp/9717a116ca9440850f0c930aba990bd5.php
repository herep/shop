<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\www\pygshop\public/../application/home\view\shop\acc_show.html";i:1544173142;s:53:"D:\www\pygshop\application\home\view\public\head.html";i:1544163141;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <link rel="icon" href="/assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="<?php echo config('home_css'); ?>all.css" />
    <script type="text/javascript" src="<?php echo config('home_js'); ?>all.js"></script>
</head>

<body>
<!-- 头部栏位 -->
<!--页面顶部-->
<div id="nav-bottom">
    <!--顶部-->
    <div class="nav-top">
        <div class="top">
            <div class="py-container">
                <div class="shortcut">
                    <ul class="fl">
                        <?php if(!(empty(\think\Request::instance()->session('username')) || ((\think\Request::instance()->session('username') instanceof \think\Collection || \think\Request::instance()->session('username') instanceof \think\Paginator ) && \think\Request::instance()->session('username')->isEmpty()))): ?>
                        <li class="f-item">
                           欢迎您,【<?php echo \think\Request::instance()->session('username'); ?>】
                            <span><a href="<?php echo url('user/logout'); ?>">退出系统</a></span>
                        </li>
                        <?php else: ?>
                        <li class="f-item">品优购欢迎您！</li>
                        <li class="f-item">请<a href="<?php echo url('user/login'); ?>" target="_blank">登录</a>　<span><a href="<?php echo url('user/register'); ?>" target="_blank">免费注册</a></span></li>
                        <?php endif; ?>
                       </ul>
                    <ul class="fr">
                        <li class="f-item">我的订单</li>
                        <li class="f-item space"></li>
                        <li class="f-item"><a href="home.html" target="_blank">我的品优购</a></li>
                        <li class="f-item space"></li>
                        <li class="f-item">品优购会员</li>
                        <li class="f-item space"></li>
                        <li class="f-item">企业采购</li>
                        <li class="f-item space"></li>
                        <li class="f-item">关注品优购</li>
                        <li class="f-item space"></li>
                        <li class="f-item" id="service">
                            <span>客户服务</span>
                            <ul class="service">
                                <li><a href="cooperation.html" target="_blank">合作招商</a></li>
                                <li><a href="shoplogin.html" target="_blank">商家后台</a></li>
                            </ul>
                        </li>
                        <li class="f-item space"></li>
                        <li class="f-item">网站导航</li>
                    </ul>
                </div>
            </div>
        </div>

        <!--头部-->
        <div class="header">
            <div class="py-container">
                <div class="yui3-g Logo">
                    <div class="yui3-u Left logoArea">
                        <a class="logo-bd" title="品优购" href="JD-index.html" target="_blank"></a>
                    </div>
                    <div class="yui3-u Center searchArea">
                        <div class="search">
                            <form action="" class="sui-form form-inline">
                                <!--searchAutoComplete-->
                                <div class="input-append">
                                    <input type="text" id="autocomplete" type="text" class="input-error input-xxlarge" />
                                    <button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
                                </div>
                            </form>
                        </div>
                        <div class="hotwords">
                            <ul>
                                <li class="f-item">品优购首发</li>
                                <li class="f-item">亿元优惠</li>
                                <li class="f-item">9.9元团购</li>
                                <li class="f-item">每满99减30</li>
                                <li class="f-item">亿元优惠</li>
                                <li class="f-item">9.9元团购</li>
                                <li class="f-item">办公用品</li>

                            </ul>
                        </div>
                    </div>
                    <div class="yui3-u Right shopArea">
                        <div class="fr shopcar">
                            <div class="show-shopcar" id="shopcar">
                                <span class="car"></span>
                                <a class="sui-btn btn-default btn-xlarge" href="cart.html" target="_blank">
                                    <span>我的购物车</span>
                                    <i class="shopnum">0</i>
                                </a>
                                <div class="clearfix shopcarlist" id="shopcarlist" style="display:none">
                                    <p>"啊哦，你的购物车还没有商品哦！"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="yui3-g NavList">
                    <div class="all-sorts-list">
                        <div class="yui3-u Left all-sort">
                            <h4>全部商品分类</h4>
                        </div>
                        <div class="sort">
                            <div class="all-sort-list2">
                                <?php $_result=getcat_levelA();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <div class="item">
                                    <h3><a href="<?php echo url('goods/index',['cat_id'=>$v['cat_id']]); ?>" target="_blank"><?php echo $v['cat_name']; ?></a></h3>
                                    <div class="item-list clearfix">
                                        <div class="subitem">
                                            <?php $_result=getcat_levelB();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;if($vv['cat_pid'] == $v['cat_id']): ?>
                                            <dl class="fore1">
                                                <dt><a href="<?php echo url('goods/index',['cat_id'=>$vv['cat_id']]); ?>" target="_blank"><?php echo $vv['cat_name']; ?></a></dt>
                                                <dd>
                                                    <?php $_result=getcat_levelC();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;if($vvv['cat_pid'] == $vv['cat_id']): ?>
                                                    <em><a href="<?php echo url('goods/index',['cat_id'=>$vvv['cat_id']]); ?>" target="_blank"><?php echo $vvv['cat_name']; ?></a></em>
                                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                </dd>
                                            </dl>
                                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="yui3-u Center navArea">
                        <ul class="nav">
                            <li class="f-item">服装城</li>
                            <li class="f-item">美妆馆</li>
                            <li class="f-item">品优超市</li>
                            <li class="f-item">全球购</li>
                            <li class="f-item">闪购</li>
                            <li class="f-item">团购</li>
                            <li class="f-item">有趣</li>
                            <li class="f-item"><a href="seckill-index.html" target="_blank">秒杀</a></li>
                        </ul>
                    </div>
                    <div class="yui3-u Right"></div>
                </div>

            </div>
        </div>
    </div>
</div>
    <title>商品已成功加入购物车</title>
    <link rel="stylesheet" type="text/css" href="<?php echo config('home_css'); ?>/pages-success-cart.css" />

<!-- 头部栏位 -->
<!--页面顶部-->


<div class="success-cart">
    <div class="py-container ">
        <h3><i class="sui-icon icon-pc-right"></i>商品已成功加入购物车！</h3>
        <div class="goods">
            <div class="left-good">
                <div class="left-pic"><img src="<?php echo substr($goods['goods_logo'],1); ?>"></div>
                <div class="right-info">
                    <p class="title"><?php echo $goods['goods_name']; ?></p>
                    <p class="attr">颜色：WFZ5099IH/5L钛金釜内胆 数量：1</p>
                </div>
            </div>
            <div class="right-gocart">
                <a href="<?php echo url('goods/detail',['goods_id'=>$goods['goods_id']]); ?>" class="sui-btn btn-xlarge">查看商品详情</a>
                <a href="<?php echo url('showgoods'); ?>" class="sui-btn btn-xlarge btn-danger " target="_blank">去购物车结算 > </a>
            </div>
        </div>
    </div>
</div>

<div class="other-item py-container ">
    <h4>购买该商品的朋友还购买了</h4>

    <div class="banner-goods">
        <div class="goods-list">
            <div id="myCarousel" data-ride="carousel" data-interval="false" class="sui-carousel slide">

                <div class="carousel-inner">
                    <div class="active item">
                        <ul class="yui3-g">
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="item">
                        <ul class="yui3-g">
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="item">
                        <ul class="yui3-g">
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"><span>1</span></li>
                    <li data-target="#myCarousel" data-slide-to="1"><span>2</span></li>
                    <li data-target="#myCarousel" data-slide-to="2"><span>3</span></li>
                </ol>
            </div>
        </div>
    </div>

</div>
<div class="other-item py-container ">
    <h4>您可能还需要</h4>
    <div class="banner-goods">
        <div class="goods-list">
            <div id="needCarousel" data-ride="carousel" data-interval="false"  class="sui-carousel slide">

                <div class="carousel-inner">
                    <div class="active item">
                        <ul class="yui3-g">
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="item">
                        <ul class="yui3-g">
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="item">
                        <ul class="yui3-g">
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="banner-item">
                                    <div class="p-img"><a href="#"><img src="<?php echo config('home_img'); ?>/_/gocart01.jpg"></a></div>
                                    <div class="p-name"><a href="#">摩托罗拉 Moto Mods 摩眼-哈苏摄影模块</a></div>
                                    <div class="p-price">￥2299.00</div>
                                    <div class="p-btn"><a href="success-cart.html" target="_blank" class="sui-btn btn-bordered  ">加入购物车</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <ol class="carousel-indicators">
                    <li data-target="#needCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#needCarousel" data-slide-to="1"></li>
                    <li data-target="#needCarousel" data-slide-to="2"></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="other-item py-container ">
    <h4>买什么</h4>
    <div class="buy-goods">


        <ul class="yui3-g">
            <li  class="yui3-u-1-4">
                <div class="buy-list">
                    <h4>告诉你何谓电子产品达人</h4>
                    <p>血战龙</p>
                    <div class="imgs">
                        <div class="ab-cover"><img src="<?php echo config('home_img'); ?>/_/buy01.jpg"></div>
                        <div class="ab-list">
                            <ul>
                                <li><img src="<?php echo config('home_img'); ?>/_/buy001.jpg"></li>
                                <li><img src="<?php echo config('home_img'); ?>/_/buy002.jpg"></li>
                                <li><img src="<?php echo config('home_img'); ?>/_/buy002.jpg"></li>
                            </ul>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <div class=" operate">
                        <a href="#" class="point"><i class="sui-icon icon-tb-like"></i> 关注 7</a>
                        <a href="#"  class="zan"><i class="sui-icon icon-tb-appreciatefill"></i> 赞 9</a>
                    </div>
                </div>
            </li>
            <li  class="yui3-u-1-4">
                <div class="buy-list">
                    <h4>告诉你何谓电子产品达人</h4>
                    <p>血战龙</p>
                    <div class="imgs">
                        <div class="ab-cover"><img src="<?php echo config('home_img'); ?>/_/buy01.jpg"></div>
                        <div class="ab-list">
                            <ul>
                                <li><img src="<?php echo config('home_img'); ?>/_/buy001.jpg"></li>
                                <li><img src="<?php echo config('home_img'); ?>/_/buy002.jpg"></li>
                                <li><img src="<?php echo config('home_img'); ?>/_/buy002.jpg"></li>
                            </ul>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <div class=" operate">
                        <a href="#" class="point"><i class="sui-icon icon-tb-like"></i> 关注 7</a>
                        <a href="#"  class="zan"><i class="sui-icon icon-tb-appreciatefill"></i> 赞 9</a>
                    </div>
                </div>
            </li>
            <li  class="yui3-u-1-4">
                <div class="buy-list">
                    <h4>告诉你何谓电子产品达人</h4>
                    <p>血战龙</p>
                    <div class="imgs">
                        <div class="ab-cover"><img src="<?php echo config('home_img'); ?>/_/buy01.jpg"></div>
                        <div class="ab-list">
                            <ul>
                                <li><img src="<?php echo config('home_img'); ?>/_/buy001.jpg"></li>
                                <li><img src="<?php echo config('home_img'); ?>/_/buy002.jpg"></li>
                                <li><img src="<?php echo config('home_img'); ?>/_/buy002.jpg"></li>
                            </ul>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <div class=" operate">
                        <a href="#" class="point"><i class="sui-icon icon-tb-like"></i> 关注 7</a>
                        <a href="#"  class="zan"><i class="sui-icon icon-tb-appreciatefill"></i> 赞 9</a>
                    </div>
                </div>
            </li>
            <li  class="yui3-u-1-4">
                <div class="buy-list">
                    <h4>告诉你何谓电子产品达人</h4>
                    <p>血战龙</p>
                    <div class="imgs">
                        <div class="ab-cover"><img src="<?php echo config('home_img'); ?>/_/buy01.jpg"></div>
                        <div class="ab-list">
                            <ul>
                                <li><img src="<?php echo config('home_img'); ?>/_/buy001.jpg"></li>
                                <li><img src="<?php echo config('home_img'); ?>/_/buy002.jpg"></li>
                                <li><img src="<?php echo config('home_img'); ?>/_/buy002.jpg"></li>
                            </ul>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <div class=" operate">
                        <a href="#" class="point"><i class="sui-icon icon-tb-like"></i> 关注 7</a>
                        <a href="#"  class="zan"><i class="sui-icon icon-tb-appreciatefill"></i> 赞 9</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
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
                        <img src="<?php echo config('home_img'); ?>/wx_cz.jpg">
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

<script type="text/javascript" src="<?php echo config('home_js'); ?>/all.js"></script>
</body>

</html>