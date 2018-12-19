<?php

namespace app\admin\behavior;

use app\admin\model\Manager;

class CheckPermission{
    /*
     * 每个行为的默认方法 run
     * $params
     * */

    public function run(&$params)
    {
       //收集登录信息
        $mg_id = session('mg_id');
        $mg_name = session('mg_name');

        //判断 出去超级管理员admin
        if($mg_name !=="admin")
        {
            //路由获取 控制器名称-操作方法
            $pathinfo = request()->pathinfo();
            $pathinfo = rtrim($pathinfo,'.html');
            $path_arr = explode('/',$pathinfo);
            $nowCA = $path_arr[1].'-'.$path_arr[2];

            //获取当前用户的权限信息
            $have_permissions = Manager::alias('m')
                ->join('__ROLE__ r','m.role_id=r.role_id')
                ->where('m.mg_id',$mg_id)
                ->value('r.role_ps_ca');

            //判断 访问权限是否存在
            if(strpos($have_permissions,$nowCA) === false)
            {
                exit('禁止访问');
            }
        }
    }

}