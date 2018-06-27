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

if($_SESSION['account'] != null)
{
        //將$_SESSION['username']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
        $account = $_SESSION['account'];
        //若以下$id直接用$_SESSION['username']將無法使用
        $sql = "SELECT * FROM member where account = '$account'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
    
        echo "<form name=\"form\" method=\"post\" action=\"mem_update_r.php\">";
		echo "<table border=0 align=\"center\">";
		echo "<tr><th colspan=3>修改會員資料</th></tr>";
		echo "<tr><td>姓名</td><td><input type=\"text\" name=\"name\" value=\"$row[0]\" /></td></tr>";
        echo "<tr><td>帳號</td><td>$row[1]</td></tr>";
        echo "<tr><td>密碼</td><td><input type=\"text\" name=\"password\" value=\"$row[2]\" /></td></tr>";
        echo "<tr><td>電話</td><td><input type=\"text\" name=\"phone\" value=\"$row[3]\" /></td></tr>";
        echo "<tr><td>地址</td><td><input type=\"text\" name=\"address\" value=\"$row[4]\" /></td></tr>";
        echo "<tr><td>E-mail</td><td><input type=\"text\" name=\"email\" value=\"$row[5]\" /></td></tr>";
        echo "<tr><td colspan=2 align=\"center\"><input type=\"submit\" name=\"submit\" value=\"確定\" />&nbsp;&nbsp;&nbsp;<input type=\"button\" name=\"cancel\" value=\"取消\" onclick=\"location.href='user.php'\"/></td></tr>";
		echo "</table>";
        echo "</form>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>