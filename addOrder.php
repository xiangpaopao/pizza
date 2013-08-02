<?php 
require_once("inc/conn.php");
$validateError= "This username is already taken";
$validateSuccess= "This username is available";
date_default_timezone_set("Asia/Shanghai");
$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$area = $_REQUEST['area'];
$adress = $_REQUEST['adress'];
$comment = $_REQUEST['comment'];
$orders = $_REQUEST['orders'];
$price = $_REQUEST['price'];
$arriveTime = $_REQUEST['arriveTime'];
$orderTime = date("Y-m-d H:i:s");
echo json_encode('ok');
$sql = "insert into pizza_order(name,phone,area,adress,comment,orders,arriveTime,orderTime,price) values ('$name','$phone','$area','$adress','$comment','$orders','$arriveTime','$orderTime','$price')";
$result = mysql_query($sql);
mysql_close();
?>