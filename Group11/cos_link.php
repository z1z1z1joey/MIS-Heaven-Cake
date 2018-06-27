<?php session_start() ;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>填寫資料</title>
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
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
   mysql_query("SET NAMES 'utf8'");
    mysql_select_db($dbname);
	
    $name = $_POST['name'];
	$phone = $_POST['phone'];
	$pay = $_POST['pay'];
	$remark = $_POST['remark'];
	
	setcookie("name", $name, time()+600);
	setcookie("phone", $phone, time()+600);
	setcookie("remark", $remark, time()+600);
    
    mysql_close($conn); //關閉資料庫連結
	
	if($pay == 'cod')
{
	echo "<form action=\"cos_linkk.php\" method=\"Post\">";
	echo "<table border=0 align='center'>";
	echo "<tr><th colspan=2>填寫地址</th></tr>";
	echo "<tr><th>地址：</th><th><Input Type=\"text\" Name=\"adds\"></th></tr>";
	echo "<tr><th colspan=2>";
	echo "<input type=\"submit\" name=\"submit\" value=\"送出\"/>";
	echo "&nbsp;&nbsp;&nbsp;";
	echo "<input type=\"button\" name=\"cancel\" value=\"上一步\" onclick=\"location.href='cos_buy.php'\"/>";
	echo "</th></tr></table>";
}
else if($pay == 'retail')
{
	echo "<form action=\"cos_linkk.php\" method=\"Post\">";
	echo "<table border=0 align='center'>";
	echo "<tr><th colspan=2>選擇超商</th></tr>";
	echo "<tr><th>門市：</th><th>";
	echo "<select name=\"adds\">";
	echo "<option value=\"全家中壢禾凱店\">全家中壢禾凱店</option>";
	echo "<option value=\"全家中壢新中原店\">全家中壢新中原店</option>";
	echo "<option value=\"全家中壢柏德店\">全家中壢柏德店</option>";
	echo "<option value=\"全家中壢中北店\">全家中壢中北店</option>";
	echo "</select></th></tr>";
	echo "<tr><th colspan=2>";
	echo "<input type=\"submit\" name=\"submit\" value=\"送出\"/>";
	echo "&nbsp;&nbsp;&nbsp;";
	echo "<input type=\"button\" name=\"cancel\" value=\"上一步\" onclick=\"location.href='cos_buy.php'\"/>";
	echo "</th></tr></table>";
}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>