<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>意見管理</title>
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
			   <?php
					if($_SESSION['account'] == 'emma')
					{
					
			   ?>
				<li class="current_page_item"><a href="index.php">前台</a></li>
				<!--<li><a href="bus_show.php">訂單管理</a></li>
				<li><a href="fin_show.php">會計審核</a></li>
				<li><a href="pro_show.php">生產管理</a></li>
				<li><a href="pur_show.php">採購管理</a></li>
				<li><a href="ware_show.php">倉儲管理</a></li>-->
				<li><a href="member_b.php">會員管理</a></li>
				<li><a href="msg.php">意見管理</a></li>
                  <?php 
					}
					else
					{						
					?>
                <li class="current_page_item"><a href="index.php">前台</a></li>
				<li><a href="bus_show.php">訂單管理</a></li>
				<li><a href="fin_show.php">會計審核</a></li>
				<li><a href="pro_show.php">生產管理</a></li>
				<li><a href="pur_show.php">採購管理</a></li>
				<li><a href="ware_show.php">倉儲管理</a></li>
				<li><a href="member_b.php">會員管理</a></li>
				<li><a href="msg.php">意見管理</a></li>
                <?php 
					}
		        ?>
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
  
  $sql = "select * from satisfaction WHERE number = '$number'";
  $result = mysql_query($sql) or die("無法執行：".mysql_error());
  $data=mysql_fetch_assoc($result)
?>
<form action="msg_r.php" method="Post">
<table border=0 align='center'>
<tr><th>編號：</th><th><?php echo $data['number']; ?></th></tr>
<tr><th>內容：</th><th><textarea name="other" readonly="readonly" style="width:450px;height:100px;resize:none;"><?php echo $data['other']; ?></textarea></th></tr>
<tr><th>回覆：</th><th><textarea name="content" style="width:450px;height:100px;resize:none;"></textarea></th></tr>
<tr><th colspan=2>
<input type="submit" name="submit" value="確定"/>
<input type="button" name="cancel" value="取消" onclick="location.href='msg.php'"/>
</th></tr>
<input name="number" type="hidden" value="<?php echo $data['number']; ?>" />
<input name="name" type="hidden" value="<?php echo $data['name']; ?>" />
<input name="email" type="hidden" value="<?php echo $data['email']; ?>" />
</form>
</div>
</body>
</html>