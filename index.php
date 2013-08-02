<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/style.css" rel="stylesheet" type="text/css" />
<link href="style/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<title>陈小安的意式工坊</title>
<?php require_once("inc/conn.php");?>
</head>
<body>
<div id="topBar">
  <div class="lkBox"> <a href="#">About us</a><a href="#">Menu</a><a href="#">Home</a></div>
</div>
<div id="wrapper">
  <div class="h30"></div>
  <div id="logoBar">
    <div id="logo"><img src="img/logo.png" /></div>
  </div>
  <div class="h15"></div>
  <div id="banner" class="bgStyle">
    <div id="bannerImg"><img src="img/banner.jpg" /></div>
  </div>
  <div id="content">
    <form name="orderForm" id="orderForm" action="addOrder.php" method="post">
      <div id="conL">
        <div id="foodCon"> 
          <!--foods type 1-->
          <div id="ttBar1"></div>
          <?php 
		$sql = "select id,name,price,type,thumb from pizza_foods WHERE type=1";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		if($num>0){
			while($row = mysql_fetch_array($result)){
		?>
          <div class="food">
            <div class="bgStyle foodBox"><img src="<?= $row[4]?>" /></div>
            <div class="foodInfo">
              <div class="foodName">
                <?= $row[1]?>
              </div>
              <div class="foodBuy"><a class="price" title="<?= $row[2]?>">&nbsp;￥
                <?= $row[2]?>
                </a><a class="buyBt" id="food<?= $row[0]?>" title="<?= $row[1]?>">现在购买&nbsp;&raquo;</a>
                <div class="clear"></div>
              </div>
            </div>
          </div>
          <?php };};?>
          <div class="clear"></div>
          <!--foods type 2-->
          <div id="ttBar2"></div>
          <?php 
		$sql = "select id,name,price,type,thumb from pizza_foods WHERE type=2";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		if($num>0){
			while($row = mysql_fetch_array($result)){
		?>
          <div class="food">
            <div class="bgStyle foodBox"><img src="<?= $row[4]?>" /></div>
            <div class="foodInfo">
              <div class="foodName">
                <?= $row[1]?>
              </div>
              <div class="foodBuy"><a class="price" title="<?= $row[2]?>">&nbsp;￥
                <?= $row[2]?>
                </a><a class="buyBt" id="food<?= $row[0]?>" title="<?= $row[1]?>">现在购买&nbsp;&raquo;</a>
                <div class="clear"></div>
              </div>
            </div>
          </div>
          <?php };};?>
          <div class="clear"></div>
          <!--foods type 3-->
          <div id="ttBar3"></div>
          <?php 
		$sql = "select id,name,price,type,thumb from pizza_foods WHERE type=3";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		if($num>0){
			while($row = mysql_fetch_array($result)){
		?>
          <div class="food">
            <div class="bgStyle foodBox"><img src="<?= $row[4]?>" /></div>
            <div class="foodInfo">
              <div class="foodName">
                <?= $row[1]?>
              </div>
              <div class="foodBuy"><a class="price" title="<?= $row[2]?>">&nbsp;￥
                <?= $row[2]?>
                </a><a class="buyBt" id="food<?= $row[0]?>" title="<?= $row[1]?>">现在购买&nbsp;&raquo;</a>
                <div class="clear"></div>
              </div>
            </div>
          </div>
          <?php };};?>
          <div class="clear"></div>
        </div>
        <div id="userInfo">
          <div id="ttBar4"></div>
          <table width="700" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="105">联系人</td>
              <td><input id="name" name="name" size="20" class="validate[required,maxSize[20]] text-input y" type="text"/></td>
              <td></td>
            </tr>
            <tr>
              <td >联系电话</td>
              <td><input id="phone" name="phone" size="20" class="validate[required,custom[phone]] text-input y" /></td>
              <td></td>
            </tr>
            <tr>
              <td >到单时间</td>
              <td><input id="arriveTime" name="arriveTime" size="20" class="validate[required,maxSize[20]] text-input y" type="text" onfocus="WdatePicker({dateFmt:'yyyy-M-d H:mm:ss',minDate:'%y-%M-%d 7:00:00',maxDate:'%y-%M-{%d+1} 21:00:00'})"/>
                </p></td>
              <td></td>
            </tr>
            <tr>
              <td>所在区域</td>
              <td><select id="area" name="area">
                  <option value="杨浦区">杨浦区</option>
                  <option value="虹口区">虹口区</option>
                  <option value="闸北区">闸北区</option>
                  <option value="普陀区">普陀区</option>
                  <option value="黄浦区">黄浦区</option>
                  <option value="静安区">静安区</option>
                  <option value="长宁区">长宁区</option>
                  <option value="卢湾区">卢湾区</option>
                  <option value="徐汇区">徐汇区</option>
                  <option value="闵行区">闵行区</option>
                  <option value="浦东新区">浦东新区</option>
                </select></td>
              <td></td>
            </tr>
            <tr>
              <td>详细地址</td>
              <td><input id="adress" name="adress" size="20" class="validate[required,maxSize[200]] text-input y" /></td>
              <td></td>
            </tr>
            <tr>
              <td>备注</td>
              <td><input id="comment" name="comment" size="20" class="validate[maxSize[200]] text-input y"  /></td>
              <td></td>
            </tr>
          </table>
        </div>
      </div>
      <div id="conR">
        <div id="ttBar5"></div>
        <div id="ordersBox" class="bgStyle">
          <p id="ad" >请在左侧选择您需要的食品，然后填写您的信息，我们会尽快为您服务</p>
        </div>
        <div id="submitBox" style="display:none">
          <div id="fullPrice"></div>
          <input type="hidden" name="orders" id="orders" />
          <input type="hidden" name="price" id="price" />
          <input type="submit" value="现在下单&nbsp;&raquo;" id="submitBt"/>
        </div>
      </div>
    </form>
    <div class="clear"></div>
  </div>
</div>
<div id="footer"><a>Copyright © 2011-2012 陈小安烘培工坊</a></div>
<script src="inc/jquery-1.7.2.js"></script> 
<script src="My97DatePicker/WdatePicker.js"></script> 
<script src="inc/languages/jquery.validationEngine-zh_CN.js"></script> 
<script src="inc/jquery.validationEngine.js"></script> 
<script>
var ifFoods=false;//是否选择食品
function addBt(id){
	//添加删除按钮
	$("#order"+id+">.orderBt>.addBt").click(function(){
		var numBox=$(this).parent().find('.num');
		var num=parseInt(numBox.html());
		num++;
		numBox.html(num);
		doData();
	});
	$("#order"+id+">.orderBt>.removeBt").click(function(){
	  var numBox=$(this).parent().find('.num');
	  var num=parseInt(numBox.html());
	  num--;
	  if(num==0){
		  $(this).parent().parent().remove();
	  }else{
		  numBox.html(num);
	  }
	  doData();
	});	
};
function doData(){
	//处理食品数据
	var numArr=$('.num');
	var nameArr=$('.orderName');
	var priceArr=$('.orderPrice');
	var price=0;
	var content="";
	for(i=0;i<numArr.length;i++){
		price=price+parseInt($(numArr[i]).html())*parseInt($(priceArr[i]).attr("title"));
		content=content+$(nameArr[i]).html() +"*"+$(numArr[i]).html()+"&nbsp;";
	};
	$('#fullPrice').html("总价"+(price+4)+"(含4元外送费)");
	$('#orders').attr('value',content);
	$('#price').attr('value',price+4);
	if(numArr.length==0){
		$('#ad').show();
		$('#submitBox').hide();
		ifFoods=false;
	};
};
		
function beforeCall(form, options){
	return true;
};

function ajaxValidationCallback(){
	alert("下单成功");
};

$(document).ready(function() {
	$('.buyBt').click(function(){
		if(!ifFoods){
			$('#ad').hide();
			$('#submitBox').show();
			ifFoods=true;
		};
		var id=$(this).attr("id");
		var name=$(this).attr("title");
		var price=$(this).parent().find('.price').attr("title");
		var content="<div class=orderData id=order"+id+"><div class=orderInfo><a class=orderName>"+name+"</a><a class=orderPrice title="+price+">￥"+price+"</a><div class=clear></div></div><div class=orderBt><a class=addBt>+</a><a class=num >1</a><a class=removeBt>-</a><div class=clear></div></div></div>"
		if($('#order'+id).length==0){
			$('#ordersBox').append(content);
			addBt(id);
		}else{
			var numBox=$('#order'+id+'>.orderBt>.num')
			var num=parseInt(numBox.html());
			num++;
			numBox.html(num);
		};
		doData();
	});
	$("#orderForm").validationEngine({
		ajaxFormValidation: true,
		ajaxFormValidationMethod: 'post',
		onAjaxFormComplete: ajaxValidationCallback
	});
	
}); 

</script>
</body>
</html>
<?php mysql_close();?>