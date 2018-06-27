<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start() ;?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>填寫資料</title>
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
	ob_start();
	date_default_timezone_set('Asia/Taipei');
	$date=date('Y')."年".date('m')."月".date('d')."日"." ".date('H')."時".date('i')."分".date('s')."秒";
	setcookie("count","0");
	setcookie("lastday", $date);
	setcookie("time",$time);
	$i=@($_COOKIE["count"]);
	$i++;
	?>
    <?php
	setcookie("count",$i,time()+60);
	echo "<center>您是第 $i 次光臨本站，";
	echo "上次光臨時間為：".$_COOKIE["lastday"];
	echo "</center><p>";
	?>
    <form name="form1" method="post" action="cos_link.php">
	
        <table cellpadding="3" align='center'>
        <tr>
        <td>收件人姓名：</td>
        <td><input type="text" name="name" id="textfield" /></td>
        </tr>
        <tr>
        <td>電話：</td>
        <td><input type="text" name="phone" id="textfield2" /></td>
        </tr>
        <tr>
        <td>付款方式：</td>
		<td>
		<select name="pay">
		<option value="cod">貨到付款</option>
		<option value="retail">超商取貨付款</option>
		</select>
        </tr>
        <tr>
        <td>備註：</td>
        <td><textarea name="remark" id="textarea" cols="40" rows="5" style="width:450px;height:100px;resize:none;"></textarea></td>
		<tr><td colspan=2 align='center'><input type="submit" value="確定"></td></tr>
        </tr>
        </table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>