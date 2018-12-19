<?php

namespace app\admin\controller;


use think\Controller;
use think\Request;
use app\admin\model\Manager;
use think\Session;

class ManagerController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function login(Request $request)
    {
        //判断传值方式
        if ($request->isPost())
        {
            //判断 展示 和 收集
            $code = $request->post('yanzheng_code');

            if (captcha_check($code))
            {
                //收取 账户 密码 值
                $name = $request->post('mg_name');
                $pwd = md5($request->post('mg_pwd'));


                //调用方法对比数据库 判断
                $exists = Manager::where(['mg_name'=>$name,'mg_pwd'=>$pwd])->find();

                //判断
                if($exists)
                {
                    //账号密码正确 保存session值

                    session('mg_id',$exists->mg_id);
                    session('mg_name',$exists->mg_name);

                    //设置 登录成功跳转页面
                    $this->redirect('index/index');
                }else
                {
                    $this->assign('errorinfo','账号密码出错');
                }

            }else
            {
               $this->assign('errorinfo','验证码不正确');
            }


        }

        return $this->fetch();


    }

    public function logout()
    {
        //清除session
        Session::clear();
        //跳转页面
        $this->redirect('admin/manager/login');
    }


}
