<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>在线考核系统</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="/myweb/Public/index/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/myweb/Public/index/lib/bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="/myweb/Public/index/stylesheets/theme.css">
    <link rel="stylesheet" href="/myweb/Public/index/lib/font-awesome/css/font-awesome.css">

    <script src="/myweb/Public/index/lib/jquery-1.8.1.min.js" type="text/javascript"></script>

    <!-- Demo page code -->
    
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="javascripts/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7"> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8"> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9"> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body> 
  <!--<![endif]-->
    
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <ul class="nav pull-right">
                    
                    <li id="fat-menu" class="dropdown">
                        <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i>欢迎<?php echo (session('status')); ?>:<?php echo (session('username')); ?>

                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <!--<li><a tabindex="-1" href="#">Settings</a></li>-->
                            <li class="divider"></li>
                            <li><a tabindex="-1" id = 'loginout' href="#">注销</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="<?php echo u('Main/index');?>"><span class="first">在线考试</span> <span class="second">后台管理</span></a>
            </div>
        </div>
    </div>
    

    <div class="container-fluid">
        
        <div class="row-fluid">
            <div class="span3">
                <div class="sidebar-nav">
                  <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>用户管理</div>
                    <ul id="dashboard-menu" class="nav nav-list collapse in">
                        <li><a href="<?php echo u('Index/index');?>">用户列表</a></li>
                        <li ><a href="<?php echo u('User/index');?>">管理员列表</a></li>
                        <li ><a href="<?php echo u('User/add');?>">添加用户</a></li>
                        
                    </ul>
                <div class="nav-header" data-toggle="collapse" data-target="#accounts-menu"><i class="icon-briefcase"></i>试卷管理<span class="label label-info">(不完善)</span></div>
                <ul id="accounts-menu" class="nav nav-list collapse in">
                  <li ><a href="<?php echo U('Exam/addtitlelist','','');?>">试卷列表</a></li>
                  <li ><a href="<?php echo u('Exam/index');?>">题库展示</a></li>
                  <li ><a href="<?php echo u('Exam/add');?>">添加分类</a></li>
                  <li ><a href="<?php echo U('Exam/addtitle','','');?>">添加题目</a></li>
                  <li ><a href="<?php echo U('Exam/trach','','');?>">题目回收站</a></li>
 
                </ul>


                <div class="nav-header" data-toggle="collapse" data-target="#legal-menu"><i class="icon-legal"></i>成绩管理</div>
                <ul id="legal-menu" class="nav nav-list collapse in">
                  <li ><a href="<?php echo u('Score/index');?>">成绩查询</a></li>
                </ul>
            </div>
        </div>
        <div class="span9">
            <script type="text/javascript" src="/myweb/Public/index/lib/jqplot/jquery.jqplot.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/myweb/Public/index/javascripts/graphDemo.js"></script>

<div class="stats">
</div>
        <div>

            <h1 class="page-title">添加分类</h1>

<div class="btn-toolbar">

    <button id="save" class="btn btn-primary"><i class="icon-save"></i> 提交</button>
<a class="btn btn-primary" href="<?php echo U('Exam/index','','');?>"> 返回</button>

    <a href="#myModal" data-toggle="modal" style="display:none" class="btn">删除</a>

  <div class="btn-group">

  </div>

</div>

<div class="well">

    <ul class="nav nav-tabs">

      <li class="active"><a href="#home" data-toggle="tab">添加</a></li>

  <!--    <li><a href="#profile" data-toggle="tab">密码</a></li>
-->
    </ul>

    <div id="myTabContent" class="tab-content">

      <div class="tab-pane active in" id="home">

     <form id="tab">

        <label>添加分类名称</label>

        <input type="text"  name="name"  value="" class="input-xlarge">

<span class="error" >分类名称不能为空！</span>


<label>排序</label>

        <input type="text" name="sort" value="100"  class="input-xlarge">
        <input type="hidden" name="pid" value=<?php echo ($pid); ?>>

     

       <!-- <select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
<option value="0" >  管理员</option>
<option value="1" >普通用户</option>

    </select>
-->
    </form>

      </div>

      <div class="tab-pane fade" id="profile">

   <!-- <form id="tab2">

        <label>New Password</label>

        <input type="password" class="input-xlarge">

        <div>

            <button class="btn btn-primary">Update</button>

        </div>

    </form>
-->
      </div>

  </div>



</div>



<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-header">

    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

    <h3 id="myModalLabel">删还是不删呢?好纠结～～</h3>

  </div>

  <div class="modal-body">

    

    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>你确定要删除这个用户?</p>

  </div>

  <div class="modal-footer">

    <button class="btn" data-dismiss="modal" aria-hidden="true">算了吧!</button>

    <button id="delete" class="btn btn-danger"  data-dismiss="modal">带他走!</button>

  </div>

</div>



        </div>

    </div>
</div>
      

    
    <footer>
        <hr>
        
        
        
    </footer>
    

    

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/myweb/Public/index/lib/bootstrap/js/bootstrap.js"></script>
  
<script>
$("#loginout").click(function () {

  var logurl = '<?php echo U('Index/loginout','','');?>';
//alert (logurl);
if(confirm('确定要退出登陆吗?')){

      location.href = logurl;

}


});

$("#save").click(function () {

if(confirm('确定要添加吗?')){
var url = '<?php echo U('Exam/runadd','','');?>';
//alert(1);
var name = $('input[name="name"]');
//alert(username);
var sort = $('input[name="sort"]');
var pid   = $('input[name="pid"]');
if(name.val()==''||name.val()==null)

{
$(".error").show();

}else{
//var id = $('input[name="id"]');
$.post(url,{name:name.val(),sort:sort.val(),pid:pid.val()},function(data){
             if(data.success==1){
                 
                   location.href = '<?php echo U('Exam/index');?>';

}


},'json');

}
}
})


$("#delete").click(function () {

var delurl = '<?php echo U('Index/delete',array('id'=>$res['id']),'');?>';

//alert(delurl);
//alert(1);

location.href = delurl;
})

</script>
<style>
.error{
 color:red;
font-size:10px; 
display:none
}
</style>

  </body>
</html>