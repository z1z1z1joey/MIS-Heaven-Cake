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
 
 $account = $_REQUEST['account'];
 $password = $_REQUEST['password'];
 
 $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
  mysql_query("SET NAMES 'utf8'");
  mysql_select_db($dbname);
  
	if($_SESSION['account'] != null)
	{
	$sql = "select * from satisfaction";
	$result = mysql_query($sql) or die("無法執行：".mysql_error());
	
	$str= "<table border=1 align='center' style=\"border:3px solid;padding:5px;\" rules=\"all\" cellpadding='5'>";
	$str.="
	<tr>
		<th colspan=17>滿意度列表</th>
	</tr>
	<tr>
		<th>編號</th>
		<th>姓名</th>
		<th>電話</th>
		<th>地址</th>
		<th>E-mail</th>
		<th>商品名稱</th>
		<th>到貨日期</th>
		<th>數量</th>
		<th>使用時間</th>
		<th>外觀</th>
		<th>包裝</th>
		<th>美味度</th>
		<th>運輸、交貨</th>
		<th>其他意見</th>
		<th>填寫時間</th>
		<th>回覆內容</th>
		<th>處理</th>
	</tr>";
				
	while($data=mysql_fetch_assoc($result))
	{
		$str.="
		<tr align='center'>
			<td>{$data['number']}</td>
			<td>{$data['name']}</td>
			<td>{$data['phone']}</td>
			<td>{$data['address']}</td>
			<td>{$data['email']}</td>
			<td>{$data['item']}</td>
			<td>{$data['date']}</td>
			<td>{$data['amount']}</td>
			<td>{$data['period']}</td>
			<td>{$data['surface']}</td>
			<td>{$data['package']}</td>
			<td>{$data['service']}</td>
			<td>{$data['send']}</td>
			<td>{$data['other']}</td>
			<td>{$data['time']}</td>
			<td>{$data['content']}</td>
			<td><a href=\"msg_i.php?id=".$data['number']."\">回覆</a></td>
		</tr>
		";
	}
	$str.="</table>";
	echo $str;
	echo "<br><br><center><h2>統計數據</h2></center><br>";
$sql_a = "SELECT * FROM satisfaction";
$result_a = mysql_query($sql_a, $conn);
$num_rows_a = mysql_num_rows($result_a);
echo "<center>總共 ".$num_rows_a." 筆資料</center>";
$sql_s1 = "SELECT surface FROM satisfaction where surface = '1'";
$result_s1 = mysql_query($sql_s1, $conn);
$num_rows_s1 = mysql_num_rows($result_s1);
$sql_s2 = "SELECT surface FROM satisfaction where surface = '2'";
$result_s2 = mysql_query($sql_s2, $conn);
$num_rows_s2 = mysql_num_rows($result_s2);
$sql_s3 = "SELECT surface FROM satisfaction where surface = '3'";
$result_s3 = mysql_query($sql_s3, $conn);
$num_rows_s3 = mysql_num_rows($result_s3);
$sql_s4 = "SELECT surface FROM satisfaction where surface = '4'";
$result_s4 = mysql_query($sql_s4, $conn);
$num_rows_s4 = mysql_num_rows($result_s4);
$sql_s5 = "SELECT surface FROM satisfaction where surface = '5'";
$result_s5 = mysql_query($sql_s5, $conn);
$num_rows_s5 = mysql_num_rows($result_s5);
echo "<br><table border=1 align='center' style=\"border:3px solid;padding:5px;\" rules=\"all\" cellpadding='5'><tr><th colspan=5>外觀</th></tr>";
echo "<tr><th>非常滿意</th><th>滿意</th><th>沒意見</th><th>不滿意</th><th>非常不滿意</th></tr>";
echo "<tr><td>".$num_rows_s1."</td><td>".$num_rows_s2."</td><td>".$num_rows_s3."</td><td>".$num_rows_s4."</td><td>".$num_rows_s5."</td></tr></table><br>";
$sql_p1 = "SELECT package FROM satisfaction where package = '1'";
$result_p1 = mysql_query($sql_p1, $conn);
$num_rows_p1 = mysql_num_rows($result_p1);
$sql_p2 = "SELECT package FROM satisfaction where package = '2'";
$result_p2 = mysql_query($sql_p2, $conn);
$num_rows_p2 = mysql_num_rows($result_p2);
$sql_p3 = "SELECT package FROM satisfaction where package = '3'";
$result_p3 = mysql_query($sql_p3, $conn);
$num_rows_p3 = mysql_num_rows($result_p3);
$sql_p4 = "SELECT package FROM satisfaction where package = '4'";
$result_p4 = mysql_query($sql_p4, $conn);
$num_rows_p4 = mysql_num_rows($result_p4);
$sql_p5 = "SELECT package FROM satisfaction where package = '5'";
$result_p5 = mysql_query($sql_p5, $conn);
$num_rows_p5 = mysql_num_rows($result_p5);
echo "<table border=1 align='center' style=\"border:3px solid;padding:5px;\" rules=\"all\" cellpadding='5'><tr><th colspan=5>包裝</th></tr>";
echo "<tr><th>非常滿意</th><th>滿意</th><th>沒意見</th><th>不滿意</th><th>非常不滿意</th></tr>";
echo "<tr><td>".$num_rows_p1."</td><td>".$num_rows_p2."</td><td>".$num_rows_p3."</td><td>".$num_rows_p4."</td><td>".$num_rows_p5."</td></tr></table><br>";
$sql_ss1 = "SELECT service FROM satisfaction where service = '1'";
$result_ss1 = mysql_query($sql_ss1, $conn);
$num_rows_ss1 = mysql_num_rows($result_ss1);
$sql_ss2 = "SELECT service FROM satisfaction where service = '2'";
$result_ss2 = mysql_query($sql_ss2, $conn);
$num_rows_ss2 = mysql_num_rows($result_ss2);
$sql_ss3 = "SELECT service FROM satisfaction where service = '3'";
$result_ss3 = mysql_query($sql_ss3, $conn);
$num_rows_ss3 = mysql_num_rows($result_ss3);
$sql_ss4 = "SELECT service FROM satisfaction where service = '4'";
$result_ss4 = mysql_query($sql_ss4, $conn);
$num_rows_ss4 = mysql_num_rows($result_ss4);
$sql_ss5 = "SELECT service FROM satisfaction where service = '5'";
$result_ss5 = mysql_query($sql_ss5, $conn);
$num_rows_ss5 = mysql_num_rows($result_ss5);
echo "<table border=1 align='center' style=\"border:3px solid;padding:5px;\" rules=\"all\" cellpadding='5'><tr><th colspan=5>美味度</th></tr>";
echo "<tr><th>非常滿意</th><th>滿意</th><th>沒意見</th><th>不滿意</th><th>非常不滿意</th></tr>";
echo "<tr><td>".$num_rows_ss1."</td><td>".$num_rows_ss2."</td><td>".$num_rows_ss3."</td><td>".$num_rows_ss4."</td><td>".$num_rows_ss5."</td></tr></table><br>";
$sql_sss1 = "SELECT send FROM satisfaction where send = '1'";
$result_sss1 = mysql_query($sql_sss1, $conn);
$num_rows_sss1 = mysql_num_rows($result_sss1);
$sql_sss2 = "SELECT send FROM satisfaction where send = '2'";
$result_sss2 = mysql_query($sql_sss2, $conn);
$num_rows_sss2 = mysql_num_rows($result_sss2);
$sql_sss3 = "SELECT send FROM satisfaction where send = '3'";
$result_sss3 = mysql_query($sql_sss3, $conn);
$num_rows_sss3 = mysql_num_rows($result_sss3);
$sql_sss4 = "SELECT send FROM satisfaction where send = '4'";
$result_sss4 = mysql_query($sql_sss4, $conn);
$num_rows_sss4 = mysql_num_rows($result_sss4);
$sql_sss5 = "SELECT send FROM satisfaction where send = '5'";
$result_sss5 = mysql_query($sql_sss5, $conn);
$num_rows_sss5 = mysql_num_rows($result_sss5);
echo "<table border=1 align='center' style=\"border:3px solid;padding:5px;\" rules=\"all\" cellpadding='5'><tr><th colspan=5>運輸、交貨</th></tr>";
echo "<tr><th>非常滿意</th><th>滿意</th><th>沒意見</th><th>不滿意</th><th>非常不滿意</th></tr>";
echo "<tr><td>".$num_rows_sss1."</td><td>".$num_rows_sss2."</td><td>".$num_rows_sss3."</td><td>".$num_rows_sss4."</td><td>".$num_rows_sss5."</td></tr></table>";
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