<?php

namespace  app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Role;
use app\admin\model\Permission;
use think\Validate;

class RoleController extends Controller
{
    /**
    *
     *
     *权限主页面业务 控制器
     **/
    public  function  index()
    {
        //实例化 调用数据
       $info =  Role::select();
       $this->assign('info',$info);
        return $this->fetch();
    }
     /*
      * 权限修改功能
      *
      * */
    public function alter(Request $request,Role $role)
    {
        //判断请求方式
        if($request->isPost())
        {
            //获取数据
            $shuju = $request->post();

            //定义规则
            $rules = [
                'role_name'=>'require',
                'quanxian'=>'require|min:2',
            ];
            $notices = [
                'role_name.require'=>'角色名称名称必填',
                'quanxian.require'=>'权限必填',
                'quanxian.min'=>'权限必须选择两个'
            ];

            $validata = new Validate($rules,$notices);
            if ($validata->batch()->check($shuju))
            {
                //制作 role_ps_ids 字段
                $role_ps_ids = implode(',',$shuju['quanxian']);

                //sql 语句
                $cas = Permission::where('ps_id','in',$role_ps_ids)
                    -> where('ps_level','neq','0')
                    ->column("concat(ps_c,'-',ps_a) as ca");

                //把数组变成字符串
                $role_ps_ca = implode(',',$cas);

                //拼接写入数组
                $data['role_id'] = $shuju['role_id'];
                $data['role_name'] = $shuju['role_name'];
                $data['role_ps_ids'] = $role_ps_ids;
                $data['role_ps_ca'] = $role_ps_ca;

                //写入
                $result = $role->update($data);

                //判断
                if($result)
                {
                    return ['status'=>'success'];
                }else
                {
                    return ['status'=>'error','errorinfo'=>'内部错误，请联系管理员'];
                }

            }else
            {
                //返回规则错误
                return ['status'=>'error','errorinfo'=>implode(',',$errorinfo)];

            }


        }else
        {
            //获取 修改数据
            $this->assign('info',$role);

            //获取权限  的级别
            $ps_infoA = Permission::where('ps_level','0')->select();
            $ps_infoB = Permission::where('ps_level','1')->select();
            $ps_infoC = Permission::where('ps_level','2')->select();
            //级别传给模板
            $this->assign('ps_infoA', $ps_infoA);
            $this->assign('ps_infoB', $ps_infoB);
            $this->assign('ps_infoC', $ps_infoC);

            return $this->fetch();
        }


    }


}