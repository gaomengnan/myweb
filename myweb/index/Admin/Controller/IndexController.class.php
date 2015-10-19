<?php
namespace Admin\Controller;
use Think\Controller;  //后台显示页面class IndexController extends SessionController {
class IndexController extends SessionController {

    public function index(){

          // $res =  M('admin')->select();
           //p($res);die;

$username = I('search');

p($username);


$User = M('admin'); // 实例化User对象
$where['status']='普通用户';
$where['username']=array('like','%'.$username.'%');
$count      = $User->where($where)->count();// 查询满足要求的总记录数
$Page       = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)

foreach($where as $key=>$val){
$Page->parameter[$key]    = urlencode($val);

}
//$re         =$Page->setConfig('header','个会员');

        $Page->setConfig('header', '条数据');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('end', '末页');


$show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$list = $User->where($where)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
//$this->assign('re',$re);
$this->assign('list',$list);// 赋值数据集
$this->assign('page',$show);// 赋值分页输出
$this->display(); // 输出模板

 
       
}













public function loginout(){
              
      //session_destroy(); 
      session('[destroy]');
      
       redirect(U('Login/index'));

}

//用户修改
 public function edit(){
//p(I('id'));die();
$this->res =  M('admin')->where(array('id'=>I('id')))->find();



$this->display();
}

public function save(){

//p(I('post.'));
//die;

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









public  function delete(){

  $res =  M('admin')->where(array('id'=>I('id')))->delete();
   if($res){
  $this->success('删除成功',U('Index/index'));

}else{


$this->error('删除失败
');


}
}



public function select(){

$val = I('val');







$where['username']=array('like','%'.$val.'%');

$User = M('admin'); // 实例化User对象
$count      = $User->count();// 查询满足要求的总记录数
$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
//$re         =$Page->setConfig('header','个会员');
$show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$list = $User->order('id')->where($where)->select();
foreach ($list as $row){

$arr[]=array('id'=>$row['id'],'username'=>$row['username'],'password'=>$row['password'],'status'=>$row['status'],'show'=>$show);

}

echo json_encode($arr);

}



}

