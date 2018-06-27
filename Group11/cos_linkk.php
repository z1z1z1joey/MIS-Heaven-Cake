<?php session_start() ;?> 
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
   date_default_timezone_set('Asia/Taipei');
    
    $d=time();	
    $date = date("Y-m-d H:i:s",$d) ;

    
	$item = $_COOKIE["item"];
	$quan = $_COOKIE["quan"];
	$sum = $_COOKIE["sum"];
	
	$ship = $_COOKIE["ship"];
	$name = $_COOKIE["name"];
	$phone = $_COOKIE["phone"];
	$remark = $_COOKIE["remark"];
	$adds = $_POST['adds'];
	$account=$_SESSION['account'];
    
	$sql_insert = "INSERT INTO business(ITEM, QUAN, SUM, DATE, CREDIT, SHIP, NAME, PHONE, REMARK, ADDS, ACCOUNT) VALUES ('$item','$quan','$sum','$date','不通過','$ship','$name','$phone','$remark','$adds','$account')";
    $result = mysql_query($sql_insert) or die('MySQL insert error');
	
    mysql_close($conn); //關閉資料庫連結
	
	echo "<div align=center>訂購完成</div><br><br><br><br><br><br><br><br><br><br><br><br>";
	echo '<meta http-equiv=REFRESH CONTENT=1;url=order.php>';
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>