<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"D:\www\pygshop\public/../application/admin\view\goods\index.html";i:1544092905;s:54:"D:\www\pygshop\application\admin\view\public\head.html";i:1543668841;s:57:"D:\www\pygshop\application\admin\view\goods\js_index.html";i:1544096787;s:54:"D:\www\pygshop\application\admin\view\public\foot.html";i:1539756530;}*/ ?>
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
                <th width="100">商品名</th>
                <th width="40">价格</th>
                <th width="90">数量</th>
                <th width="150">重量</th>
                <th width="120">图片</th>
                <th width="50">促销</th>
                <th width="50">热卖数量</th>
                <th width="130">加入时间</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($infos) || $infos instanceof \think\Collection || $infos instanceof \think\Paginator): $i = 0; $__LIST__ = $infos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;if($mod == '1'): ?>
            <tr class="text-c" style="background-color: #5bc0de">
                <?php else: ?>
            <tr class="text-c">
           <?php endif; ?>
                <td><input type="checkbox" value="1" name=""></td>
                <td><?php echo $info['goods_id']; ?></td>
                <td><?php echo $info['goods_name']; ?></td>
                <td><?php echo $info['goods_price']; ?></td>
                <td><?php echo $info['goods_number']; ?></td>
                <td><?php echo $info['goods_weight']; ?></td>
                <td><img src="<?php echo substr($info['goods_logo'],1); ?>"  alt="" width="100" height="78"></td>
                <td onclick="change_promotion(this)" id="goods_<?php echo $info['goods_id']; ?>_<?php echo $info['is_promotion']; ?>">
                    <?php if($info['is_promotion'] == '0'): ?>
                    <img src="<?php echo config('admin_temp'); ?>no.gif"  alt="促销" >
                    <?php else: ?>
                    <img src="<?php echo config('admin_temp'); ?>yes.gif"  alt="不促销" >
                    <?php endif; ?>
                </td>
                <td onclick="change_input(this,'<?php echo $info['goods_id']; ?>')"><?php echo $info['goods_salenum']; ?></td>
                <td><?php echo $info['create_time']; ?></td>

                <td class="td-manage"><a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> <a title="编辑" href="javascript:;" onclick="member_edit('编辑','<?php echo url('alter',['goods_id'=>$info['goods_id']]); ?>','','1000','600')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','change-password.html','10001','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a> <a title="删除" href="javascript:;" onclick="member_del(this,<?php echo $info['goods_id']; ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <tr><td colspan="100"><?php echo $pagelist; ?></td></td>
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
<script type="text/javascript">

    /*商品-添加*/
    function member_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*商品-查看*/
    function member_show(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*商品-停用*/
    function member_stop(obj,id){
        layer.confirm('确认要停用吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
                    $(obj).remove();
                    layer.msg('已停用!',{icon: 5,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }

    /*商品-启用*/
    function member_start(obj,id){
        layer.confirm('确认要启用吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                    $(obj).remove();
                    layer.msg('已启用!',{icon: 6,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }
    /*商品-编辑*/
    function member_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*密码-修改*/
    function change_password(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*商品-删除*/
    function member_del(obj,goods_id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type:'POST',
                data:'goods_id='+goods_id,
                url: '<?php echo url("del"); ?>',
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }

    function change_promotion(obj) {
        //收集 数据
        var shuju = $(obj).attr('id');
        var id_pro =shuju.split('_');

       var id = id_pro[1];
       var is_pro =(id_pro[2] == 0)?1:0;

       //发送请求
        $.ajax({
            url:"<?php echo url('change_promotion'); ?>",
            data:{id:id,is_pro:is_pro},
            dataType:'json',
            type:'post',
            success:function (msg) {
                if(msg.status == 'success')
                {
                    //显示
                    if(is_pro==0)
                    {
                        $(obj).html(' <img src="<?php echo config('admin_temp'); ?>no.gif"  alt="不促销" >');
                        layer.msg('【非促销模式切换成功】',{icon:6,time:2000})
                    }else
                    {
                        $(obj).html(' <img src="<?php echo config('admin_temp'); ?>yes.gif"  alt="促销" >');
                        layer.msg('【促销模式切换成功】',{icon:6,time:2000})
                    }

                    //更新
                    $(obj).attr('id','goods_'+id+'_'+is_pro);
                }
            }

        })

    }

    //点击变成 输入框
    function change_input(obj,goods_id)
    {
        //获取点击 中的值
        var num = $(obj).text();
        //改变 输入框
        var it= $('<input type="number" style="width: 50px">');
        //将值 赋予输入框
        it.val(num);
        $(obj).html(it);

      //输入框 点击事件 失效
        it.click(function(){return false;});
       //输入框 获取焦点
        it.focus();
       //选中 输入框内容
        it.select();

        //失去焦点事件
       it.blur(function(){
           //获取此时修改后的数据
           var shuju = $(this).val();

           //发送请求
           $.ajax({
               url:"<?php echo url('setsalenum'); ?>",
               data:{goods_id:goods_id,salenum:shuju},
               type:'post',
               dataType:'json',
               success:function (msg) {
                  if(msg.status=='success')
                  {
                      //将数据 赋予
                      $(obj).html(shuju);
                      layer.msg('修改数据成功',{icon:6,time:2000});
                  }
               }
           })
        })


    }


</script>


</body>
</html>

