<?php
@error_reporting(E_ALL ^ E_NOTICE);
session_start();
require_once('../inc/conn.php');
require_once('functions.php');

if($_GET['act']=='login'){
	login();
}if($_GET['act']=='logout'){
	logout();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
</head>
<link href="css.css" rel="stylesheet" type="text/css" />
<body>
<div id="admin">
  <form method="post" action="admin.php?act=login">
    <h1>管理员登录</h1>
    <p>姓名 :
      <input type="text" name="name" size="20" class="y" />
      &nbsp;</p>
    <p>密码 :
      <input type="password" name="password" size="20" class="y" />
      &nbsp;</p>
    <p class="cen">
      <input type="submit" value="管理员登录" />
    </p>
  </form>
</div>
</body>
</html>