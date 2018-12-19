<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:72:"D:\www\pygshop\public/../application/admin\view\goods\index_seckill.html";i:1545193537;s:54:"D:\www\pygshop\application\admin\view\public\head.html";i:1543668841;s:54:"D:\www\pygshop\application\admin\view\public\foot.html";i:1539756530;s:65:"D:\www\pygshop\application\admin\view\goods\js_index_seckill.html";i:1545193505;}*/ ?>
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


<title>商品管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商品中心 <span class="c-gray en">&gt;</span> 商品管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加商品','<?php echo url ('acc'); ?>','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加商品</a></span> <span class="r">共有数据：<strong>88</strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="80">ID</th>
                <th width="100">商品名称</th>
                <th width="40">秒杀价格</th>
                <th width="90">秒杀数量</th>
                <th width="150">开始时间</th>
                <th width="120">结束时间</th>
                <th width="50">距离结束</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($infos) || $infos instanceof \think\Collection || $infos instanceof \think\Paginator): $i = 0; $__LIST__ = $infos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?>
            <tr class="text-c goodsseckill" id="goods_<?php echo $info['goods_id']; ?>">
                <td><input type="checkbox" value="1" name=""></td>
                <td><?php echo $info['goods_id']; ?></td>
                <td><?php echo $info['goods_name']; ?></td>
                <td><?php echo $info['goods_price_seckill']; ?></td>
                <td><?php echo $info['goods_number_seckill']; ?></td>
                <td><?php echo date('Y-m-d H:i:s',$info['start_time']); ?></td>
                <td><?php echo date('Y-m-d H:i:s',$info['end_time']); ?>
                    <input type="hidden" id="end_time_<?php echo $info['goods_id']; ?>" value="<?php echo $info['end_time']; ?>">
                </td>
                <td id="back_time_<?php echo $info['goods_id']; ?>">倒计时</td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <tr><td colspan="100"><?php echo $page; ?></td></td>
            </tbody>
        </table>
    </div>
</div>

<!--请在下方写此页面业务相关的脚本-->
<style type="text/css">
    .pagination li{list-style:none;float:left;margin-left:10px;
        padding:0 10px;
        background-color:#5a98de;
        border:1px solid #ccc;
        height:26px;
        line-height:26px;
        cursor:pointer;
        color:#fff;
    }
    .pagination li a{color:white;}
    .pagination li.active{background-color:white;color:gray;}
    .pagination li.disabled{background-color:white;color:gray;}
</style>


</body>
</html>
<script type="text/javascript">
function getDHMS(difftime) {
    var day = 60*60*24;
    var hour = 60*60;
    var minute = 60;

    var days = parseInt(difftime / day);
    var hours = parseInt(difftime % day / hour);
    var minutes = parseInt(difftime % hour / minute);
    var seconds = parseInt(difftime % minute);


    return days+'天'+hours+'小时'+minutes+'分钟'+seconds+'秒';
}

//获取当前时间戳
<?php $newdata = time(); ?>

//页面加载完毕，给每个秒杀商品设置剩余时间 back_time_{info.goods_id}
    $(function () {
        $('.goodsseckill').each(function () {
            //获得秒杀商品id信息
            var goods_id = $(this).attr('id').split('_')[1];



            //获得每个秒杀商品的结束时间
            var end_time = $('#end_time_'+goods_id).val();

            //保纯当前时间戳
            var nowtime = <?php echo $newdata ;?>


            window.setInterval(function() {
                 var difftime = end_time - nowtime;

                 var dhms = getDHMS(difftime);


                 $('#back_time_'+goods_id).html(dhms);

                 nowtime++;
             },1000);
        });
    });
</script>
