<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Flat Dark Web Login Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />

<link href="/myweb/Public/login/css/style.css" rel='stylesheet' type='text/css' />
<link href="/myweb/Public/bootstrap/css/bootstrap.min.css"  rel='stylesheet' type='text/css' / >
<script type="text/javascript" src="/myweb/Public/login/js/jquery.min.js"></script>
<style>
.error{
font-size:20px,
color:red


}

.register{
   font-size: 30px;
   color: #fff;
   outline: none;
   border: none;
   background: #ff2775;
   width: 100%;
   padding: 18px 0;
   border-bottom-left-radius: 15px;
         -webkit-border-bottom-left-radius: 15px;
         -moz-border-bottom-left-radius: 15px;
         -o-border-bottom-left-radius: 15px;
         border-bottom-right-radius: 15px;
         -webkit-border-bottom-right-radius: 15px;
         -moz-border-bottom-right-radius: 15px;
         -o-border-bottom-right-radius: 15px;
         cursor: pointer;


}

 .register:hover {
         background: #3ea751;
   border-bottom-left-radius: 15px;
         -webkit-border-bottom-left-radius: 15px;
         -moz-border-bottom-left-radius: 15px;
         -o-border-bottom-left-radius: 15px;
         border-bottom-right-radius: 15px;
         -webkit-border-bottom-right-radius: 15px;
         -moz-border-bottom-right-radius: 15px;
         -o-border-bottom-right-radius: 15px;
         transition: 1s all;
         -webkit-transition: 1s all;
         -moz-transition: 1s all;
        -o-transition: 1s all;
 }





</style>
</head>
<body>
<script>$(document).ready(function(c) {
	$('.close').on('click', function(c){
		$('.login-form').fadeOut('slow', function(c){
	  		$('.login-form').remove();
		});
	});	  
});
</script>
























</div>
<div class="login-form">
	<div class="close"> </div>
	<div class="head-info">
		<label class="lbl-1"> </label>
		<label class="lbl-2"> </label>
		<label class="lbl-3"> </label>
	</div>
	<div class="clear"> </div>
	<div class="avtar"><img src="/myweb/Public/login/images/avtar.png" /></div>
	<form>
<div id="userN">
<input type="text" name="username" class="text"  required='required'  placeholder='请输入用户名'   onFocus="this.value = '';" >
<span id="span1"   style="font-size:16px;color:red" > </span>
</div>
<div class="key">
<input type="password" name="password"   required='required'  placeholder='请输入密码'  onFocus="this.value = '';">

<span style="font-size:16px;color:red" id="span2" > </span>
</div>


</form>




	<input type="submit" id="login" value="Login" >
<button class="register" data-toggle="modal" 
   data-target="#myModal">
   注册


</div>

</div>
</div>





<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
             用户注册
            </h4>
         </div>
         <div class="modal-body">
 <form class="form-inline" action="<?php echo U('Login/register');?>" method="post" >
<div class="form-group">
            <label>姓名</label>
<input type="text" name="username" class="class-controll"required placeholder="请输入用户名"  >
</div>
<div class="form-group">
<label>密码</label>
<input type="text" name="password"  class="from-controll"  required   placeholder="请输入密码" >
</div>
 </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">关闭
            </button>
            <button type="submit" class="btn btn-primary">
               提交
            </button>
         </div>
</form>
      </div><!-- /.modal-content -->
</div><!-- /.modal -->
</div>










</body>

<script>

$("#login").click(function (){

var url = '<?php echo U('Login/login','','');?>';
//alert(url);
var username = $('input[name=username]');
if(username.val()==''){
var msg = '<p>用户名不能为空!!</p>';
var par = $("#span1");
par.append(msg);

setTimeout(function(){par.html('');},300);return false;

}
var password = $('input[name=password]');
if(password.val()==''){

var msg = '<p>密码不能为空!!</p>';
var par = $('#span2');
par.append(msg);
setTimeout(function(){par.html('');},300);return false;
}
$.post(url,{username:username.val(),password:password.val()},function(data){
if(data.success==1){
location.href = '<?php echo U('Main/index');?>';

}
if(data.success==0){
//alert('密码错误');
var msg = '<p>密码错误！！</p>';
var par = $("#span2");
par.append(msg);

setTimeout(function(){par.html('');},300);return false;


}if(data.success==2){
//alert('用户名不存在');
var msg="<p>用户名不存在！！</p>";
var par = $("#span1");
par.append(msg);

setTimeout(function(){par.html('');},300);return false;

}




},'json');




})

</script>
<script src="/myweb/Public/bootstrap/js/bootstrap.min.js"></script>
</html>