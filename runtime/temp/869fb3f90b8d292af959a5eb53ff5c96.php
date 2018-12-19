<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:68:"D:\www\pygshop\public/../application/admin\view\attribute\index.html";i:1543408935;s:54:"D:\www\pygshop\application\admin\view\public\head.html";i:1543668841;s:61:"D:\www\pygshop\application\admin\view\attribute\js_index.html";i:1543668252;s:54:"D:\www\pygshop\application\admin\view\public\foot.html";i:1539756530;}*/ ?>
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
    <div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="javascript:;" onclick="admin_role_add('添加属性','<?php echo url('acc'); ?>','1000','500')"><i class="Hui-iconfont">&#xe600;</i> 添加属性</a> </span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
    <div    class="cl pd-5 bg-1 bk-gray mt-20">
        <select name="type_id"  onchange="show_type()">
            <option  value="0">-所有商品类型-</option>
            <?php $_result=get_type_info();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <option  value="<?php echo $v['type_id']; ?>"
            <?php if(\think\Request::instance()->param('type_id') == $v['type_id']): ?>selected = "selected"<?php endif; ?>
            ><?php echo $v['type_name']; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <table class="table table-border table-bordered table-hover table-bg">
        <thead>
        <tr class="text-c">
            <th width="25"><input type="checkbox" value="" name=""></th>
            <th width="60">ID</th>
            <th width="130">属性名称</th>
            <th width="100">类型</th>
            <th width="110">是否可选</th>
            <th width="170">可选值列表</th>
            <th >操作</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>



<script type="text/javascript">
    /*管理员-角色-添加*/
    function admin_role_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*管理员-角色-编辑*/
    function admin_role_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }

    //设置存储 ajax数据 缓存数据
    var cucat_attribute = new Array();
    //收集下拉 属性值
    function show_type(){

        //收集id
        var type_id = $('[name=type_id]').val();

        /**
         * 当此时点击属性 没有缓存 类型为undefined 如果此时属性有缓存 类型为 string
         *
         * */
        //判断是否有缓存
        if(typeof cucat_attribute[type_id] != "undefined")
        {

            //存在缓存 直调用缓存
            $('tbody').html(cucat_attribute[type_id]);

        }else
        {
            //console.log(typeof cucat_attribute[type_id]);
           //不存在缓存 重新请求
            $.ajax({
                url:"<?php echo url('admin/attribute/getAttributeType'); ?>",
                data:"type_id="+type_id,
                dataType:'json',
                type:'get',
                success:function (msg) {
                    //定义保存 html 变量
                    var htmlcont = "";
                    //遍历返回数据
                    $.each(msg,function(n,v){

                        htmlcont += '<tr class = "text-c">' +
                            '<td><input type="checkbox" value="" name=""></td>' +
                            '<td>'+v.attr_id+'</td>' +
                            '<td>'+v.attr_name+'</td>' +
                            '<td>'+v.type.type_name+'</td>' +
                            '<td>'+(v.attr_sel == 'only' ? '单选':'复选')+'</td>' +
                            '<td>'+v.attr_vals+'</td>' +
                            '<td class="f-14">' +
                            '<a title="编辑" href="javascript:;"  style="text-decoration:none">' +
                            '<i class="Hui-iconfont">&#xe6df;</i></a>' +
                            '<a title="删除" href="javascript:; class="ml-5" style="text-decoration:none">' +
                            '<i class="Hui-iconfont">&#xe6e2;</i>' +
                            '</a>' +
                            '</td>' +
                            '</tr>'
                    });

                    //制作缓存
                    cucat_attribute[type_id] = htmlcont;

                    //将拼接html
                    $('tbody').html(htmlcont);

                }
            });

        }


    }

    //当页面刷新
    $(function () {
        //自动调用一次方法
        show_type();
    })

</script>

</body>
</html>