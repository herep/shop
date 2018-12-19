<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:67:"D:\www\pygshop\public/../application/admin\view\category\index.html";i:1543829585;s:54:"D:\www\pygshop\application\admin\view\public\head.html";i:1543668841;s:60:"D:\www\pygshop\application\admin\view\category\js_index.html";i:1543830888;s:54:"D:\www\pygshop\application\admin\view\public\foot.html";i:1539756530;}*/ ?>
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



<title>商品分类</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商品中心 <span class="c-gray en">&gt;</span> 商品分类 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div style="width: 400px;height: 510px;float: left;cursor: pointer">
        <h3 onclick="add_root()">添加根节点</h3>
    </div>
</div>

<link rel="stylesheet" href="<?php echo config('plugin'); ?>zTree_v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
<script type="text/javascript" src="<?php echo config('plugin'); ?>zTree_v3/js/jquery.ztree.all.js"></script>

<div class="page-container">
    <div>
        <ul id="mystree" class="ztree"></ul>
    </div>
</div>

<script type="text/javascript">
    //点击事件
    function add_root()
    {
        //获得 zTree 树对象
        var zTree = $.fn.zTree.getZTreeObj('mystree');

        //添加根节点
        var  newnode = zTree.addNodes(null,{
            cat_id:0,
            cat_pid:0,
            cat_name:'new node'+(newCount++),
            cat_level:0
        });

        //设置 某节点 进入编辑
        zTree.editName(newnode[0]);
    }
    var setting =
   {
       callback: {
         beforeRemove: zTreeBeforeRemove,
           //服务器端进行真实删除 删除以后触发方法
           onRemove : zTreeOnRemove,
           //当修改以后触发方法
           onRename : zTreeOnRename

       },
       edit:{
           //激活按钮
           enable : true,
           //显示 删除按钮
           showRemoveBtn: setRemoveBtn,
           //删除按钮显示信息
           removeTitle:"删除",

           //是否显示修改按钮
           showRename:true,
           //点击修改按钮以后，‘全局’被修改
           editNameSeletAll:true,
           //修改按钮提示信息
           renameTitle:"编辑",

       },
        data:{
            key: {
                name : "cat_name"
            },
            simpleData: {
                //设置简易模式
                enable : true,
                idKey: "cat_id",
                pIdKey: "cat_pid",
                //设置显示删除按钮
            },
        },
       view: {
           //当鼠标划过节点，“显示”添加节点
           addHoverDom: addHoverDom,
           //鼠标划过节点 去除“添加节点”
           removeHoverDom: removeHoverDom,
       },
    };

    //鼠标滑过 出现加号
    var newCount = 1;
    function addHoverDom(treeId, treeNode) {
        //treeNode 目标节点 对象 添加子节点的 节点

        //获取目标节点 所在的span元素的jquery对象
        var sObj = $("#" + treeNode.tId + "_span");

        //判断按钮 是否已经存在 true 停止下面的代码执行
        if (treeNode.editNameFlag || $("#addBtn_"+treeNode.tId).length>0) return;

        //把添加按钮 对应html代码制作
        var addStr = "<span class='button add' id='addBtn_" + treeNode.tId
            + "' title='add node' onfocus='this.blur();'></span>";

        //将 添加按钮 追加目标节点 形成后续兄弟节点
        sObj.after(addStr);

        //获取 按钮的jquery 对象
        var btn = $("#addBtn_"+treeNode.tId);

        //给添加按钮 设置 onclick点击事件
        if (btn) btn.bind("click", function(){
            //增加时 判断 分类只可以 小于等于3
            if(treeNode.cat_level > 1)
            {
                layer.msg('商品的分类等级最多三级',{icon:1,time:1000});
                return false;
            }
           //获取当前 zTree树 对象
            var zTree = $.fn.zTree.getZTreeObj("mystree");

            //给 treeNode 目标节点 添加一个子节点
         var newnodes = zTree.addNodes(treeNode, {
                cat_id:0,
                cat_pid:treeNode.cat_id,
                cat_name:"new node" + (newCount++),
                //子节点 level=父节点 level+1
                cat_level:treeNode.level+1
            });

            //添加完以后进入修改状态
            zTree.editName(newnodes[0]);

            return false;
        });
    };

    //鼠标滑过 加号移除
    function removeHoverDom(treeId, treeNode) {
        $("#addBtn_"+treeNode.tId).unbind().remove();
    };


    //删除按钮 设置方法
    function setRemoveBtn(treeId,treeNode)
    {
        return !treeNode.isParent;
    }

    //删除 节点方法
    function  zTreeBeforeRemove(treeId,treeNode)
    {
        //treeNode 可以捕捉到 节点的相关信息
        if(window.confirm('确认删除【'+treeNode.cat_name+'】节点吗？'))
        {
            //确认删除 返回true
            return true
        }
        //不删除 返回 false
        return false;
    }

    //确定删除后 服务器端的删除方法
    function  zTreeOnRemove(event,treeId,treeNode)
    {

        //发送ajax 请求 进行删除
        $.ajax({
            data:'id='+treeNode.cat_id,
            type:'post',
            dataType:'json',
            url:"<?php echo url('del'); ?>",
            success:function(msg)
            {
                //判断
                if(msg.status == 'files')
                {
                    alert('删除失败,请联系管理员');
                }
            }
        })
    }

    //改变一会后触发 该方法 进行服务器的修改
    function  zTreeOnRename(event,treeId,treeNode)
    {
        //接受传递 修改属性的节点
        var shuju = {
            cat_id: treeNode.cat_id,
            cat_name: treeNode.cat_name,
            cat_level: treeNode.cat_level,
            cat_pid: treeNode.cat_pid
        }
       //发送请求 对于服务器数据库进行修改
        $.ajax({
            url: "<?php echo url('udl'); ?>",
            data:shuju,
            dataType:'json',
            type:'post',
            success:function (msg) {
                if(msg.status == 'success')
                {
                    //将节点 现在id 赋予
                    treeNode.cat_id = msg.cat_id;
                    layer.msg('【'+treeNode.cat_name+'】'+msg.info,{icon:1,time:1000});
                }else
                {
                    layer.msg(msg.info,{icon:1,time:1000});
                }

            }
        })
    }

    // 通过ajax 设置 树状数据
    $.ajax({
        type:'get',
        dataType:'json',
        url:'<?php echo url("getcateinfo"); ?>',
        success:function(msg){

            var zNodes = msg;

            $(function () {
                $.fn.zTree.init($('#mystree'),setting,zNodes);
            });
        }
    });


</script>
</body>
</html>

<style type="text/css">
  .ztree li span.button.add {
      margin-left: 2px;
      margin-right:-1px;
      background-position: -144px 0;
      vertical-align: top;
      *vartical-align:middle
  }
</style>