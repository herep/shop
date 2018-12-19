<?php

namespace app\admin\controller;

use app\admin\model\Category;
use think\Controller;
use think\Request;


class CategoryController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
         return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     * @return \think\Response
     */
    public function getcateinfo()
    {
       $shuju = Category::field('cat_id,cat_pid,cat_name,cat_level')->select();
       return $shuju;
    }

    //服务器删除节点操作
    public function del(Request $request)
    {
        //接受 post值
        $id = $request->post('id');
        $result = Category::destroy($id);

        //判断删除操作
        if($result)
        {
            return ['status'=>'success'];
        }else
        {
            return ['status'=>'files'];
        }
    }

    //商品节点修改

    public  function udl(Request $request)
    {
        //接受数据
        $shuju['cat_id'] = $request->post('cat_id');
        $shuju['cat_name'] =  $request->post('cat_name');
        $shuju['cat_pid'] =   $request->post('cat_pid');
        $shuju['cat_level'] = $request->post('cat_level');

        //实例化 模型
        $category = new Category();
        //判断 是已经存在节点修改 或是  新增节点添加
        if($shuju['cat_id'] == 0)
        {
            //删除 cat_id  让数据库自动生成 cat_id
            unset($shuju['cat_id']);
            // 写入数据库
            $result = $category->save($shuju);
            //判断
            if ($result)
            {
                return ['status'=>'success','info'=>'添加成功','cat_id'=>$category->cat_id];
            }else
            {
                return ['status'=>'failes','info'=>'添加失败，联系管理员'];
            }

        }else
        {
            //进行该数据库的修改
            $result = Category::update($shuju);
            //判断
            if ($result)
            {
                return ['status'=>'success','info'=>'修改成功','cat_id'=>$shuju['cat_id']];
            }else
            {
                return ['status'=>'failes','info'=>'修改失败'];
            }
        }


    }
}
