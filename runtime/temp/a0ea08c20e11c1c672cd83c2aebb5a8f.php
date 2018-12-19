<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"D:\www\pygshop\public/../application/admin\view\goods\alter.html";i:1544285849;s:54:"D:\www\pygshop\application\admin\view\public\head.html";i:1543668841;s:57:"D:\www\pygshop\application\admin\view\goods\js_alter.html";i:1545141413;s:54:"D:\www\pygshop\application\admin\view\public\foot.html";i:1539756530;}*/ ?>
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


<title>添加商品 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-member-add">
        <div id="tab-system" class="HuiTab">
            <div class="tabBar cl">
                <span>通用信息</span>
                <span>详情描述</span>
                <span>商品属性</span>
                <span>商品相册</span>
                <span>秒杀商品</span>
            </div>
            <div class="tabCon">
                <input type="hidden" name="goods_id" value="<?php echo $info['goods_id']; ?>"/>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商品名：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="<?php echo $info['goods_name']; ?>" placeholder="" id="goods_name" name="goods_name">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分类：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text"   id="cat_show" onclick="show_cat_stree(this)" readonly="readonly"/>
                        <input type="hidden" id="cat_id" name="cat_id" value="<?php echo $info['cat_id']; ?>">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>价格：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="<?php echo $info['goods_price']; ?>" placeholder="" id="goods_price" name="goods_price">
                    </div>
                </div>

                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>数量：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="<?php echo $info['goods_number']; ?>" placeholder="" id="goods_number" name="goods_number">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>重量：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="<?php echo $info['goods_weight']; ?>" placeholder="" id="goods_weight" name="goods_weight">
                    </div>
                </div>

                <link href="<?php echo config('plugin'); ?>hhuploadify/HHuploadify.css" rel="stylesheet" type="text/css">
                <script src="<?php echo config('plugin'); ?>hhuploadify/HHuploadify.js" type="text/javascript"></script>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商品图片：</label>
                    <div class="formControls col-xs-8 col-sm-9" id="goodslogo">
                    </div>
                    <input type="hidden" name="goods_logo" id="goods_logo" value="<?php echo substr($info['goods_logo'],1); ?>"/>
                </div>
            </div>
            <div class="tabCon">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>介绍：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <textarea id="goods_introduce"  name="goods_introduce" style="width: 540px;height:200px;"><?php echo $info['goods_introduce']; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="tabCon">
                <div    class="cl pd-5 bg-1 bk-gray mt-20" id="goods_type_attr">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商品类型：</label>
                    <select name="type_id"  onchange="show_attribute3()">
                        <option  value="">-所有商品类型-</option>
                        <?php $_result=get_type_info();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <option  value="<?php echo $v['type_id']; ?>"
                        <?php if($info['type_id'] == $v['type_id']): ?>selected = "selected" <?php endif; ?>
                        ><?php echo $v['type_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="tabCon">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商品相册：</label>

                    <div class="formControls col-xs-8 col-sm-9" id="goodspics">
                    </div>

                    <div id="pics_input"></div>
                    <div id="have_pice" style="display: none;"><?php echo $picsArray; ?></div>
                </div>
            </div>
            <div class="tabCon">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>秒杀开始时间：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" readonly="readonly" name="start_time" id="start_time"
                               <?php if(!(empty($info['start_time']) || (($info['start_time'] instanceof \think\Collection || $info['start_time'] instanceof \think\Paginator ) && $info['start_time']->isEmpty()))): ?>
                               value="<?php echo date('Y-m-d H:i:s',$info['start_time']); ?>"
                               <?php endif; ?>
                        >
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>秒杀结束时间：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" readonly="readonly" name="end_time" id="end_time"
                               <?php if(!(empty($info['end_time']) || (($info['end_time'] instanceof \think\Collection || $info['end_time'] instanceof \think\Paginator ) && $info['end_time']->isEmpty()))): ?>
                               value="<?php echo date('Y-m-d H:i:s',$info['end_time']); ?>"
                               <?php endif; ?>
                        >
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>秒杀价格：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="<?php echo $info['goods_price_seckill']; ?>"  name="goods_price_seckill" >
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>秒杀数量：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="<?php echo $info['goods_number_seckill']; ?>"  name="goods_number_seckill" >
                    </div>
                </div>
            </div>
            <link type="text/css" rel="stylesheet" href="<?php echo config('plugin'); ?>jeDate/skin/jedate.css">
            <script type="text/javascript" src="<?php echo config('plugin'); ?>jeDate/src/jeDate.js"></script>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>

    <link rel="stylesheet" href="<?php echo config('plugin'); ?>zTree_v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
    <script type="text/javascript" src="<?php echo config('plugin'); ?>zTree_v3/js/jquery.ztree.all.js"></script>


    <style type="text/css">
        .contentTree{
            z-index:100;
            overflow-y:scroll;
            display:none;
            position:absolute;
            background-color:white;
            width:530px;
            height:200px;
            border:1px solid gray;
        }
    </style>

    <div class="contentTree">
        <div>
            <ul id="mystree2" class="ztree"></ul>
        </div>
    </div>
</article>


<script type="text/javascript" src="<?php echo config('plugin'); ?>ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo config('plugin'); ?>ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="<?php echo config('plugin'); ?>ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
    //激活添加商品form表单
    $(function(){
        $("#tab-system").Huitab({
            index:0
        }) ;
    });
/*********************************************************************************************************************/
    var ue = UE.getEditor('goods_introduce',{toolbars:[[
        'fullscreen', 'source', '|', 'undo', 'redo', '|',
        'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
        'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
        'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
        'directionalityltr', 'directionalityrtl', 'indent', '|',
        'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
        'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
        'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo'
    ]]});


/*********************************************************************************************************************/



    $(function(){
        new HHuploadify({
            container:'#goodslogo',
            single:true,
            chooseText:'选取图片',
            auto:true,
            url:'<?php echo url("logo_up"); ?>',
            field:'mylogo',

            //上传插件初始化完毕后调用的方法 函数
            onInit:function()
            {
                var goods_logo = $('#goods_logo').val();
                //判断当前商品有logo图片
                if(goods_logo != '')
                {
                    //如果存在原图 将原图显示出来
                    this.options.files = [{path:goods_logo}];
                }
            },

            //上传文件成功后
            onUploadSuccess:function (file,data) {
                var obj = JSON.parse(data);
                if(obj.status == 'success')
                {
                     //把上传好的图片路径赋予 id
                    $('#goods_logo').val(obj.logopathname);
                }else
                {
                    layer.msg('上传文件失败',{icon:5,time:1000});
                }
            },
               //回调事件
            onRemoved:function () {
               //清除goods_logo隐藏域信息
               $('$goods_logo').val('');

            },
        })
    });
/*********************************************************************************************************************/
    $(function(){
        new HHuploadify({
            container:'#goodspics',
            chooseText:'选取图片',
            auto:true,
            url:'<?php echo url("pic_up"); ?>',
            field:'mypics',

            //上传插件初始化
            onInit:function()
            {
                //获取div  中 图片信息
              var have_pics = JSON.parse($('#have_pice').html()) ;
              //判断 当前 商品 logo
                if (have_pics != '')
                {
                    //将图片回显
                    this.options.files = have_pics;

                }
            },
            //上传文件 回调函数
            onUploadSuccess:function (file,data) {
                var obj = JSON.parse(data);
                if(obj.status == 'success')
                {
                    //获取上图 span 元素id属性值
                    var span_id = file.element.id;

                    var big = '<input type="hidden" class="'+span_id+'" name="pics_big[]" value="'+obj.bigpathname+'">';
                    var mid = '<input type="hidden" class="'+span_id+'"  name="pics_mid[]" value="'+obj.midpathname+'">';

                    $('#pics_input').append(big);
                    $('#pics_input').append(mid);
                }else
                {
                    layer.msg('上传文件失败',{icon:5,time:1000});
                }
            },

            //写入 删除处理回调函数
            onRemoved:function (file) {
               // console.log(file.path);
                //判断 是否是原有logo
                if(typeof file.path != 'undefinde')
                {
                    //发送请求 进行物理删除
                    var path = '.'+file.path;
                    $.ajax({
                        data:'path='+path,
                        type:'post',
                        dataType:'json',
                        url: "<?php echo url('pic_del'); ?>",

                        success:function(msg)
                        {
                           if(msg.status == 'success')
                           {
                               layer.msg('已删除',{icon:5,time:1000});
                           }else
                           {
                               layer.msg('删除失败，请联系管理员',{icon:5,time:1000});
                           }
                        }
                    })
                }
            }
        })
    });

/*********************************************************************************************************************/

    
    var setting =
        {
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
            callback:{
                onClick:getCatVal,
            }
        };
    //页面加载 显示 树形分类信息
    $(function(){
        //发送请求
        $.ajax({
            url:'<?php echo url("category/getcateinfo"); ?>',
            dataType:'json',
            type:'get',
            success:function (msg) {
                $.fn.zTree.init($("#mystree2"),setting,msg);

                //获得树对象
                var treeObj = $.fn.zTree.getZTreeObj("mystree2");
                //获取当前商品 拥有的分类 cat_id  信息
                var cat_id = $('#cat_id').val();
                //根据 cat_id 查询对应 树子节点
                var  nownode = treeObj.getNodeByParam('cat_id',cat_id,null);

                //将拥有分类 cat_nam 显示
                $('#cat_show').val(nownode.cat_name);

                //并且属于选中状态
                treeObj.selectNode(nownode);
            }
        });

    });
    //点击 输入框 赋值方法
    function getCatVal(event,treeId,treeNode)
    {
        //获取 点击值
        $('#cat_show').val(treeNode.cat_name);
        $('#cat_id').val(treeNode.cat_id);
        //取消body 显示时间
        $('body').unbind('mouserdown',bodydown);
    }

    //树 显示方法
    function show_cat_stree(obj)
    {
        //获取 分类表单域 举例浏览器 左边上边 距离
        var ps = $(obj).offset();
        var ht = $(obj).outerHeight();

        //设置ztree 树的位置
        $('.contentTree').css({left:ps.left,top:ps.top+ht});

        //显示
        $('.contentTree').slideDown('fast');

        //绑定 非树区  关闭树  mousedown ---鼠标不需要抬起 触发
        $('body').bind('mousedown',bodydown);
    }

    //点击显示方法
    function bodydown(evt) {
        //点击区域 不是树 并且 不是树内部结点 区域
        if(evt.target.className != 'contentTree' && $(evt.target).parents('.contentTree').length !=1)
        {
            //关闭树
            $('.contentTree').slideUp('fast');

            //取消body 的事件
            $('body').unbind('mouserdown',bodydown);
        }
    }

/**********************************************************************************************************************/

<!--请在下方写此页面业务相关的脚本-->

    $(function () {
        //为form表单设置点击事件
        $('#form-member-add').submit(function (evt) {
            //阻止原本form表单提交
            evt.preventDefault();

            //收集表单值
            var shuju = $(this).serialize();

            $.ajax({
                url:"<?php echo url('goods/alter'); ?>",
                data:shuju,
                dataType:'json',
                type:'post',
                success:function (msg) {
                    if(msg.status=='success')
                    {
                        layer.alert('添加成功',{icon:6},function(){
                            //父页刷新
                            parent.window.location=parent.window.location;
                            //关闭本身的弹出窗口
                            layer_close();

                        });
                    }else
                    {
                        layer.alert('添加失败【'+msg.errorinfo+'】',{icon:5});
                    }
                }
            });

        });
    });
 /**********************************************************************************************************************/

    //每次加载 执行一次方法
    $(function(){
      show_attribute3();
    });

    function show_attribute3(){
        //收取id
        var id = $('[name=type_id]').val();
        //收取 goods id
        var goods_id = $('[name=goods_id]').val();


        //发送请求
        $.ajax({
            data:'type_id='+id+'&goods_id='+goods_id,
            type:'get',
            dataType:'json',
            url:"<?php echo url('admin/attribute/getAttributeType3'); ?>",
            success:function (msg) {

                //拼接html页面
                var htmlcont = '';
                //遍历数据
                $.each(msg,function (n,v) {
                    //判断 返回数据 是否设置属性值
                    if(typeof v.values == 'undefined')
                    {
                        //未针对商品设置商品 不用回显数据
                        //判断 attr_sel only对应输入框 或是 many对应多选框
                        if(v.attr_sel == 'only')
                        {
                            //输入框
                            htmlcont += '<div  class="cl bg-1 ">';
                            htmlcont += '<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>'+v.attr_name+':</label>';
                            htmlcont += '<div class="formControls col-xs-8 col-sm-9">';
                            htmlcont += '<input type="text" class="input-text" name="shuxing['+v.attr_id+'][]">';
                            htmlcont += '</div></div>';

                        }else
                        {
                            //下拉列表
                            htmlcont += '<div  class="cl"><label class="form-label col-xs-4 col-sm-3">'
                            htmlcont += '<e onclick="add_attribute(this)">[+]</e>';
                            htmlcont += '<span>'+v.attr_name+'：</span></label>';
                            htmlcont += '<div class="formControls col-xs-8 col-sm-9">';
                            htmlcont += '<select name="shuxing['+v.attr_id+'][]">';
                            htmlcont += '<option value="0">请选择</option>';
                            //获取“可选框中”信息
                            var vals_arr = v.attr_vals.split(',');
                            //遍历
                            $.each(vals_arr,function(nn,vv){
                                htmlcont += '<option value = "'+vv+'">'+vv+'</option>';
                            });
                            htmlcont += '</select>';
                            htmlcont += '</div></div>';
                        }

                    }else
                    {
                        //判断 属性值 属性下拉框 或是 输入框
                       $.each(v.values,function (kkk,vvv) {
                           if(v.attr_sel == 'only')
                           {
                               //输入框
                               htmlcont += '<div  class="cl bg-1 ">';
                               htmlcont += '<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>'+v.attr_name+':</label>';
                               htmlcont += '<div class="formControls col-xs-8 col-sm-9">';
                               htmlcont += '<input type="text" class="input-text" name="shuxing['+v.attr_id+'][]" value="'+vvv+'">';
                               htmlcont += '</div></div>';


                           }else
                           {
                               //下拉列表
                               htmlcont += '<div  class="cl "><label class="form-label col-xs-4 col-sm-3">'
                               //第一个+号 其余 减号
                              if(kkk == 0)
                              {
                                  htmlcont += '<e onclick="add_attribute3(this)">[+]</e>';
                              }else
                              {
                                  htmlcont += '<e onclick="$(this).parents(\'div.cl\').remove()">[-]</e>>';
                              }
                               htmlcont += '<span>'+v.attr_name+'：</span></label>';
                               htmlcont += '<div class="formControls col-xs-8 col-sm-9">';
                               htmlcont += '<select name="shuxing['+v.attr_id+'][]">';
                               htmlcont += '<option value="0">请选择</option>';
                               //获取“可选框中”信息
                               var vals_arr = v.attr_vals.split(',');
                               //遍历
                               $.each(vals_arr,function(nn,vv){
                                   htmlcont += '<option value = "'+vv+'"';
                                   //判断 实体属性默认值 选中
                                   if(vvv == vv)
                                   {
                                       htmlcont += ' selected = "selected"';
                                   }
                                   htmlcont += '>'+vv+'</option>';
                               });
                               htmlcont += '</select>';
                               htmlcont += '</div></div>';

                           }
                       })

                    }

                });

                //清除原先旧的属性表单域
                $('#goods_type_attr').siblings().remove();
                $('#goods_type_attr').after(htmlcont);


            }

        });
    }

    //点击[+]加号 增加本身项目
    function add_attribute3(obj) {
       //复制一份 追加节点 保存在变量中
        var fu_div = $(obj).parents('div.cl').clone();
        //删除增加节点中的 加号
        fu_div.find('e').remove();

        //追加 [-] 号
        fu_div.find('span').before('<e onclick="$(this).parents(\'div.cl\').remove()">[-]</e>>');
        //追加此时的节点中  当做兄弟节点
        $(obj).parents('div.cl').after(fu_div);
    }

</script>
<script>
    /*秒杀开始 结束时间*/
    $(function(){
        //开始时间
        var start = {
            minDate:function()
            {
                //最小时间 限制本身

                //获取 输入框数据
                var starttime = $('#start_time').val();
                //判断 不存在返回 现在时间
                return starttime ? starttime : jeDate.nowDate();
            },
            //最da时间
            maxDate:function () {
                var endtime = $('#end_time').val();
                return endtime ? endtime : "2099-12-31";
            },

            format:'YYYY-MM-DD hh:mm:ss',
            zIndex:2099,

        };

        //结束时间参数
        var end = {
            minDate:function () {
                //最小时间 限制为 开始时间 或是当前时间
                var starttime = $('#start_time').val();
                return starttime ? starttime:jeDate.nowDate();

            },
            maxDate:"2099-12-31",
            format:"YYYY-MM-DD hh:mm:ss",
            zIndex:2099,
        };

        //开始时间
        jeDate('#start_time',start);
        //结束时间
        jeDate('#end_time',end);
    })
</script>


<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>