<?php

/**
 * 


 /**
  * 显示主页的控制器部分 
  */
 
 namespace Admin\Controller;
  use      Think\Controller;




Class MainController extends SessionController{


      //主页视图部分

    public function index(){
      $this->res=M('admin')->where(array('id'=>$_SESSION['id']))->find();
//p($res);
      $this->display();


}
  //处理修改信息
public function edit(){
//p(I('post.'));

$data = array(

'username'=>I('username'),
'password'=>I('password'),

);

$res=M('admin')->where(array('id'=>I('id')))->save($data);
if($res){
$this->success('修改成功',U('Index/loginout'));


}else{
$this->error('修改失败');

}

}

}

