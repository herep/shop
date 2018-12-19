<?php

namespace app\admin\controller;

use app\admin\model\Goods;
use think\Controller;
use think\Request;
use app\admin\model\Attribute;
use app\admin\model\Type;
use think\Route;
use think\Validate;

class AttributeController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Type $type)
    {
//        $info = Attribute::where('type_id',$type->type_id)
//            ->with('type')
//            ->select();
//        $this->assign('info',$info);
        return $this->fetch();
    }

    /**
     * 添加 方法.
     *
     * @return \think\Response
     */
    public function acc(Request $request)
    {
       //判断传递方式
        if ($request->isPost())
        {
            //接受post传值
            $shuju = $request->post();

            //定义验证信息 验证规则
            $rules = [
                'attr_name' =>'require',
                'type_id'=>'require'
            ];

            $chack = [
              'attr_name.require' =>'属性名称不可以为空',
               'type_id.require'=>'归属类型必选'
            ];

            //验证
            $validata = new Validate($rules,$chack);
            if($validata->batch()->check($shuju))
            {
                //数据验证成功 写入
                $type = new Attribute();
                $result = $type->allowField(true)->save($shuju);

                //判断写入
                if($result)
                {
                    return ['status'=>'success'];
                }else
                {
                    return ['status'=>'failure','数据写入失败，请联系管理员'];
                }

            }else
            {
              //验证失败返回
                $error = $validata->getError();
                $error = implode(',',$error);
                return ['status'=>'failure','error'=>$error];

            }


        }else
        {
            //显示数据
            $typeinfo = Type::field('type_id,type_name')->select();
            $this->assign('typeinfo',$typeinfo);
            //渲染模板
            return $this->fetch();
        }
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function getAttributeType(Request $request)
    {
      $type_id = $request->get('type_id');

      if($type_id == 0)
      {
          //查询全部数据
          $info = Attribute::with('type')->select();
      }else
      {
        //根据type_id 获取相应 数据
          $info = Attribute::with('type')
              ->where('type_id',$type_id)
              ->select();
      }

      return $info;
    }

    /*
     *
     *
     * */
    public function getAttributeType2(Request $request)
    {
        //接受 get 传值
        $id = $request->get('type_id');

        //根据获取id  查询
        $info = Attribute::with('type')
                ->where('type_id',$id)
               ->select();

        return $info;
    }

    public function getAttributeType3(Request $request)
    {
        //接受 get 传值
        $id = $request->get('type_id');
        $goods_id = $request->get('goods_id');
        //根据获取id  查询
        $info = Attribute::with('type')
            ->where('type_id',$id)
            ->select();

        //查询对应的属性
        $attrs = Goods::Where(['type_id'=>$id,'goods_id'=>$goods_id])
                 ->value('goods_attrs');



        //将数据反序列化 并且 将数据增加到 info中
        if(!empty($attrs))
        {
            //反序列化
            $info_attrs = unserialize($attrs);
           //遍历数组 数据添加返回
           foreach($info as $k => $v)
           {
               foreach ($info_attrs as $kk => $vv)
               {
                   if ($v->attr_id == $kk)
                   {
                       $info[$k]['values'] = $vv;
                   }
               }
           }
        }
        return $info;
    }


}
