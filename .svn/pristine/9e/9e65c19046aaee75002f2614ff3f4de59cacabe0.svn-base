<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use  app\admin\model\Permission;
use  think\Validate;

class PermissionController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //获取权限列表信息并传递给模板
        $info = Permission::select();

        //调用方法
        $results = [];
        foreach ($info as $v)
        {

            $results[] = $v->toArray();
        }


       $datas = generateTree($results);

       $this->assign('infos',$datas);
       return $this->fetch();

    }

    /**
     * 增加方法.
     *
     * @return \think\Response
     */
    public function acc(Request $request)
    {
        //判断接受形式
        if($request->isPost())
        {
            //接受post值
           $shuju = $request->post();
           $results = [
             'ps_name'=>'require',
           ];
           $bath = [
               'ps_name.reqire'=>'权限名称不可以为空',
           ];
           $validate = new Validate($results,$bath);
           if($validate->batch()->check($shuju))
           {
               if($shuju['ps_pid']==0)
               {
                   $shuju['ps_level'] = 0;
               }else
               {
                   $level = Permission::where('ps_id',$shuju['ps_pid'])
                       ->value('ps_level');

                   $shuju['ps_level'] = $level+1;
               }

               //存储数据库
               $permission = new Permission();
               $result = $permission->allowField(true)->save($shuju);

               if($result)
               {
                 return ['status'=>'success'];
               }else
               {
                   return ['status'=>'files','errroinfo'=>'写入数据库失败请联系管理员'];
               }
           }else
           {
               $errorinfo = $validate->getError();
               return ['status'=>'files','errorinfo'=>implode(',',$errorinfo)];
           }
           //
        }else
        {
            //查询出全部数据
            $info = Permission::select();
            //遍历 将对象数组  转化为纯数组
            $results = [];
            foreach($info as $v)
            {
              $results[]= $v->toArray();
            }
            //调用公共方法 重组数组
            $data = generateTree($results);
            //模板传值 渲染模板
            $this->assign('infos',$data);
            return $this->fetch();
        }


    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
