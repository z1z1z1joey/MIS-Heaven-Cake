<?php session_start() ;?>
<?php
/***********************************************************
* 最唗佽隴
* 5idev 隱晟啣諒最唳
* 掛隱晟啣最唗峈 www.5idev.com 枑鼎ㄛ鼎隱晟啣諒最妏蚚
* 掛桴勤蜆最唗祥悵隱睡瞳ㄛ褫赻蚕党蜊換畦妏蚚
* 掛隱晟啣諒最華硊ㄩhttp://www.5idev.com/p-php_guestbook.shtml
***********************************************************/
/***********************************************************
* index.php 隱晟啣翋珜醱恅璃
***********************************************************/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>回覆留言</title>
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

<?php   
 $id = $_GET['id'];
  
 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = '1234'; 
 $dbname = 'project';
 
 $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
  mysql_query("SET NAMES 'utf8'");
  mysql_select_db($dbname);
  
  $sql = "select * from guestbook WHERE id = '$id'";
  $result = mysql_query($sql) or die("無法執行：".mysql_error());
  $data=mysql_fetch_assoc($result)
?>
<form action="reply_r.php" method="POST">
<table border=0 align='center'>
<tr><th>編號：</th><th><textarea name="id" readonly ><?php echo $data['id']; ?></textarea></th></tr>
<tr><th>內容：</th><th><textarea name="content" readonly style="width:450px;height:100px;resize:none;"><?php echo $data['content']; ?></textarea></th></tr>
<tr><th>回覆：</th><th><textarea name="reply" style="width:450px;height:100px;resize:none;"></textarea></th></tr>
<tr><th colspan=2>
<input type="submit" name="submit" value="確定"/>
<input type="button" name="cancel" value="取消" onClick="location.href='memo.php'"/>
</th></tr>
</form>
</div>
</body>

</html>