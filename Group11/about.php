<?php session_start() ;?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>關於我們</title>
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
<table border=1 align='center' style="border:3px solid;padding:5px;" rules="all" cellpadding='5'>
<tr>
<td>職位</td>
<td>CEO</td>
<td>會計/人事部門主管</td>
<td>採購部門主管</td>
<td>網路管理員</td>
<td>採購/生產部門主管</td>
<td>倉儲部門主管</td>


</tr>
<tr>
<td>姓名</td>
<td>Polo Chen</td>
<td>李琦</td>
<td>陳咨諺</td>
<td>蘇王德</td>
<td>李昆儒</td>
<td>朱元旻</td>

</tr>
<tr>
<td>個人網頁</td>
<td><a href="https://www.facebook.com/polochen?fref=ts"><img src="polo.jpg" width="200" height="200"></td>
<td><a href="https://www.facebook.com/lee2006f4"><img src="me.jpg" width="200" height="200"></td>
<td><a href="https://www.facebook.com/profile.php?id=100001955163875&fref=ts"><img src="chen.jpg" width="200" height="200"></td>
<td><a href="https://www.facebook.com/andyorz.ing?fref=ts"><img src="wh.jpg" width="200" height="200"></td>
<td><a href="https://www.facebook.com/profile.php?id=100000186005939&fref=ts"><img src="lee.jpg" width="200" height="200"></td>
<td><a href="https://www.facebook.com/profile.php?id=100000186005939&fref=ts"><img src="chu.jpg" width="200" height="200"></td>
</tr>







</div>
</body>
</html>