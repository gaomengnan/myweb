<?php

namespace Admin\Controller;
use        Think\Controller;

Class UserController extends SessionController{
        public function index(){ 
//import('ORG.Util.Page');
     $username = I('search');
//p($username);

    $User = M('admin'); // 实例化User对象
    $where['status']='管理员';
    $where['username']=array('like','%'.$username.'%');
    $count      = $User->where($where)->count();// 查询满足要求的总记录数
    $Page       = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
       $map['status']='管理员';
      $map['username']=$username;    
foreach($map as $key=>$val) {
    $Page->parameter[$key]   =   urlencode($val);
     }
       $Page->setConfig('header', '条数据');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('end', '末页');
    $show       = $Page->show();// 分页显示输出
    // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    $list = $User->where($where)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
   //p($list)    
$this->assign('list',$list);// 赋值数据集
    $this->assign('page',$show);// 赋值分页输出
    $this->display(); // 输出模板


}




public function delete(){

$id = I('id');
$res = M('admin')->where(array('id'=>$id))->delete();
if($res){
$this->success('删除成功',u('User/index'));

}else{
$this->error('删除失败');

}
}

public function edit(){

//p(I('id'));
$id = I('id');

$this->res=M('admin')->where(array('id'=>$id))->find();
$this->display();

}

public function save(){

$data = array(
 'username'=>I('username'),
  'password'=>I('password'),
   'status'=>I('status')


);
$res=M('admin')->where(array('id'=>I('id')))->data($data)->save();

if($res){
 $data['success']=1; 

}

echo json_encode($data);
}




public function export(){



header("Content-type:application/vnd.ms-excel"); 
header("Content-Disposition:filename=user.xls");
$str = "编号, 姓名, 角色\n";
$type = I('select');
switch($type){
case 1:
$res = M('admin')->select();
break;
case 2:
$res = M('admin')->where(array('status'=>'管理员'))->select();
break;
case 3:
$res = M('admin')->where(array('status'=>'普通用户'))->select();
break;

}
foreach($res as $row){

$str.=$row['id'].",".$row['username'].",".$row['status']."\n";
}
echo $str;

}

public function add(){
  $this->display();


}
public function adduser(){


  $res = M('admin')->add($_POST);
  if($res){
       $data['success']=1;

}
$this->ajaxReturn($data);
}

}   


