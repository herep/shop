<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:63:"D:\www\pygshop\public/../application/admin\view\role\index.html";i:1542368441;s:54:"D:\www\pygshop\application\admin\view\public\head.html";i:1543668841;s:56:"D:\www\pygshop\application\admin\view\role\js_alter.html";i:1544611740;s:54:"D:\www\pygshop\application\admin\view\public\foot.html";i:1539756530;}*/ ?>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="javascript:;" onclick="admin_role_add('添加角色','<?php echo url('acc'); ?>','1000','500')"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a> </span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
    <table class="table table-border table-bordered table-hover table-bg">
        <thead>
        <tr>
            <th scope="col" colspan="6">角色管理</th>
        </tr>
        <tr class="text-c">
            <th width="25"><input type="checkbox" value="" name=""></th>
            <th width="40">ID</th>
            <th width="200">角色名</th>
            <th>权限ID</th>
            <th width="300">权限ca</th>
            <th width="70">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
        <tr class="text-c">
            <td><input type="checkbox" value="" name=""></td>
            <td><?php echo $data['role_id']; ?></td>
            <td><?php echo $data['role_name']; ?></td>
            <td><a href="#"><?php echo $data['role_ps_ids']; ?></a></td>
            <td><?php echo $data['role_ps_ca']; ?></td>
            <td class="f-14"><a title="编辑" href="javascript:;" onclick="admin_role_edit('角色编辑','<?php echo url('alter',['role_id'=>$data['role_id']]); ?>','500','1000')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_role_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
        </tr>
       <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>


<!--/*******************************************复选框点击js********************************************************/-->
<script type="text/javascript">
    $(function(){
        $(".permission-list dt input:checkbox").click(function(){
            $(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
        });
        $(".permission-list2 dd input:checkbox").click(function(){
            var l =$(this).parent().parent().find("input:checked").length;
            var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
            if($(this).prop("checked")){
                $(this).closest("dl").find("dt input:checkbox").prop("checked",true);
                $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
            }
            else{
                if(l==0){
                    $(this).closest("dl").find("dt input:checkbox").prop("checked",false);
                }
                if(l2==0){
                    $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
                }
            }
        });

    });
</script>

<!--/*******************************************弹出层js**************************************************************/-->
<script type="text/javascript">
    /*管理员-角色-添加*/
    function admin_role_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*管理员-角色-编辑*/
    function admin_role_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*管理员-角色-删除*/
    function admin_role_del(obj,id){
        layer.confirm('角色删除须谨慎，确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '',
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
</script>
<!--/*************************************************发送请求js*********************************************************/-->
<script>
    $(function(){
       //表单绑定事件
       $('#form-admin-role-add') .submit(function (evt) {
           //阻止传统表单 提交
           evt.preventDefault();
           //收集表单信息
           var shuju = $(this).serialize();
           //发送请求
           $.ajax({
               url:'<?php echo url('alter'); ?>',
               data:shuju,
               dataType:'json',
               type:'post',
               success:function (msg) {
                  if(msg.status=='success')
                  {
                      layer.alert('修改成功',{icon:6},function () {
                          //刷新父页面
                          parent.window.location = parent.window.location;
                          //关闭弹层
                          var index = parent.layer.getFrameIndex(layer.name);
                          parent.layer.clear(index);

                      })
                  }else
                  {
                    layer.alert('修改失败',{icon:5},function () {
                        //刷新父类页面
                        parent.window.location= parent.window.location;
                        //关闭弹层
                        var index = parent.layer.getFrameIndex(layer.name);
                        parent.layer.clear(index);
                    })
                  }
               }

           })
       })
    });
</script>
</body>
</html>