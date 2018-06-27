<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>加入會員</title>
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
<form action="mem_create_r.php" method="Post">
<table border=0 align='center'>
<tr><th colspan=2>加入會員</th></tr>
<tr><th>姓名：</th><th><Input Type="text" Name="name"></th></tr>
<tr><th>帳號：</th><th><Input Type="text" Name="account"></th></tr>
<tr><th>密碼：</th><th><Input Type="password" Name="password"></th></tr>
<tr><th>密碼：</th><th><Input Type="password" Name="password2" placeholder="再輸入一次"></th></tr>
<tr><th>電話：</th><th><Input Type="text" Name="phone"></th></tr>
<tr><th>地址：</th><th><Input Type="text" Name="address"></th></tr>
<tr><th>E-mail：</th><th><Input Type="text" Name="email"></th></tr>
<tr><th>性別：</th><th><input type="radio" name="sex" value="male">男
<input type="radio" name="sex" value="female">女</th></tr>
<tr><th colspan=2>
<input type="submit" name="submit" value="確定"/>
<input type="button" name="cancel" value="取消" onClick="location.href='member.php'"/>
</th></tr>
</table>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>