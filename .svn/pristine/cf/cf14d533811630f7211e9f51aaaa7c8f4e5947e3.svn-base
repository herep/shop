<?php

namespace app\admin\controller;

use app\admin\model\Category;
use app\admin\model\GoodsPics;
use think\Controller;
use think\Image;
use think\Request;
use app\admin\model\Goods;
use think\Validate;

class GoodsController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //获得商品表的信息
        $infos = Goods::order('goods_id desc')->paginate(4);

         //给模板传递信息
        $this->assign('infos',$infos);

        //获得页码列表
        $pagelist = $infos->render();
        $this->assign('pagelist',$pagelist);

        return view();
    }

    /**
     * 添加资源显示页面
     */
    public function acc(Request $request)
    {
        //判断传递方式
        if($request->isPost())
        {
            //接受到post值
            $shuju  = $request->post();

            //收取秒杀时间
            $shuju['start_time'] = strtotime($shuju['start_time']);
            $shuju['end_time']   = strtotime($shuju['end_time']);

            /*******************错误规则*******************************/
            $rules = [
                'goods_name'   => 'require|unique:goods|min:5',
                'goods_price'  => ['require', 'regex' => "/^(([1-9]\d{0-4})\.\d{2})|(0\.\d{2})$/"],
                'goods_number' => 'require|between:10,240',
                'goods_weight' => 'require|number|egt:100',
                'type_id'      =>  'require',
                'cat_id'       =>  'require',
                'goods_number_seckill' => 'between:10,240',
                'goods_price_seckill'  => ['regex'=>"/^(([1-9]\d{0,4}\.\d{2})|(0\.\d{2}))$/"],
            ];
            /*************************错误提示**************************/
            $msg = [
                'goods_name.require' => '商品名称必须填写',
                'goods_name.unique' => '商品名称已经被占用了',
                'goods_name.min' => '商品名称长度必须在五个以上',
                'goods_number.require' => '商品名称长度必须填写',
                'goods_number.between' => '商品数量要求在10到240之间',
                'goods_weight.require'=>'商品重量必须填写',
                'goods_weight.number' => '商品重量必须是数字',
                'goods_weight.egt' => '商品重量值要求大于100',
                'goods_price.require' => '商品价格必须填写',
                'goods_price.regex' => '商品价格格式必须是99999.99或是0.99',
                'type_id.require'   =>  '商品类型不可以为空',
                'cat_id'           => '商品分类必须选择',
                'goods_number_seckill.between' => '秒杀商品数量必须在10到240之间',
                'goods_price_seckill' => '秒杀商品价格必须格式要求是99999.99或是0.99格式'

            ];


            //实例化
            $validate =  new Validate($rules,$msg);
            //判断数据是否合法化
            if($validate->batch()->check($shuju))
            {
                //将获取的cat_id 调用方法处理
                $cat_id = $shuju['cat_id'];

                //调用获取 cat_id 数据方法
                $result = getParentsCatIds($cat_id);

               //将数据 一一分配给 一级 二级 三级 字段值中
               switch (count($result))
               {
                   case 1:
                       $shuju['cat_one_id'] = $result[0];
                       break;

                   case 2:
                       $shuju['cat_one_id'] = $result[0];
                       $shuju['cat_two_id'] = $result[1];
                       break;

                   case 3:
                       $shuju['cat_one_id'] = $result[0];
                       $shuju['cat_two_id'] = $result[1];
                       $shuju['cat_three_id'] = $result[2];
                       break;
               }

                //实例化
                $goods = new Goods();

                //把商品logo图片从临时位置 移动到真实位置
                if (!empty($shuju['goods_logo']))
                {
                   //判断年月目录 如果没有就创建
                    $dir = "./uploads/goods/".date('Ymd');
                    if(!file_exists($dir))
                    {
                        mkdir($dir,0777,true);
                    }
                    //改变 数据名称 路径
                    $truepath = str_replace('goodstmp','goods',$shuju['goods_logo']);

                    //挪动图片
                   rename($shuju['goods_logo'],$truepath);
                    //修改为真实图片路劲名字
                    $shuju['goods_logo'] = $truepath;
                }
                //将属性文件 序列化存储
                $shuju['goods_attrs'] = serialize($shuju['shuxing']);

                //写入数据库
                $result = $goods->allowField(true)->save($shuju);
                //判断
                if($result)
                {
                    //将相片储存在 数据库中
                    pics_deal($goods->goods_id);

                    //维护新品商品 statrt
                    $redis = get_redis_obj();
                    $key = config('new_key');
                    //添加到 list 连表
                    $redis->lpush($key,$goods->goods_id);
                    //只保留 最新添加 前四个商品
                    $redis->ltrim($key,0,3);

                    return ['status'=>'success'];
                }else
                {
                    return ['status'=>'failure','数据写入失败，请联系管理员'];
                }

            }else
            {
                //如果数据不合法 返回客户端错误信息
                $errorinfo = $validate->getError();
                //将多个信息 用逗号分隔
                $errorinfo = implode(',',$errorinfo);
                //返回
                return ['status'=>'failure','errorinfo'=>$errorinfo];
            }

        }else
        {
            return  view();
        }


    }


    /**
     *修改资源显示页面
     */
    public function alter(Request $request , Goods $goods)
    {
       //判断是否 post 传递
       if($request->isPost())
       {
           //only  收取值 特定字段
           $shuju = $request->only('goods_id,goods_name,goods_price,goods_number,goods_weight,goods_introduce,type_id,cat_id,goods_logo,start_time,end_time,goods_number_seckill,goods_price_seckill');

           //接受商品属性 强制装换 类型 ---类型限制
           $shuju['goods_attrs'] =serialize($request->post('shuxing/a'));

           $shuju['start_time'] = strtotime($shuju['start_time']);
           $shuju['end_time'] = strtotime($shuju['end_time']);


           //接受值存在数组中


           /*******************错误规则*******************************/
           $rules = [
               'goods_name' => 'require|unique:goods|min:5',
               'goods_price' => ['require', 'regex' => "/^(([1-9]\d{0-4})\.\d{2})|(0\.\d{2})$/"],
               'goods_number' => 'require|between:10,240',
               'goods_weight' => 'require|number|egt:100',
               'type_id'      => 'require',
               'cat_id'      => 'require',
               'goods_number_seckill' => 'between:10,240',
               'goods_price_seckill' => ['regex'=>"/^(([1-9]\d{0,4}\.\d{2})|(0\.\d{2}))$/"],
           ];
           /*************************错误提示**************************/
           $msg = [
               'goods_name.require' => '商品名称必须填写',
               'goods_name.unique' => '商品名称已经被占用了',
               'goods_name.min' => '商品名称长度必须在五个以上',
               'goods_number.require' => '商品名称长度必须填写',
               'goods_number.between' => '商品数量要求在10到240之间',
               'goods_weight.require'=>'商品重量必须填写',
               'goods_weight.number' => '商品重量必须是数字',
               'goods_weight.egt' => '商品重量值要求大于100',
               'goods_price.require' => '商品价格必须填写',
               'goods_price.regex' => '商品价格格式必须是99999.99或是0.99',
               'type_id.require'   =>'属性类型必须选',
               'cat_id.require'    =>'商品类型必须选',
               'goods_number_seckill.between' => '秒杀商品数量必须在10到240之间',
               'goods_price_seckill' => '秒杀商品价格必须格式要求是99999.99或是0.99'
            ];
           //实例化对象 传入参数-错误提示+错误规则
           $validate =  new Validate($rules,$msg);

           //调用
           if($validate->batch()->check($shuju))
           {
               //收取 cat_id
               $result = getParentsCatIds($shuju['cat_id']);

               switch (count($result))
               {
                   case 1:
                       $shuju['cat_one_id'] = $result[0];
                       break;
                   case 2:
                       $shuju['cat_one_id'] = $result[0];
                       $shuju['cat_two_id'] = $result[1];
                       break;
                   case 3 :
                       $shuju['cat_one_id'] = $result[0];
                       $shuju['cat_two_id'] = $result[1];
                       $shuju['cat_three_id'] = $result[2];
               }

               //判断 是否有新图片传入
             if(strpos($shuju['goods_logo'],'goodstmp') != false)
             {
                 //判断是否 有原图片
                 if(!empty($goods->goods_logo) && file_exists($goods->goods_logo))
                 {
                     //删除原图片
                     unlink($goods->goods_logo);
                 }
                 //goods 创建新图片路径
                 $dir = './uploads'.'/goods/'.date('Ymd');
                 //判断目录是否存在
                 if(!file_exists($dir))
                 {
                     mkdir($dir,0777,true);
                 }
                 //将 图片路径进行移动
                 $newpath = str_replace('goodstmp','goods',$shuju['goods_logo']);

                 rename($shuju['goods_logo'],$newpath);

                 //将路径 赋值
                 $shuju['goods_logo'] = $newpath;
             }else
             {
                 //如果没有上传图片 删除 字段 防止数据库写入
                 unset($shuju['goods_logo']);
             }


               $result = $goods->update($shuju);

               //判断数据是否写入 返回json类型数据
               if($result)
               {
                   //调用 相片墙 功能
                   pics_deal($goods->goods_id);
                   //向客户端返回数据
                   return ['status'=>'success'];

               }else
               {
                   return ['status'=>'failure','error'=>'数据写入失败'];
               }
           }else
           {
               //调用方法你显示错误信息
               $errorinfo = $validate->getError();
               $errorinfo = implode(',',$errorinfo);
               return ['status'=>'failure','errorinfo'=>$errorinfo];

           }


       }else
       {
           $goodpics = new GoodsPics();
           //查询出 所有对应 中图
           $pics = $goodpics->where('goods_id',$goods->goods_id)
                             ->field('pics_mid')
                             ->select();
         $picsArray = [];
         foreach($pics as $k => $v)
         {

             $picsArray[] = ['path'=>substr($v->pics_mid,1)];
         }

           $this->assign('picsArray',json_encode($picsArray));
           //传递信息到模板中
           $this->assign('info',$goods);
           return view();
       }


    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function del(Request $request, Goods $goods)
    {

        $result = $goods->delete();

        //返回的是 删除的个数
        if($result)
        {
            return ['status'=>'success'];
        }else
        {
            return ['status'=>'failure'];
        }

    }

    /**
     *接受传过来的图片
     *
     * @return \think\Response
     */
    public function logo_up(Request $request)
    {

        //接受图片的附件信息
        $file = $request->file('mylogo');
        //附件储存位置
        $path = "./uploads/goodstmp";
        //系统给附件一个随机的名字
        $result = $file->move($path);
        //判断文件上传成否
        if($result)
        {
            //返回当文件名给客户端使用
            $logopathname = $result->getPathname();
            //改变路径
            $logopathname = str_replace("\\","/",$logopathname);
            //书写返回数组
            $info = ['status'=>'success','logopathname'=>$logopathname];
            echo json_encode($info);

        }else
        {
            $info = ['status'=>'failure','erroinfo'=>$file->getError()];
            echo json_encode($info);
        }
        //禁止输出后续信息
        exit;
    }


    public function pic_up(Request $request)
    {
        //接受 图片信息
        $file = $request->file('mypics');

        //将附件 传入临时文件
        $path = "./uploads/picstmp";

        $result = $file->move($path);


        if ($result)
        {
            //修改 文件路径名称
            $picspathname = $result->getPathname();
            $picspathname = str_replace("\\","/",$picspathname);


            //制作缩略图
            $im = Image::open($picspathname);// --找到原图

            $im ->thumb(800,800,6);//  --制作大图
            $bigpathname = $path.'/'.date('Ymd').'/big_'.$result->getFilename();
            $im -> save($bigpathname);

            //制作中图
            $im -> thumb(400,400,6);
            $midpathname = $path.'/'.date('Ymd').'/mid_'.$result->getFilename();
            $im -> save($midpathname);

            //将成功信息 返回客户端显示
            $info  = [
              'status' =>'success',
              'bigpathname' => $bigpathname,
              'midpathname' => $midpathname,
            ];

            echo json_encode($info);
        }else
        {
            //上传失败
            $info = ['status'=>'failure','errorinfo'=>$file->getError()];
            echo json_encode($info);
        }

        exit;

    }


    public  function pic_del(Request $request)
    {
        //接受post值
        if($request->post())
        {
            //收取值
            $shuju = $request->post('path');
            //第一步 删除 数据库值
            $re = GoodsPics::where('pics_mid',$shuju)
                ->delete();

            //进行物理删除
            $big_path = str_replace('mid','big',$shuju);
            unlink($shuju);
            unlink($big_path);

            if ($re)
            {
                return ['status'=>'success'];
            }else
            {
                return ['status'=>'fielus'];
            }



        }
    }

    public function change_promotion(Request $request)
    {
        //获取 传递数据
        if($request->isPost())
        {
            $shuju['goods_id'] = $request->post('id');
            $shuju['is_promotion']=$request->post('is_pro');


            //进行数据库修改
            $result = Goods::update($shuju);
            if($result)
            {
                //将数据 存入 redis
                $k = config('pro_key');
                $red = get_redis_obj();
                //添加促销 增加 反正 删除 key
                if ($shuju['is_promotion'] == 1)
                {
                    //增加 key
                    $red ->sadd($k,$shuju['goods_id']);
                }else
                {
                    //删除 key
                    $red ->srem($k,$shuju['goods_id']);
                }
              return ['status'=>'success'];
            }else
            {
                return ['status'=>'files'];
            }
        }
    }

    public function setsalenum(Request $request)
    {
        //接受值
        $shuju['goods_id'] = $request->post('goods_id');
        $shuju['goods_salenum']  = $request->post('salenum');

        //进行数据库修改
        $result = Goods::update($shuju);

        if($result)
        {
            //获取对象
            $red = get_redis_obj();
            $key = config('host_key');
            $red ->zadd($key,$shuju['goods_salenum'],$shuju['goods_id']);
            if ($red->zCard($key)>4)
            {
                //删除 '热卖数量’
                $red->zremrangebyrank($key,0,0);
            }
           return ['status'=>'success'];
        }else
        {
            return ['status'=>'files'];
        }


    }

    public function index_seckill()
    {
        //获取当前时间戳
        $time = time();

        //获得商品表信息，并实现数据分页
        $infos = Goods::order('goods_id desc')
            ->where('start_time','<',$time)
            ->where('end_time','>',$time)
            ->paginate(8);

        //向模板传递变量信息
        $this->assign('infos',$infos);

        //获取分页信息
        $page = $infos->render();
        $this->assign('page',$page);

        return $this->fetch();
    }

}
