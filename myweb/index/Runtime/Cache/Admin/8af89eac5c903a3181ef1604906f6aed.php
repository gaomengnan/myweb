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
                <a class="brand" href="<?php echo u('Main/index');?>" ><span class="first">在线考试</span> <span class="second">后台管理</span></a>
            </div>
        </div>
    </div>
    

    <div class="container-fluid">
        
        <div class="row-fluid">
            <div class="span3">
                <div class="sidebar-nav">
                  <div class="nav-header" id="user1"  data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>用户管理</div>
                    <ul id="dashboard-menu" class="nav nav-list collapse in">
                        <li><a href="<?php echo u('Index/index');?>">用户列表</a></li>
                        <li ><a href="<?php echo u('User/index');?>">管理员列表</a></li>
<li ><a href="<?php echo u('User/add');?>">添加用户</a></li>                        
                        
                    </ul>
                <div class="nav-header"  id="user2"   data-toggle="collapse" data-target="#accounts-menu"><i class="icon-briefcase"></i>试卷管理<span class="label label-info">(不完善)</span></div>
                <ul id="accounts-menu" class="nav nav-list collapse in">
                  <li ><a href="<?php echo U('Exam/addtitlelist','','');?>">试卷列表</a></li>
                  <li ><a href="<?php echo u('Exam/index');?>">题库展示</a></li>
                  <li ><a href="<?php echo u('Exam/add');?>">添加分类</a></li>
                  <li ><a href="<?php echo U('Exam/addtitle','','');?>">添加题目</a></li>
                  <li ><a href="<?php echo U('Exam/trach','','');?>">题目回收站</a></li>
 
                </ul>


                <div class="nav-header" data-toggle="collapse" data-target="#legal-menu"><i class="icon-legal"></i>成绩管理</div>
                <ul id="legal-menu" class="nav nav-list collapse in">
<li ><a href="<?php echo u('Score/index');?>">成绩列表</a></li>
               
 </ul>
            </div>
        </div>
        <div class="span9">
            <script type="text/javascript" src="/myweb/Public/index/lib/jqplot/jquery.jqplot.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/myweb/Public/index/javascripts/graphDemo.js"></script>


<div class="well">
<span class="error" >你没有权限这样做!</span>

<form action="<?php echo u('Exam/sort','','');?>" method="post">

    <table class="table table-condensed table-hover table-striped table-bordered ">

      <thead>

        <tr>

          <th>#</th>

          <th>分数</th>

          <th>姓名</th>
           <th>做题时间</th>
        </tr>

      </thead>

      <tbody>
<?php if(is_array($res)): foreach($res as $key=>$v): ?><tr>

          <td><?php echo ($v["id"]); ?></td>
<td><?php echo ($v["mark"]); ?></td>
          <td><?php echo ($v["username"]); ?></td>
<td><?php echo (date('Y-m-d H:i:s',$v["time"])); ?></td>

        </tr><?php endforeach; endif; ?>

      </tbody>

    </table>
</form>

<?php if(ACTION_NAME == "trach" ): ?><a class="btn btn-danger" href="<?php echo U('Exam/emptytrach',array('action'=>'empty'),'');?>">清空回收站</a><?php endif; ?>


<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <h3 id="myModalLabel">删除</h3>

    </div>

    <div class="modal-body">

        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>你确定要删除这个管理员吗?</p>

    </div>

    <div class="modal-footer">

        <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>

         <button class="btn btn-danger" id="delete" data-dismiss="modal">确定</button>

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


})


$("#delete").click( function () {
var status = '<?php echo (session('status')); ?>';
//alert(status);
if(status=='超级管理员'){
//alert(1);

var url = '<?php echo U('Exam/del',array('id'=>$v['name']),'');?>';
alert(url);
location.href = url;
}else{
$(".error").show(1000).hide(3000);


}

})

$("#export").click(function () {
$("#heh").toggle();

});


var sta = '<?php echo (session('status')); ?>';                                                                                                
      if(sta=='普通用户'){                                                                                                               
  $('#accounts-menu').hide();                                                                                                        
  $('#dashboard-menu').hide();                                                                                                         $('#user1').hide();                                                                                                                
  $('#user2').hide();                                                                                                                
 }                    



</script>
<style>
.error{
color:red;
font-size:17px;
display:none

}
</style>
  </body>
</html>