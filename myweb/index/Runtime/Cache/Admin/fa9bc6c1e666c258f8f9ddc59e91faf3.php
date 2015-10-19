<?php if (!defined('THINK_PATH')) exit();?><!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Modern an Admin Panel Category Flat Bootstarp Resposive Website Template | Login :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="/myweb/Public/Css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="/myweb/Public/Css/style.css" rel='stylesheet' type='text/css' />
<link href="/myweb/Public/Css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="/myweb/Public/Js/jquery.min.js"></script>
<!----webfonts--->
<link href='/myweb/Public/Fonts/fontawesome-webfont.ttf' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="/myweb/Public/Js/bootstrap.min.js"></script>
</head>
<body id="login">
  <div class="login-logo">
    <a href="<?php echo u(login/index);?>"><img src="/myweb/Public/Images/logo.png" alt=""/></a>
  </div>
  <h2 class="form-heading">login</h2>
  <div class="app-cam">
	  <form action="<?php echo U('Login/login');?>" method="post">
		<input type="text" name="username" class="text" value="E-mail/address" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'E-mail address';}">
		<input type="password" name="password" value="Password" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Password';}">
		<div class="submit"><input type="submit" onClick="myFunction()" value="Login"></div>
		<div class="login-social-link">
          <a href="index.html" class="facebook">

          </a>
          <a href="index.html" class="twitter">

          </a>
        </div>
		<ul class="new">
			<li class="new_left"><p><a href="#">Forgot Password ?</a></p></li>
			<li class="new_right"><p class="sign">New here ?<a href="register.html"> Sign Up</a></p></li>
			<div class="clearfix"></div>
		</ul>
	</form>
  </div>
   <div class="copy_layout login">
      <p>Copyright © 2015 Modern. All Rights Reserved | Design by <a href="http://www.mycodes.net/" target="_blank">源码之家</a> </p>
   </div>
</body>
</html>