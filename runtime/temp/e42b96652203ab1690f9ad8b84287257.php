<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"D:\www\pygshop\public/../application/admin\view\order\index.html";i:1544277443;s:54:"D:\www\pygshop\application\admin\view\public\head.html";i:1543668841;s:57:"D:\www\pygshop\application\admin\view\order\js_index.html";i:1544277708;s:54:"D:\www\pygshop\application\admin\view\public\foot.html";i:1539756530;}*/ ?>
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



<title>订单管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单中心 <span class="c-gray en">&gt;</span> 订单管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加订单','<?php echo url('tianjia'); ?>','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加订单</a></span> <span class="r">共有数据：<strong>88</strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="60">ID</th>
                <th width="100">会员名称</th>
                <th width="300">订单编号</th>
                <th width="140">总价格</th>
                <th width="75">是否付款</th>
                <th width="130">加入时间</th>
                <th width="*">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($orderinfos) || $orderinfos instanceof \think\Collection || $orderinfos instanceof \think\Paginator): $i = 0; $__LIST__ = $orderinfos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><input type="checkbox" value="1" name=""></td>
                <td><?php echo $info['order_id']; ?></td>
                <td><?php echo $info['user']['username']; ?></td>
                <td><?php echo $info['order_number']; ?></td>
                <td><?php echo $info['order_price']; ?></td>
                <td>
                    <?php if($info['order_status'] == '0'): ?>
                    <span class="btn btn-danger radius">否</span>
                    <?php else: ?>
                    <span class="btn btn-success radius">是</span>
                    <?php endif; ?>
                </td>
                <td><?php echo $info['create_time']; ?></td>
                <td class="td-manage">
                    <a title="详情" href="javascript:;"
                       onclick="member_show('详情','<?php echo url('detail',['order_id'=>$info['order_id']]); ?>','','510')"
                       class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe665;</i></a>

                    <a title="编辑" href="javascript:;"
                       onclick="member_edit('编辑','<?php echo url('xiugai',['order_id'=>$info['order_id']]); ?>','','510')"
                       class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>

                    <a title="删除" href="javascript:;"
                       onclick="member_del(this,<?php echo $info['order_id']; ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <tr><td colspan="100"><?php echo $page; ?></td></tr>
            </tbody>
        </table>
    </div>
</div>

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



<script>
    function member_show(title,url,w,h) {
        layer_show(title,url,w,h)
    }
</script>

</body>
</html>

























