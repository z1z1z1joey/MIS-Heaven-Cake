<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Heaven of Dessert</title>
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
						echo "<a href=\"logout.php\">登出</a>";
					}
					else
					{
						echo "<a href=\"member.php\">登入</a>";
						echo "&nbsp;&nbsp;&nbsp;";
						echo "<a href=\"mem_create.php\">加入會員</a>";
						echo "&nbsp;&nbsp;&nbsp;";
						echo "<a href=\"../back/login.php\">後臺管理</a>";
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
	<div id="banner"></div>
	<div id="page" class="container">
	<marquee>加入會員後，就可以享受方便快速快樂的購物！</marquee>
		<div id="content">
			<div class="title">
				<h2><strong>Welcome to the heaven!</strong></h2>
				<span class="byline">真心為您呈現最好的品質</span> </div>
			<p>追求最高的味蕾饗宴</p>
			<p>堅持每日限量</p>
			<p>享受每個午後饗宴！</p>
		</div>
	</div>
</div>
<div id="footer-wrapper">
	<div id="footer" class="container">
		<div id="box1">
			<div class="title">
				<h2>營業時間</h2>
			</div>
			<ul class="style1">
				<li>星期二 - 星期日 : 08:00 a.m. - 20:00 p.m.</li>
				<li>星期一公休</li>
				<li>逢國定假日公休</li>
			</ul>
		</div>
		<div id="box2">
			<div class="title">
				<h2>連絡方式</h2>
			</div>
			<ul class="style1">
				<li>E-mail : heavenoddessert@gmail.com</li>
				<li>電話 : (02) - 00000000</li>
			</ul>
		</div>
		<div id="box3">
			<div class="title">
				<h2>售後服務</h2>
			</div>
			<ul class="style1">
				<li><a href="memo1.php">留言板</a></li>
				<li><a href="satisfaction.php">滿意度調查</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="copyright" class="container">
	
</div>
</body>
</html>