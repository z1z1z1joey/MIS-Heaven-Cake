<?php
$dbhost = 'localhost';   
 $dbuser = 'root';   
 $dbpass = '1234';   
 $dbname = 'project';

 
 
 $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
  mysql_query("SET NAMES 'utf8'");
  mysql_select_db($dbname);   
if(!isset($_POST['submit'])){
    exit('準楊溼恀!');
}

if(get_magic_quotes_gpc()){
	$nickname = htmlspecialchars(trim($_POST['nickname']));
	$email = htmlspecialchars(trim($_POST['email']));
	$content = htmlspecialchars(trim($_POST['content']));
} else {
	$nickname = addslashes(htmlspecialchars(trim($_POST['nickname'])));
	$email = addslashes(htmlspecialchars(trim($_POST['email'])));
	$content = addslashes(htmlspecialchars(trim($_POST['content'])));
}

$createtime = time();
$insert_sql = "INSERT INTO guestbook(nickname,email,content,createtime)VALUES";
$insert_sql .= "('$nickname','$email','$content',$createtime)";

if(mysql_query($insert_sql)){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板</title>
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
echo '<div align=center>感謝您的留言!</div><br><br><br><br><br><br><br><br><br><br><br><br>';
echo '<meta http-equiv=REFRESH CONTENT=2;url=memo.php>';
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>
<?php
} else {
	echo '留言失敗',mysql_error(),'[ <a href="javascript:history.back()">返回</a> ]';
}
?>