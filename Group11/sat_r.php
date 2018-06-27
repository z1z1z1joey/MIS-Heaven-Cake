<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
include("class.phpmailer.php");
 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = 'asd09720'; 
 $dbname = 'login';

date_default_timezone_set('Asia/Taipei');
 $number = $_REQUEST['number'];
 $name = $_REQUEST['name'];
 $phone = $_REQUEST['phone'];
 $address = $_REQUEST['address'];
 
 $item = $_REQUEST['item'];
 $date = $_REQUEST['date'];
 $amount = $_REQUEST['amount'];
 $period = $_REQUEST['period'];
 $surface = $_REQUEST['surface'];
 $package = $_REQUEST['package'];
 $service = $_REQUEST['service'];
 $send = $_REQUEST['send'];
 $other = $_REQUEST['other'];
 $tm = date("Y-m-d H:i:s");
 
 $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
  mysql_query("SET NAMES 'utf8'");
  mysql_select_db($dbname);
  
  // Usage example
$sql_insert = "INSERT INTO satisfaction(name, phone, address, item, date, amount, period, surface, package, service, send, other, time) VALUES ('$name','$phone','$address','$item','$date','$amount','$period','$surface','$package','$service','$send','$other','$tm')";
$result = mysql_query($sql_insert) or die('MySQL insert error');
 
	echo "<div align=center>感謝您的撥空填寫,您的指教是我們最大的動力!</div>";
	echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>