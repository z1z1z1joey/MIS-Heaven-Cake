<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會員中心</title>
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
 $account = $_POST['account'];
 $password = $_POST['password'];
 $phone = $_POST['phone'];
 $address = $_POST['address'];
 $email = $_POST['email'];
 $sex = $_POST['sex'];
 
 $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
  mysql_query("SET NAMES 'utf8'");
  mysql_select_db($dbname);

 $name = $_REQUEST['name'];
 $account = $_REQUEST['account'];
 $password = $_REQUEST['password'];
 $phone = $_REQUEST['phone'];
 $address = $_REQUEST['address'];
 $email = $_REQUEST['email'];
 
//紅色字體為判斷密碼是否填寫正確
if($_SESSION['account'] != null && $password != null)
{
        $account = $_SESSION['account'];
    
        //更新資料庫資料語法
        $sql = "update member set password = '$password', phone = '$phone', address = '$address', email = '$email' where account = '$account'";
        if(mysql_query($sql))
        {
                echo '<div align=center>修改成功!</div><br><br><br><br><br><br><br><br><br><br><br><br>';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=user.php>';
        }
        else
        {
                echo '<div align=center>修改失敗!</div><br><br><br><br><br><br><br><br><br><br><br><br>';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=user.php>';
        }
}
else
{
        echo '<div align=center>您無權限觀看此頁面!</div><br><br><br><br><br><br><br><br><br><br><br><br>';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>