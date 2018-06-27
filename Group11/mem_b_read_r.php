<?php session_start(); ?>
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
  
  $sql = "select * from member where number = '$number' or account = '$account'";
	$result = mysql_query($sql) or die("無法執行：".mysql_error());
	$str= "<table border=1 align='center' style=\"border:3px solid;padding:5px;\" rules=\"all\" cellpadding='5'\">";
	$str.="
	<tr>
		<th colspan=9>會員</th>
	</tr>
	<tr>
		<th>會員編號</th>
		<th>姓名</th>
		<th>帳號</th>
		<th>密碼</th>
		<th>電話</th>
		<th>地址</th>
		<th>E-mail</th>
		<th>性別</th>
		<th>身分</th>
	</tr>";
				
	while($data=mysql_fetch_assoc($result))
	{
		$str.="
		<tr align='center'>
			<td>{$data['number']}</td>
			<td>{$data['name']}</td>
			<td>{$data['account']}</td>
			<td>{$data['password']}</td>
			<td>{$data['phone']}</td>
			<td>{$data['address']}</td>
			<td>{$data['email']}</td>
			<td>{$data['sex']}</td>
			<td>{$data['identify']}</td>
		</tr>
		";
	}
	$str.="</table>";
	echo $str;
?>
<table border=0 align='center'>
<tr><th>
<input type="button" name="return" value="返回" onclick="location.href='mem_b_read.php'"/>
</th></tr>
</div>
</body>
</html>