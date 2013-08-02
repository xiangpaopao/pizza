<?php
//////////////////////////login/////////////////////////////
function login(){

$name = $_POST['name'];
$password = $_POST['password'];
$sql = "select userName,psw from pizza_admin where userName='".$name."'";
$result = mysql_query($sql);
$num = mysql_num_rows($result);

if (strrpos($name,"<")!==false || strrpos($name,">")!==false||strrpos($name,"@")!==false||strrpos($name,"\"")!==false||strrpos($name,"'")!==false)
{
	echo "<script>alert('不能有特殊字符！');location.href='admin.php';</script>";
}

if($num)
{//如果用户存在，就检查密码是否正确
	$rs = mysql_fetch_array($result);
	if($rs[1]!=md5($password))
	{
		echo md5($password);
		echo "<br>";
		echo $rs[1];
		echo "<script>alert('密码不正确，请确认后输入！');location.href='admin.php';</script>";
	}else {//用户名，密码都正确，注册SESSION变量，然后跳转到首页
		$_SESSION["key"]=1;
		echo "<script>location.href='order.php';</script>";
	}
}
else
{//没有这个用户
	echo "<script>alert('没有这个用户，请确认后输入！');location.href='admin.php';</script>";
}
}
//////////////////////////logout/////////////////////////////
function logout(){
$_SESSION["key"] = 0;//使SESSION不为1，1为管理员

header('location:admin.php');	
}
//////////////////////////addOrder/////////////////////////////


