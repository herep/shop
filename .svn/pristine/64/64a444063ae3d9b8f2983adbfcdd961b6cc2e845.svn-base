<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"D:\www\pygshop\public/../application/admin\view\order\detail.html";i:1544279422;s:54:"D:\www\pygshop\application\admin\view\public\head.html";i:1543668841;s:54:"D:\www\pygshop\application\admin\view\public\foot.html";i:1539756530;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>html5shiv.js"></script>
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>respond.min.js"></script>

    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_lib'); ?>Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>h-ui.admin/css/style.css" />


    <!--[if IE 6]>
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->



    <script type="text/javascript" src="<?php echo config('plugin'); ?>ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="<?php echo config('plugin'); ?>ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="<?php echo config('plugin'); ?>ueditor/lang/zh-cn/zh-cn.js"></script>
    <!--_footer 作为公共模版分离出去-->
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>layer/2.4/layer.js"></script>
    <script type="text/javascript" src="<?php echo config('admin_static'); ?>h-ui/js/H-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo config('admin_static'); ?>h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->



<title>订单详情 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
    <style type="text/css">
        table {border:1px solid black; }
        td {border:1px solid black;}
    </style>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
        <tbody><tr>
            <td height="20" bgcolor="d3eaef" class="STYLE6" colspan="100">
                <div align="left"><span class="STYLE19">订单基本信息</span></div>
            </td>
        </tr>
        <tr>
            <td height="20" bgcolor="#FFFFFF" class="STYLE6">
                <div align="right"><span class="STYLE19">用户名：</span></div>
            </td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19">
                <div align="left"><?php echo $order['user']['username']; ?></div>
            </td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE6">
                <div align="right"><span class="STYLE19">订单编号：</span></div>
            </td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19">
                <div align="left"><?php echo $order['order_number']; ?></div>
            </td>
        </tr>
        <tr>
            <td height="20" bgcolor="#FFFFFF" class="STYLE6">
                <div align="right"><span class="STYLE19">订单总金额：</span></div>
            </td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19">
                <div align="left"><?php echo $order['order_price']; ?></div>
            </td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE6">
                <div align="right"><span class="STYLE19">支付方式：</span></div>
            </td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19">
                <div align="left"><?php echo $order_pay_method[$order['order_pay']]; ?></div>
            </td>
        </tr>
        <tr>
            <td height="20" bgcolor="#FFFFFF" class="STYLE6">
                <div align="right"><span class="STYLE19">订单是否付款：</span></div>
            </td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19">
                <div align="left">
                    <?php if($order['order_status'] == '0'): ?>
                    <span class="btn btn-danger radius">否</span>
                    <?php else: ?>
                    <span class="btn btn-success radius">是</span>
                    <?php endif; ?>
                </div>
            </td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE6">
                <div align="right"><span class="STYLE19">下单时间：</span></div>
            </td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19">
                <div align="left"><?php echo $order['create_time']; ?></div>
            </td>
        </tr>
        <tr>
            <td height="20" bgcolor="#FFFFFF" class="STYLE6">
                <div align="right"><span class="STYLE19">收货人名称：</span></div>
            </td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19">
                <div align="left"><?php echo $cgninfo['cgn_name']; ?></div>
            </td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE6">
                <div align="right"><span class="STYLE19">地址：</span></div>
            </td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19">
                <div align="left"><?php echo $cgninfo['cgn_address']; ?></div>
                <input type="hidden" id="cgn_address_show" value="<?php echo $cgninfo['cgn_address']; ?>" />
            </td>
        </tr>
        <tr>
            <td height="20" bgcolor="#FFFFFF" class="STYLE6">
                <div align="right"><span class="STYLE19">联系电话：</span></div>
            </td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19">
                <div align="left"><?php echo $cgninfo['cgn_tel']; ?></div>
            </td>
        </tr>
        </tbody>
    </table>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" style="margin-top:5px;">
        <tbody><tr>
            <td height="20" bgcolor="d3eaef" class="STYLE6" colspan="100">
                <div align="left"><span class="STYLE19">订单关联商品信息</span></div>
            </td>
        </tr>
        <tr style="font-weight: bold;">
            <td width="5%" height="20" class="STYLE6">
                <div align="center"><span class="STYLE10">商品id</span></div>
            </td>
            <td width="10%" height="20" class="STYLE6">
                <div align="center"><span class="STYLE10">商品名称</span></div>
            </td>
            <td width="10%" height="20" class="STYLE6">
                <div align="center"><span class="STYLE10">附加属性</span></div>
            </td>
            <td width="7%" height="20" class="STYLE6">
                <div align="center"><span class="STYLE10">商品单价</span></div>
            </td>
            <td width="5%" height="20" class="STYLE6">
                <div align="center"><span class="STYLE10">购买数量</span></div>
            </td>
            <td width="8%" height="20" class="STYLE6">
                <div align="center"><span class="STYLE10">小计价格</span></div>
            </td>
        </tr>
        <?php if(is_array($goodsinfos) || $goodsinfos instanceof \think\Collection || $goodsinfos instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsinfos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <tr>
            <td height="20" bgcolor="#FFFFFF" class="STYLE6">
                <div align="center"><span class="STYLE19"><?php echo $v['goods_id']; ?></span></div></td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19">
                <div align="center"><?php echo $v['goods_name']; ?></div></td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19">
                <div align="left">
                    <?php if(!(empty($v['goods_attrs']) || (($v['goods_attrs'] instanceof \think\Collection || $v['goods_attrs'] instanceof \think\Paginator ) && $v['goods_attrs']->isEmpty()))): if(is_array($v['goods_attrs']) || $v['goods_attrs'] instanceof \think\Collection || $v['goods_attrs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['goods_attrs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                    【<?php echo $attrinfo[$key]; ?>:<?php echo $vv; ?>】
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </div></td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19">
                <div align="center"><?php echo $v['goods_price']; ?></div></td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19">
                <div align="center"><?php echo $v['goods_number']; ?></div></td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19">
                <div align="center"><?php echo $v['goods_price_sum']; ?></div></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>

    <!--地图容器-->
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce" style="margin-top:5px;">
        <tr>
            <td colspan="100">
                <div id="container" style="height:440px;"></div>
            </td>
        </tr>
    </table>
</article>

<script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp"></script>
<script type="text/javascript">
    var geocoder,map,marker = null;

    var address = ""; //收获地址全局变量
    //加载事件
    $(function(){
        var center = new qq.maps.LatLng(39.916527,116.397128);
        map = new qq.maps.Map(document.getElementById('container'),{
            center: center,
            zoom: 18
        });
        //调用地址解析类
        geocoder = new qq.maps.Geocoder({
            complete : function(result){
                map.setCenter(result.detail.location);
                var marker = new qq.maps.Marker({
                    map:map,
                    position: result.detail.location
                });

                //设置显示弹框
                var infoWin = new qq.maps.InfoWindow({
                    map: map
                });
                infoWin.open();  //打开弹框
                //tips  自定义内容
                infoWin.setContent(address); //设置弹框显示内容
                infoWin.setPosition(marker); //设置弹框箭头指向
            }
        });

        //获得收获地址
        address = $('#cgn_address_show').val();
        //通过getLocation();方法获取收获地址并设置地图显示
        geocoder.getLocation(address);
    });
</script>

</body>
</html>



























