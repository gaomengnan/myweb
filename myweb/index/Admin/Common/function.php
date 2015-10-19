<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/9/24
 * Time: 0:36 这里的自定义函数大多数都是递归调用
 */
// 组合多维数组
function node_merge($node,$pid=0){
//    p($node);
$arr=array();

    foreach($node as $v){

if($v['pid']==$pid){

    $v['child']=node_merge($node,$v['id']);
    $arr[]=$v;
}

    }
return $arr;
}




function access_merge($node,$access=null,$pid=0){
//    p($node);
    $arr=array();

    foreach($node as $v){

        if(is_array($access))

        {
            $v['access']=in_array($v['id'],$access)?1:0;

        }

        if($v['pid']==$pid){

            $v['child']=access_merge($node,$access,$v['id']);
            $arr[]=$v;
        }

    }
    return $arr;
}




function  p($arr){
echo '<pre>'.print_r($arr,true).'</pre>';


}









//组合一维数组
function limit_merge($res,$html='-----',$pid=0,$level=0){

$arr=array();
foreach ($res as $v){
if($v['pid']==$pid){
$v['level']=$level+1;
$v['html']=str_repeat($html,$level);
$arr[]=$v;
$arr = array_merge($arr,limit_merge($res,$html,$v['id'],$level+1));
}
}
return $arr;
}








//首页->男装->西服 能够实现这种效果
//传递一个子级id返回所有的父级分类
 function getparents($cate,$id){

$arr=array();
foreach($cate as $v){

if($v['id']==$id){
$arr[]=$v;
$arr=array_merge($arr,getparents($cate,$v['pid']));
}
}
return $arr;


}

//传递父级id返回所有子分类id
function getchildsid($cate,$pid){
$arr=array();
foreach ($cate as $v){

if($v['pid']==$pid){
$arr[]=$v['id'];
$arr=array_merge($arr,getchildsid($cate,$v['id']));
}
}
return $arr;

}
//传递父级id返回所有子分类的集和
function getchilds($cate,$pid){
$arr=array();
foreach($cate as $v){
if($v['pid']==$pid){
$arr[]=$v;
$arr = array_merge($arr,getchilds($cate,$v['id']));

}

}
return $arr;
}
