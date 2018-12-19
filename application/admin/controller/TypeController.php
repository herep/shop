<?php

namespace app\admin\controller;

use app\admin\model\Type;
use think\Controller;
use think\Request;

class TypeController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $shuju = Type::select();

        $this->assign('shuju',$shuju);
       return $this->fetch();
    }


    public function acc(Request $request)
    {
        //接受post传值
        if ($request->isPost())
        {

            $type = new Type();
            //就收post值
            $type_name = $request->post();
            //写进数据库
            $reult = $type->allowField(true)->save($type_name);

            if ($reult)
            {
                return ['status'=>'success'];
            }else
            {
                return ['status' => 'files', 'errorinfo' =>'写入数据库，请联系管理员'];
            }

        }else
        {

            return $this->fetch();
        }

    }


}
