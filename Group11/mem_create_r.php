<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>加入會員</title>
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


$name = $_REQUEST['name'];
$account = $_REQUEST['account'];
$password = $_REQUEST['password'];
$password2 = $_REQUEST['password2'];
$phone = $_REQUEST['phone'];
$address = $_REQUEST['address'];
$email = $_REQUEST['email'];
$sex = $_REQUEST['sex'];
 
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
mysql_query("SET NAMES 'utf8'");
mysql_select_db($dbname);
$sql = "SELECT * FROM member where account = '$account'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);
if ( $row[1] == $account)
{
	echo '帳號重複，請重新註冊';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=mem_create.php>';	
}


    

// Usage example

elseif($account != null && $password != null && $password2 != null && $password == $password2)
{
$sql_insert = "INSERT INTO member(name, account, password, phone, address, email, sex ) VALUES ('$name','$account','$password','$phone','$address','$email','$sex')";
$result = mysql_query($sql_insert) or die('MySQL insert error');
 

}
else {
	echo "<div align=center>輸入資料有誤,請重新填寫!</div>";
	echo '<meta http-equiv=REFRESH CONTENT=1;url=mem_create.php>';
}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>