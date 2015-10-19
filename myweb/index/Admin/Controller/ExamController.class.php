<?php

namespace Admin\Controller;
use       Think\Controller;


Class ExamController extends SessionController{
//添加分类列表视图
public function index(){
 $re= M('exam')->order('sort')->select();

//$res = getparents($re,7);
//p($res);

 $resu= limit_merge($re);
  //p($res);
//die;    


      $this->res=$resu;
      $this->display();
}



//添加分类
public function add(){
$this->pid = I('pid',0,'intval');

$this->display();



}


//添加分类处理
public function runadd(){

//p(I('post.'));

//die;
if(M('exam')->add($_POST)){

$this->ajaxReturn(array('success'=>1));

}

}

//处理排序

public function sort(){
//p(I('post.'));    
foreach($_POST  as $id=>$sort){
M('exam')->where(array('id'=>$id))->setField('sort',$sort);

}
$this->redirect('Exam/index');

}
//删除分类处理
public function del(){
$re=M('exam')->where(array('id'=>I('id')))->delete();
if($re){
$this->success('删除成功',u('Exam/index'));
}else{
$this->error('删除失败');
}
}
//试卷题目视图
public function addtitlelist (){

if(!$resu=S('addtitlelist')){
//$field =array('del');
//$where = array('del'=>0);

$resul= D('ExamRelation')->getTrach();
//$this->res=$User->field($field,true)->where($where)->relation(true)->select();
//p($title);


}else{

S('addtitlelist',$resul,10);
}
$this->res=$resul;

$this->display();


}



//添加题目视图
public function addtitle(){
$re = M('exam')->order('sort')->select();
$resu=limit_merge($re);


$this->res=$resu;
$this->display();

}

//添加试卷处理
public function runaddtitle(){


$data=array(
'caption'=>I('title'),
'content'=>I('content'),
'cid'=>I('cid'),
'answer'=>I('answer'),
'time'=>time()

);
$re=M('title')->data($data)->add();
if($re){
$this->success('添加成功',u('Exam/addtitlelist'));

}else{
$this->error('添加失败');
}
}

 //删除/还原到回收站
public function deletetotrach(){

//P(I('id'));

$type=(int)$_GET['type'];
$msg=$type?'删除':'还原';
$data=array(
'id'=>(int)($_GET['id']),
'del'=>$type,

);
$re=M('title')->save($data);
if($re){
$this->success($msg.'成功!!',U('Exam/addtitlelist'));
}else{
$this->error($msg.'失败!');

}
}

public function trach(){

$this->res = D('ExamRelation')->getTrach(1);
$this->display('addtitlelist');

}
//彻底删除
public function realdel(){
//p(I('id'));
$re=M('title')->where(array('id'=>I('id',0,'intval')))->delete();
if($re){
$this->success('已经彻底删除!',U('Exam/trach','',''));

}else{
$this->error('彻底删除失败!');
}
} 


//清空回收站处理
public function emptytrach(){
if(I('action')=='empty'){
$res = M('title')->where(array('del'=>1))->delete();
if($res){
$this->success('清空成功!',U('Exam/trach','',''));
}else{
$this->error('清空失败');
}

}


}


}//class 终结


/**
 *  
 */



