<?php

use think\route;


//首页路由
Route::any('/','home/index/index',['method'=>'get|post']);
//home分组
Route::group('home',function (){
    Route::rule('index/index','home/index/index','GET');

    Route::rule('goods/index','home/goods/index','GET');
    Route::rule('goods/detail','home/goods/detail','GET');

    Route::any('seckill/index','home/seckill/index',['method'=>'get|post']);
    Route::any('seckill/shop','home/seckill/shop',['method'=>'get|post']);

    Route::any('user/login','home/user/login',['method'=>'get|post']);
    Route::any('user/register','home/user/register',['method'=>'get|post']);
    Route::get('user/reg_success','home/user/reg_success');
    Route::get('user/active','home/user/active');
    Route::get('user/logout','home/user/logout');

    Route::post('shop/acc','home/shop/acc');
    Route::get('shop/acc_show','home/shop/acc_show');
    Route::any('shop/showgoods','home/shop/showgoods',['method'=>'get|post']);
    Route::any('shop/del_goods','home/shop/del_goods',['method'=>'get|post']);
    Route::any('shop/changenum','home/shop/changenum',['method'=>'get|post']);
    Route::any('shop/jiesuan','home/shop/jiesuan',['method'=>'get|post']);
    Route::any('shop/makeorder','home/shop/makeorder',['method'=>'get|post']);
    Route::any('shop/orderpay','home/shop/orderpay',['method'=>'get|post']);
    Route::get('shop/return_url','home/shop/return_url');
    Route::post('shop/notify_url','home/shop/notify_url');


    Route::rule('gbook/index','home/gbook/index','GET');
});

//admin分组
Route::group('admin',function (){

    //会员登录-登录管理系统
    Route::any('manager/login','admin/manager/login',['method'=>'get|post']);
    //会员退出
    Route::get('manager/logout','admin/manager/logout');

    //后台首页
    Route::group('',function (){
        Route::rule('index/index','admin/index/index','GET');
        Route::rule('index/welcome','admin/index/welcome','GET');
    },['after_behavior'=>'\app\admin\behavior\CheckLogin']);

    Route::group('',function (){
        //商品 增加-修改-删除-列表页面-图片上传管理
        Route::any('goods/acc','admin/goods/acc',['method'=>'get|post']);
        Route::any('goods/alter','admin/goods/alter',['method'=>'get|post']);
        Route::post('goods/del','admin/goods/del');
        Route::rule('goods/index','admin/goods/index','GET');
        Route::post('goods/logo_up','admin/goods/logo_up');
        Route::post('goods/pic_up','admin/goods/pic_up');
        Route::post('goods/pic_del','admin/goods/pic_del');
        Route::post('goods/change_promotion','admin/goods/change_promotion');
        Route::post('goods/setsalenum','admin/goods/setsalenum');
        Route::any('goods/index_seckill','admin/goods/index_seckill',['method'=>'get|post']);

        //分组 角色列表展示-修改角色
        Route::rule('role/index','admin/role/index','GET');
        Route::any('role/alter','admin/role/alter',['method'=>'get|post']);

        //权限列表展示 - 权限的添加
        Route::rule('permission/index','admin/permission/index','GET');
        Route::any('permission/acc','admin/permission/acc',['method'=>'get|post']);

        //类型列表 展示-添加
        Route::get('type/index','admin/type/index');
        Route::any('type/acc','admin/type/acc',['method'=>'get|post']);

        Route::get('attribute/index','admin/attribute/index');
        Route::any('attribute/acc','admin/attribute/acc',['method'=>'get|post']);
        Route::get('attribute/getAttributeType','admin/attribute/getAttributeType');
        Route::get('attribute/getAttributeType2','admin/attribute/getAttributeType2');
        Route::get('attribute/getAttributeType3','admin/attribute/getAttributeType3');

        Route::get('category/index','admin/category/index');
        Route::get('category/getcateinfo','admin/category/getcateinfo');
        Route::post('category/del','admin/category/del');
        Route::post('category/udl','admin/category/udl');

        Route::get('order/index','admin/order/index');
        Route::get('order/detail','admin/order/detail');

    },['after_behavior'=>['\app\admin\behavior\CheckLogin','\app\admin\behavior\CheckPermission']]);
});


