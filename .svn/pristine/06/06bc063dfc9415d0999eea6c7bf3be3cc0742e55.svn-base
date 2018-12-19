<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:67:"D:\www\pygshop\public/../application/admin\view\permission\acc.html";i:1542807059;s:54:"D:\www\pygshop\application\admin\view\public\head.html";i:1543668841;s:60:"D:\www\pygshop\application\admin\view\permission\js_acc.html";i:1542807770;s:54:"D:\www\pygshop\application\admin\view\public\foot.html";i:1539756530;}*/ ?>
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


<body>
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-member-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="ps_name" name="ps_name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">父类：</label>
            <div class="formControls col-xs-8 col-sm-9">
				<select  name="ps_pid">
					<option value="" selected>-请选择-</option>
                    <?php if(is_array($infos) || $infos instanceof \think\Collection || $infos instanceof \think\Paginator): $i = 0; $__LIST__ = $infos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo $v['ps_id']; ?>">
                      <?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$v['ps_level']); ?><?php echo $v['ps_name']; ?>
                    </option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>控制器：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="ps_c" name="ps_c">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>操作方法：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="ps_a" name="ps_a">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--<script type="text/javascript">-->
    <!--$(function(){-->
        <!--$('.skin-minimal input').iCheck({-->
            <!--checkboxClass: 'icheckbox-blue',-->
            <!--radioClass: 'iradio-blue',-->
            <!--increaseArea: '20%'-->
        <!--});-->
    <!--});-->
<!--</script>-->
<script>
    $(function(){
        //绑定点击事件
        $('#form-member-add').submit(function (evt) {
            //阻止传统表单提交
            evt.preventDefault();
            //收集表单值
            var shuju  = $(this).serialize();
            //发送请求
            $.ajax({
                url:'<?php echo url('acc'); ?>',
                data:shuju,
                dataType:'json',
                type:'post',
                success:function(msg)
                {
                   if(msg.status=='success')
                   {
                       //提示信息
                       layer.alert('添加成功',{icon:6},function(){
                           //刷新父类页面
                           parent.window.location = parent.window.location;
                           //关闭弹窗
                           var index = layer.getFrameIndex(window.name);
                           parent.layer.color(index);
                       });
                   }else
                   {

                       //提示信息
                       layer.alert('添加成功',{icon:5},function(){
                           //刷新父类页面
                           parent.window.location = parent.window.location;
                           //关闭弹窗
                           var index = layer.getFrameIndex(window.name);
                           parent.layer.color(index);
                       });
                   }
                }
            })
        })
    })
</script>
</body>
</html>