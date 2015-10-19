<?php

namespace Admin\Controller;
use       Think\Controller;

Class SessionController extends Controller{

public function _initialize(){

if(!isset($_SESSION['username'])){

$this->redirect('Login/index');

}


}

}
