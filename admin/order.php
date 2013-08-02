<?php
@error_reporting(E_ALL ^ E_NOTICE);
session_start();
if($_SESSION["key"]!=1){
header('location:admin.php');
}
require_once("../inc/conn.php");
require_once('functions.php');

//分页代码开始
$pagesize = 20;//设置每页显示条数
$rs = mysql_query("select count(*) from pizza_order");//取得记录总数，计算总页数用
$myrow = mysql_fetch_array($rs);
$numrows = $myrow[0];//计算总记录

$pages = intval($numrows/$pagesize);
if($numrows%$pagesize)$pages++;//设置页数
if(isset($_GET['page']))
	{
		$page = intval($_GET['page']);
	}
	else
	{
		$page = 1;//设为第一页
	}
$offset = $pagesize*($page-1);//计算记录偏移量
//分页代码结束


$sql = "select id,name,phone,area,adress,comment,orders,arriveTime,orderTime,price from pizza_order order by id desc limit $offset,$pagesize";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>pizza</title>
<script type="text/javascript" src="../inc/jquery-1.7.2.js">
</script>
</head>
<link href="css.css" rel="stylesheet" type="text/css" />
<body>
<div id="all">
  <div id="head">
    <div id="head_l">
        <a href="admin.php?act=logout" id="logout">退出管理</a>
    </div>
  </div>
  <script>
//控制表格颜色
$(document).ready(function(){
	$(".tableContent:odd").addClass("tr_odd");
	$(".tableContent:even").addClass("tr_even");
	$(".tableContent").hover(function(){
		$(this).addClass("tr_hover")
	},function(){
		$(this).removeClass("tr_hover")
	});
});
</script>
  <div id="show">
    <table width="900" height="41" border="0" cellpadding="0" cellspacing="0" >
      <tr class="tableInfo">
        <td width="90">下单时间</td>
        <td width="90">收货时间</td>
        <td width="60">联系人</td>
        <td width="90">电话</td>
        <td width="170">地址</td>
        <td width="240">订单明细</td>
        <td width="40">总价</td>
        <td width="110">备注</td>
      </tr>
      <?php
if($num>0){
	while($row = mysql_fetch_array($result))
	{
?>
      <tr class="tableContent">
        <td>&nbsp;<?= date('m-d H:i', strtotime($row[8]));?>&nbsp;</td>
        <td>&nbsp;<?= date('m-d H:i', strtotime($row[7]));?>&nbsp;</td>
        <td>&nbsp;<?= $row[1] ?>&nbsp;</td>
        <td>&nbsp;<?= $row[2] ?>&nbsp;</td>
        <td>&nbsp;<?= $row[3],$row[4] ?>&nbsp;</td>
        <td>&nbsp;<?= $row[6] ?>&nbsp;</td>
        <td>&nbsp;<?= $row[9] ?>&nbsp;</td>
        <td>&nbsp;<?= $row[5] ?>&nbsp;</td>
      </tr>
      <?php
	}
}
?>
    </table>
  </div>
  <div id="show_page">
    <p>

      <?php
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$pages;
if($page==1&&$pages>1)
{
	echo "首页&nbsp;|&nbsp;";
	echo "上一页&nbsp;|&nbsp;";
	echo "<a href=\"order.php?page=".$next."\">下一页</a>&nbsp;|&nbsp;";
	echo "<a href=\"order.php?page=".$last."\">尾页</a>&nbsp;|&nbsp;";
}
elseif($page>=1&&$page!=$pages&&$num>0)
{
	echo "<a href=\"order.php?page=".$first."\">首页</a>&nbsp;|&nbsp;";
	echo "<a href=\"order.php?page=".$prev."\">上一页</a>&nbsp;|&nbsp;";
	echo "<a href=\"order.php?page=".$next."\">下一页</a>&nbsp;|&nbsp;";
	echo "<a href=\"order.php?page=".$last."\">尾页</a>&nbsp;|&nbsp;";
}
elseif($page==$pages&&$page!=1)
{
	echo "<a href=\"order.php?page=".$first."\">首页</a>&nbsp;|&nbsp;";
	echo "<a href=\"order.php?page=".$prev."\">上一页</a>&nbsp;|&nbsp;";
	echo "下一页&nbsp;|&nbsp;";
	echo "尾页&nbsp;|&nbsp;";
}
elseif($page==$pages)
{
	echo "首页&nbsp;|&nbsp;";
	echo "上一页&nbsp;|&nbsp;";
	echo "下一页&nbsp;|&nbsp;";
	echo "尾页&nbsp;|&nbsp;";	
}
else
{
	echo "首页&nbsp;|&nbsp;";
	echo "上一页&nbsp;|&nbsp;";
	echo "下一页&nbsp;|&nbsp;";
	echo "尾页&nbsp;|&nbsp;";
}
?>
      共&nbsp;<span>
      <?= $pages ?>
      </span>&nbsp;页&nbsp;|&nbsp;当前第&nbsp;<span>
      <?= $page ?>
      </span>&nbsp;页&nbsp;|&nbsp;共&nbsp;<span>
      <?=$numrows ?>
      </span>&nbsp条记录</p>
  </div>
  <?php
mysql_close();
?>
</div>
</body>
</html>