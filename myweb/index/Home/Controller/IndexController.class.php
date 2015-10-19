<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<font color="red">这是我的第一个thinkphp测试</font>');
    }
}
