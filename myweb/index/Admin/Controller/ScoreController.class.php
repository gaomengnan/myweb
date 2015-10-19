<?php
namespace Admin\Controller;
use       Think\Controller;
Class ScoreController extends Controller{



//分数列表视图
public function index(){

//p($_SESSION['username']);
//p($_SESSION['status']);
if($_SESSION['status']=='管理员'||$_SESSION['status']=='超级管理员' ){
$this->res=M('score')->select();

}else{

$this->res=M('score')->where(array('username'=>$_SESSION['username']))->select();

}

$this->display();


}




}
