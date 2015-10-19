<?php
namespace Admin\Controller;
use       Think\Controller;

Class LoginController extends Controller{

public function index(){


$this->display();

}
//处理登陆界面数据

public function login(){

//p(I('post.'));die;

$username = I('username');
$password = I('password');
$res = M('admin')->where(array('username'=>$username))->find();

if($res){
   if($password==$res['password']){

//$this->ajaxReturn(array('success'=>1));
                  $data['success']=1;
                   session('username',$res['username']);
                    session('password',$res['password']);   
                     session('id',$res['id']);
                      session('status',$res['status']);                 
}else{
      $data['success']=0;

}

}else{
$data['success']=2;

}



echo json_encode($data);
//$this->ajaxReturn(array('success'=>1));

}

//处理注册界面
public function register(){

//p(I('post.'));

$username=I('username');
$password=I('password');


$res=M('admin')->where(array('username'=>$username))->find();
if($res){
$this->error('用户已经存在');

}else{

$data=array(
'username'=>$username,
'password'=>$password,
'status'=>'普通用户'

);
$re=M('admin')->data($data)->add();
//p($re);die;
if($re){
  $id = $re ;
session('id',$id);       
 session('username',$username);
            session('password',$password);
                session('status','普通用户');   
$this->success('注册成功,正在登陆...',U('Main/index','',''));

}
}



}

}
