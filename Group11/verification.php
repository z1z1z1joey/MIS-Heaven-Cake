﻿<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會員認證</title>
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
$dbpass = '1234'; 
$dbname = 's10144232';

$number = $_GET['id'];
$name = $_POST['name'];
$account = $_POST['account'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$sex = $_POST['sex'];
 
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
mysql_query("SET NAMES 'utf8'");
mysql_select_db($dbname);
?>
<form action="verification_r.php" method="Post">
<table border=0 align='center'>
<tr><th colspan=2>會員認證</th></tr>
<tr>
<th>帳號：</th>
<th><Input Type="text" Name="account" value="<?php echo $_COOKIE["account"]; ?>" readonly="readonly"></th>
</tr>
<tr>
<th>密碼：</th>
<th><Input Type="password" Name="password"></th>
</tr>
<tr>
<th>認證碼：</th>
<th><Input Type="text" Name="verification"></th>
</tr>
<tr>
<th colspan=2>
<input name="submit" value="確定" type="submit"/>
</th>
</tr>
</table>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>