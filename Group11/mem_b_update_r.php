<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會員管理</title>
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
				<li class="current_page_item"><a href="index.php">前台</a></li>
				<li><a href="bus_show.php">訂單管理</a></li>
				<li><a href="fin_show.php">會計審核</a></li>
				<li><a href="pro_show.php">生產管理</a></li>
				<li><a href="pur_show.php">採購管理</a></li>
				<li><a href="ware_show.php">倉儲管理</a></li>
				<li><a href="member_b.php">會員管理</a></li>
				<li><a href="msg.php">意見管理</a></li>
			</ul>
		</div>
		<!-- end #menu --> 
</div>
<?php
 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = '1234'; 
 $dbname = 'project';
 
 $number = $_POST['number'];
 $name = $_POST['name'];
 $account = $_POST['account'];
 $password = $_POST['password'];
 $phone = $_POST['phone'];
 $address = $_POST['address'];
 $email = $_POST['email'];
 $sex = $_POST['sex'];
 $identify = $_POST['identify'];
 
 $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
  mysql_query("SET NAMES 'utf8'");
  mysql_select_db($dbname);
 
//紅色字體為判斷密碼是否填寫正確
if($_SESSION['account'] != null && $password != null)
{    
        //更新資料庫資料語法
        $sql = "update member set name = '$name', account = '$account', password = '$password', phone = '$phone', address = '$address', email = '$email', sex = '$sex', identify = '$identify' where number = '$number'";
        if(mysql_query($sql))
        {
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member_b.php>';
        }
        else
        {
                echo '修改失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member_b.php>';
        }
}
else
{
        echo '請先登入!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
}
?>
</div>
</body>
</html>