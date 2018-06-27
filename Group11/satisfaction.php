<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>滿意度調查</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Chivo:400,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><?php
					if($_SESSION['account'] != null)
					{
						echo "<a href=\"logout.php\">登出</a>";
					}
					else
					{
						echo "<a href=\"member.php\">登入</a>";
						echo "&nbsp;&nbsp;&nbsp;";
						echo "<a href=\"mem_create.php\">加入會員</a>";
					}
				?></h1>
			</div>
		</div>
	</div>
	<div id="menu-wrapper">
		<div id="menu" class="container">
			<ul>
				<li class="current_page_item"><a href="index.php">首頁</a></li>
				<li><a href="shop.php">商品訂購</a></li>
				<li><a href="user.php">會員中心</a></li>
				<li><a href="order.php">訂單查詢</a></li>
				<li><a href="about.php">關於我們</a></li>
			</ul>
		</div>
		<!-- end #menu --> 
</div>
<br><br><br><br><br>
<?php   
 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = 'asd09720'; 
 $dbname = 'login';
 
 $number = $_POST['number'];
 $name = $_POST['name'];
 $account = $_SESSION['account'];
 $password = $_POST['password'];
 $phone = $_POST['phone'];
 $address = $_POST['address'];
 $email = $_POST['email'];
 $sex = $_POST['sex'];
 $identify = $_POST['identify'];
 
 $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
  mysql_query("SET NAMES 'utf8'");
  mysql_select_db($dbname);
  date_default_timezone_set('Asia/Taipei');
  
  $sql = "select * from member where account = '$account'";
  $result = mysql_query($sql) or die("無法執行：".mysql_error());
  $data = mysql_fetch_assoc($result);
?>
<form action="sat_r.php" method="Post">
<table border=1 align='center' style="border:3px solid;padding:5px;" rules="all" cellpadding='5';>
<tr><th colspan=4 bgcolor="#AAFFEE">滿意度調查</th></tr>
<tr><th bgcolor="#FFFFBB">姓名</th><th><Input Type="text" Name="name" value="<?php echo $data['name']; ?>"></th>
<th bgcolor="#FFFFBB">電話</th><th><Input Type="text" Name="phone" value="<?php echo $data['phone']; ?>"></th></tr>
<tr><th bgcolor="#FFFFBB">地址</th><th><Input Type="text" Name="address" value="<?php echo $data['address']; ?>"></th>
<th bgcolor="#FFFFBB">E-mail</th><th><Input Type="text" Name="email" value="<?php echo $data['email']; ?>"></th></tr>
<tr><th bgcolor="#FFFFBB">商品名稱</th>
<th><select name="item" style="width:153px;">
<option value="芒果舞曲 6吋">芒果舞曲 6吋</option>
<option value="草莓樂園 6吋">草莓樂園 6吋</option>
<option value="莓果繽紛樂 6吋">莓果繽紛樂 6吋</option>
<option value="白色莓戀 6吋">白色莓戀 6吋</option>
</select></th>
<th bgcolor="#FFFFBB">到貨日期</th><th><input class="Wdate" type="text" onClick="WdatePicker()" name="date" style="width:153px;" onfocus="WdatePicker({maxDate:'%y-%M-%d'})"/></th></tr>
<tr><th bgcolor="#FFFFBB">數量(箱)</th><th><Input Type="text" Name="amount"></th>
<th bgcolor="#FFFFBB">使用時間(天)</th><th><Input Type="text" Name="period"></th></tr>
<tr><th colspan=4></th></tr>
<tr><th bgcolor="#FFFFBB">項目</th><th colspan=3 bgcolor="#FFFFBB">結果</th></tr>
<tr><th>外觀</th><th colspan=3><input type="radio" name="surface" value="1">非常滿意
<input type="radio" name="surface" value="2">滿意
<input type="radio" name="surface" value="3">沒意見
<input type="radio" name="surface" value="4">不滿意
<input type="radio" name="surface" value="5">非常不滿意</th></tr>
<tr><th>包裝</th><th colspan=3><input type="radio" name="package" value="1">非常滿意
<input type="radio" name="package" value="2">滿意
<input type="radio" name="package" value="3">沒意見
<input type="radio" name="package" value="4">不滿意
<input type="radio" name="package" value="5">非常不滿意</th></tr>
<tr><th>美味度</th><th colspan=3><input type="radio" name="service" value="1">非常滿意
<input type="radio" name="service" value="2">滿意
<input type="radio" name="service" value="3">沒意見
<input type="radio" name="service" value="4">不滿意
<input type="radio" name="service" value="5">非常不滿意</th></tr>
<tr><th>運輸、交貨</th><th colspan=3><input type="radio" name="send" value="1">非常滿意
<input type="radio" name="send" value="2">滿意
<input type="radio" name="send" value="3">沒意見
<input type="radio" name="send" value="4">不滿意
<input type="radio" name="send" value="5">非常不滿意</th></tr>
<tr><th>其他意見<br>(最多200字)</th><th colspan=3><textarea name="other" style="width:450px;height:100px;resize:none;"></textarea></th></tr>
<tr><th colspan=4 align='right'>填寫日期：<?php echo date("Y-m-d")."\n";?></th></tr>
</table>
<table border=0 align='center'>
<tr>
<?php
if($_SESSION['account'] != null)
{
	echo "<th width=\"100px\"><input type=\"submit\" name=\"submit\" value=\"送出\"/></th>";
}
else
{
	echo "<th width=\"100px\"><input type=\"submit\" name=\"submit\" value=\"送出\" disabled=\"disabled\"/></th>";
}
?>
<th width="100px"><input type="button" name="cancel" value="取消" onclick="location.href='index.php'"/></th>
</tr>
</table>
</form>
<br><br><br>
</div>
</body>
</html>