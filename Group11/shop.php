<?php session_start() ;?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品訂購</title>
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
	<form action="cos_buyy.php" name="form1" method="Post">
	<br><br><br><br>
	<table cellSpacing="0" cellPadding="0" width="780" border="0" VSPACE="0" HSPACE="0" align='center'>
	<tbody>
    <tr>
      <td>&nbsp;&nbsp;&nbsp; 
        <font color="#ffffff" class="no9"></font></td>
    </tr>  
      <td vAlign="top" width="420"><!-- table border-->
        <table cellSpacing="1" cellPadding="1" width="100%" bgColor="#35426f" border="0">
          <tbody>
            <tr class="title">
              <td class="title" align="middle" width="70" bgcolor="#4B87C2"><font size="5" color="#FFFFFF">商品編號</font></td>
              <td class="title" noWrap width="*" bgcolor="#4B87C2"><font size="5" color="#FFFFFF">名稱</font></td>
              <td class="title" noWrap align="middle" width="47" bgcolor="#4B87C2"><font size="5" color="#FFFFFF">商品介紹</font></td>
              <td class="title" noWrap align="middle" width="47" bgcolor="#4B87C2"><font size="5" color="#FFFFFF">價格</font></td>
              <td class="title" noWrap align="middle" width="67" bgcolor="#4B87C2"><font size="5" color="#FFFFFF">購買</font></td>
			</tr>
 

            <tr>
              <td class="body" colSpan="6" bgcolor="#CECEFF"><font size="5">美味甜點</font></td>
            </tr>

            <?php 
            include("connMysql.php");

                $data=mysql_query("select * from product ");
                for($i=1;$i<=mysql_num_rows($data);$i++){
                $rs=mysql_fetch_row($data);
                 ?>
              <tr>
              <td class="body1" noWrap align="middle" bgcolor="#CCCCCC"><font size="5" ><? echo $rs[0] ?></font></td>
              <td class="body1" noWrap bgcolor="#CCCCCC"><font size="5"><? echo $rs[1] ?></font></td>
              <td class="body1" align="middle" bgcolor="#CCCCCC"><font size="5"><img src="<? echo $rs[0] ?>.jpg" width="200" height="200"></a></font></td>
              <td class="body1" align="middle" bgcolor="#CCCCCC"><font size="5"><? echo $rs[2] ?></font></td>
              <td class="body1" noWrap align="middle" bgcolor="#CCCCCC"><font size="5"><input type="radio" name="item" value="<? echo $rs[1] ?>"></font></td>
			</tr>
			<?php } ?>
          <td colspan="5" align="right" valign="middle" bgcolor="#FFFFFF">購買數量：
		  <select name="quan">
		  <option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		  </select>
		  個</td>
          </tr>
        </table>
        <p>
        <center><input type="reset" value="清除">
		<?php
		if($_SESSION['account'] != null)
		{
			echo "<input type=\"submit\" value=\"確定\">";
		}
		else
		{
			echo "<input type=\"submit\" value=\"確定\" disabled=\"disabled\">";
		}
		?>
		<input name="ship" type="hidden" value="處理中" />
        </form>
		<br><br><br><br><br> 
</div>
</body>
</html>
