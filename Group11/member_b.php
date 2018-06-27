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
		<?php
					if($_SESSION['account'] == 'emma')
					{
					
	   ?>	<ul>
				<li class="current_page_item"><a href="index.php">前台</a></li>
				<!--<li><a href="bus_show.php">訂單管理</a></li>
				<li><a href="fin_show.php">會計審核</a></li>
				<li><a href="pro_show.php">生產管理</a></li>
				<li><a href="pur_show.php">採購管理</a></li>
				<li><a href="ware_show.php">倉儲管理</a></li>-->
				<li><a href="member_b.php">會員管理</a></li>
				<li><a href="msg.php">意見管理</a></li>
			</ul>
            
        <?php 
					}
					else
					{
		?>
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
        <?php 
					}
		?>
        
		</div>
		<!-- end #menu --> 
</div>
<?php   
 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = '1234'; 
 $dbname = 'project';
 
 $account = $_REQUEST['account'];
 $password = $_REQUEST['password'];
 
 $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
  mysql_query("SET NAMES 'utf8'");
  mysql_select_db($dbname);
  
	if($_SESSION['account'] != null)
	{
	$sql = "select * from member";
	$result = mysql_query($sql) or die("無法執行：".mysql_error());
	echo "<form action=\"\" name=\"form1\" method=\"Post\">";
	echo "<table border=0 align='center'>";
	echo "<tr><th><input type=\"button\" value=\"新增\" type=\"submit\" onclick=\"form1.action='mem_b_create.php';form1.submit();\"/></th>";
	echo "<th><input type=\"button\" value=\"刪除\" type=\"submit\" onclick=\"form1.action='mem_b_delete.php';form1.submit();\"/></th>";
	echo "<th><input type=\"button\" value=\"查詢\" type=\"submit\" onclick=\"form1.action='mem_b_read.php';form1.submit();\"/></th></tr>";
	echo "</table>";
	echo "</form>";
	
	$str= "<table border=1 align='center' style=\"border:3px solid;padding:5px;\" rules=\"all\" cellpadding='5'\">";
	$str.="
	<tr>
		<th colspan=10>會員</th>
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
		<th>處理</th>
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
			<td><a href=\"mem_b_update.php?id=".$data['number']."\">修改</a></td>
		</tr>
		";
	}
	$str.="</table>";
	echo $str;
	}
	else
	{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
	}
?>
</div>
</body>
</html>