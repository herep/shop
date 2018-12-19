<?php

/***************************************按照上下级关系获取权限信息*********************************/
function generateTree($data)
{
    $items = array();
    //遍历数组 将数组的下标变成 ps_id的值
    foreach ($data as $v)
    {
        $items[$v['ps_id']] = $v;
    }

    $tree =array();
    foreach ($items as $key =>$item)
    {
       //判断
        if(isset($items[$item['ps_pid']])){
            //true  也就是所有的子级权限值变成一个数组追加到 父级数组中的 son下标中
            $items[$item['ps_pid']]['son'][] = &$items[$key];
        }else
        {
            //false 也就是三个父级权限 组成一个数组
            $tree[]= &$items[$key];
        }
    }

   //return $tree;

    //返回 下标值
   return getTreeData($tree);
}

function getTreeData($tree)
{
    static $arr = array();
    //对于 三个 父级数组 一个一个进行操作 也就是 排序
    foreach ($tree as $t )
    {
        // 此时只有 三个父类权限数组 这三个数组包含son字段 son中包含着所有的子等级 数组值
        //保存每一行值 并销毁 下标为 son的值 也就是销毁 整个son 所有的子类数组
        $tmp = $t;
        unset($tmp['son']);

        //现在保存 已经被销毁的 父级数组
        $arr[] = $tmp;
        if(isset($t['son']))
        {
            //判断 son是否还有值  将此时操作的父级权限数组中的 son数组进行操作
            //也就是相当于 在此时父级权限数组 下面排序 排上对应son中 的三个子等级进行排序并且列出来
            getTreeData($t['son']);
        }
    }
    //返回 现在排好序的数值
    return $arr;
}
/*************************************按照上下级关系获取权限信息**********************************************/