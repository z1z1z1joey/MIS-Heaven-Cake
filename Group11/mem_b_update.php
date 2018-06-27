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
 $number = $_GET['id'];
  
 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = '1234'; 
 $dbname = 'project';
 
 $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
  mysql_query("SET NAMES 'utf8'");
  mysql_select_db($dbname);
  
  $sql = "select * from member WHERE number = '$number'";
  $result = mysql_query($sql) or die("無法執行：".mysql_error());
  $data=mysql_fetch_assoc($result)
?>
<form action="mem_b_update_r.php" method="Post">
<table border=0 align='center'>
<tr><th>會員編號：</th><th><Input Type="text" Name="number" value="<?php echo $data['number']; ?>" readonly="readonly"></th></tr>
<tr><th>姓名：</th><th><Input Type="text" Name="name" value="<?php echo $data['name']; ?>"></th></tr>
<tr><th>帳號：</th><th><Input Type="text" Name="account" value="<?php echo $data['account']; ?>"></th></tr>
<tr><th>密碼：</th><th><Input Type="text" Name="password" value="<?php echo $data['password']; ?>"></th></tr>
<tr><th>電話：</th><th><Input Type="text" Name="phone" value="<?php echo $data['phone']; ?>"></th></tr>
<tr><th>地址：</th><th><Input Type="text" Name="address" value="<?php echo $data['address']; ?>"></th></tr>
<tr><th>E-mail：</th><th><Input Type="text" Name="email" value="<?php echo $data['email']; ?>"></th></tr>
<tr><th>性別：</th><th><Input Type="text" Name="sex" value="<?php echo $data['sex']; ?>"></th></tr>
<tr><th>身分：</th><th><Input Type="text" Name="identify" value="<?php echo $data['identify']; ?>"></th></tr>
<tr><th colspan=2>
<input type="submit" name="submit" value="確定"/>
<input type="button" name="cancel" value="取消" onclick="location.href='member_b.php'"/>
</th></tr>
</form>
</div>
</body>
</html>