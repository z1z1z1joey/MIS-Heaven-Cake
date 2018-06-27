<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
//連接資料庫
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'asd09720';
$dbname = 'login';

$account = addslashes($_POST['account']);
$password = addslashes($_POST['password']);

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
mysql_query("SET NAMES 'utf8'");
mysql_select_db($dbname);
  
//搜尋資料庫資料
$sql = "SELECT * FROM member where account = '$account'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);
//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($account != null && $password != null && $row[1] == $account && $row[2] == $password )
{
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['account'] = $account;
        echo '<div align=center>登入成功!</div><br><br><br><br><br><br><br><br><br><br><br><br>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
else if($account != null && $password != null && $row[9] == '2'){
		$_SESSION['account'] = $account;
		echo '<div align=center>登入成功!</div><br><br><br><br><br><br><br><br><br><br><br><br>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=bus_show.php>';
}
else if($account != null && $password != null && $row[9] == '3'){
		$_SESSION['account'] = $account;
		echo '<div align=center>登入成功!</div><br><br><br><br><br><br><br><br><br><br><br><br>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=member_b.php>';
}
/*else if($account != null && $password != null && $row[2] =='' && $row[3] == '' && $row[9] == '2'){
		$_SESSION['account'] = $account;
		echo '<div align=center>登入成功!</div><br><br><br><br><br><br><br><br><br><br><br><br>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=fin_show.php>';
}
else if($account != null && $password != null && $row[2] =='' && $row[3] == '' && $row[9] == '2'){
		$_SESSION['account'] = $account;
		echo '<div align=center>登入成功!</div><br><br><br><br><br><br><br><br><br><br><br><br>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=pro_show.php>';
}
else if($account != null && $password != null && $row[2] =='' && $row[3] == '' && $row[9] == '2'){
		$_SESSION['account'] = $account;
		echo '<div align=center>登入成功!</div><br><br><br><br><br><br><br><br><br><br><br><br>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=pur_show.php>';
}
else if($account != null && $password != null && $row[2] =='' && $row[3] == '' && $row[9] == '2'){
		$_SESSION['account'] = $account;
		echo '<div align=center>登入成功!</div><br><br><br><br><br><br><br><br><br><br><br><br>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=ware_show.php>';
}*/
else
{
        echo '<div align=center>登入失敗!</div><br><br><br><br><br><br><br><br><br><br><br><br>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>';
}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>