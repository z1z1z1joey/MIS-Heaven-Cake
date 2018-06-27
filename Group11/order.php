<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>訂單查詢</title>
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

$account = $_SESSION['account'];
 
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
mysql_query("SET NAMES 'utf8'");
mysql_select_db($dbname);

$sql="select * from business where ACCOUNT = '$account'";
$result = mysql_query($sql) or die("無法執行：".mysql_error());
if($_SESSION['account'] != null){
$str= "<table border=1 align='center' style=\"border:3px solid;padding:5px;\" rules=\"all\" cellpadding='5'>";
	$str.="
	<tr>
		<th colspan=7>我的訂單</th>
	</tr>
	<tr>
		<th>訂單編號</th>
		<th>商品名稱</th>
		<th>數量</th>
		<th>金額</th>
		<th>訂購時間</th>
		<th>收件地址</th>
		<th>狀態</th>
	</tr>";
				
	while($data=mysql_fetch_assoc($result))
	{
		$str.="
		<tr align='center'>
			<td>{$data['NUM']}</td>
			<td>{$data['ITEM']}</td>
			<td>{$data['QUAN']}</td>
			<td>{$data['SUM']}</td>
			<td>{$data['DATE']}</td>
			<td>{$data['ADDS']}</td>
			<td>{$data['SHIP']}</td>
		</tr>
		";
	}
	$str.="</table>";
	echo $str;
	}
	else{
		echo "<center>請先登入會員!</center><br><br><br><br><br><br><br><br><br><br><br><br>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
	}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>