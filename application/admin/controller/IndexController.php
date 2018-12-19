<?php
namespace app\admin\controller;
use \think\Controller;
use app\admin\model\Manager;
use app\admin\model\Permission;
use think\Request;

class IndexController extends Controller
{
    /**
     * 显示后台索引页面
     */
    public function index(Request $request)
    {

        //根据登录信息 判断登录用户等级session
        $username = session('mg_name');
        $id = session('mg_id');


        //判断登录用户名
        if($username === 'admin')
        {
            //超级用户获取所有权限管理 1 and 2
            $ps_infoA = Permission::where('ps_level','0')->select();
            $ps_infoB = Permission::where('ps_level','1')->select();
        }else
        {
           //先查询 登录普通用户 的 role_ps_ids 的值 根据用户mg_id
           $rolepsid = Manager::alias('m')
               ->join('__ROLE__ r','m.role_id=r.role_id')
               ->where('m.mg_id',$id)
               ->value('r.role_ps_ids');

           //根据用户的 role_ps_id 101,104,102,107  或是 102，107，108 查询出 permission中的 ps_name

            //查询 权限0
            $ps_infoA = Permission::where('ps_id','in',$rolepsid)
                ->where('ps_level','0')
                ->select();
            //查询 权限1
            $ps_infoB = Permission::where('ps_id','in',$rolepsid)
                ->where('ps_level','1')
                ->select();

        }
//        var_dump($ps_infoA,$ps_infoB);
        //向模板 传递 权限
        $this->assign('ps_infoA',$ps_infoA);
        $this->assign('ps_infoB',$ps_infoB);

        return $this->fetch();
    }

    /**
     * 右下角路由单独处理
     */
    public function welcome()
    {
        return $this->fetch();
    }
}
