<?php
//开启调试模式
define ('APP_DEBUG',True);

$_GET['m']='Admin';
//$_GET['c']='Login';
//定义入口文件的路径
define ('APP_PATH','./index/');
//引入think源码
require  './ThinkPHP/ThinkPHP.php';
