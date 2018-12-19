<?php

namespace app\home\controller;

use think\Controller;
use mailer\tp5\Mailer;
use think\Request;
use think\Validate;
use app\home\model\User;

class UserController extends Controller
{
    /**
     * 会员登录
     */
    public function login(Request $request)
    {
        //接受判断接受方式
        if ($request->isPost())
        {
            // 受数据
            $shuju['username'] = $request->post('username');
            $shuju['password'] =md5( $request->post('password'));
            //判断 数据是否合理
            $user = new User();
            $result = $user->where(['username'=>$shuju['username'],'password'=>$shuju['password']])->find();

            if ($result == null )
            {
                $this->assign('shuju',$shuju);
                $this->assign('errorinfo','账户密码出错');
                return $this->fetch();

            }elseif($result->is_active == '否')
            {
                $this->assign('shuju',$shuju);
                $this->assign('errorinfo','请登录邮箱激活账号');
                return $this->fetch();
            }else
            {
                //持久化 账户信息
                session('username',$shuju['username']);
                session('user_id', $result->user_id);

                //跳转页面
                return $this->redirect('/');
            }

        }else
        {
            return $this->fetch();
        }

    }

    /**
     * 会员注册
     */
    public function register(Request $request)
    {
      //判断请方式
        if($request->isPost())
        {
            //接收数据
            $shuju['username'] = $request->post('username');
            $shuju['password'] = $request->post('password');
            $shuju['user_email'] = $request->post('email');
            $shuju['password2']  = $request->post('password2');

            //设置验证规则
            $rules = [
              'username'  =>  'require|unique:user',
                'user_email' =>  'require|email',
                'password'   => 'require',
                'password2'   => 'require|confirm:password'
            ];

            $notices = [
                 'username.require'  =>  '用户名必须填写',
                'username.unique'    =>   '用户名已存在',
                'user_email.require' =>  '邮箱必须填写',
                'user_email.email'   =>   '必须填写邮箱格式',
                'password.require'   =>  '密码不可以为空',
                ' password2.require'   => '确认密码不可以为空',
                'password2.confirm'  =>  '两次输入密码不同'
            ];

            //验证
            $validate = new Validate($rules,$notices);
            if($validate->batch()->check($shuju))
            {
                //  验证通过 写入数据库
                $shuju['password'] = md5($shuju['password']);
                $user = new User();
                $result = $user -> allowField(true)->save($shuju);

                if ($result)
                {
                   //写入数据库 同时发送消息
                    //制作验证码  并写入数据库
                   $code = uniqid();
                   $user->where('user_id',$user->user_id)->update(['verify_code'=>$code]);

                   //发送邮件
                    $url = $shuju['user_email'];
                    $title = '激活会员账户';
                    $html = '<p>恭喜你，新账号已经注册成功，请点击如下链接激活账号</p>';
                    $h = "http://www.pygshop.com/home/user/active/user_id/".$user->user_id."/checkcode/".$code;
                    $html .= "<p><a href='$h'>$h</a></p>";
                    set_register($url,$title,$html);

                    //展示 一个注册成功页面
                    return $this->fetch('reg_success');

                }else
                {
                   echo '注册失败，联系管理员';
                }
            }else
            {
                //收集错误信息
                $error = $validate->getError();
                $this->assign('error',$error);

                $this->assign('shuju',$shuju);
                return $this->fetch();

            }


        }else
        {
            return $this->fetch();
        }

    }

    //会员账户激活
    public function active(Request $request,User $user)
    {
        //接受 id  验证码
        $code = $request->param('checkcode');
        $id = $request->param('user_id');


        //与数据库进行比较
        if ($code == $user->verify_code)
        {
            //改变激活状态  删除激活码
           $re = $user->where('user_id',$id)->update(['is_active'=>'是','verify_code'=>'']);

           if ($re)
           {
               //跳转 成功页面
               $this->assign('status','success');
               return $this->fetch('act_result');

           }


        }
    }

    public function logout()
    {
        //清除 缓存
        session(null);
        //跳转
       return $this->redirect('login');
    }

}
