<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資料查詢</title>
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
<center>
<h2>資料查詢</h2>
    <hr>
    <div>
    <?php
	//先設定變數給欄位值→偵測條
	$area = $_POST[area];
	$item = $_POST[item];
	$credit = $_POST[credit];
	//預設為全選
	//$sql = "SELECT * FROM business where 1 = 1 " ;
	//以下判定篩選資料是否為預設的空值，若不是就偵測變數
	 if($item != ""){
			$sql = "SELECT * FROM business WHERE ITEM='".$item."' ORDER BY NUM ASC" ;
			} else if($credit != ""){
				$sql = "SELECT * FROM business WHERE CREDIT='".$credit."' ORDER BY NUM ASC" ;
				} else{}
				
	 $link= mysql_connect("localhost", "root", "1234");//(1,2,3=本機,帳號,密碼)
	 mysql_select_db("project");
	 //設定編碼
	 mysql_query("SET NAMES 'utf8'");
	 mysql_query("SET CHARACTER_SET_CLIENT=utf8");
	 mysql_query("SET CHARACTER_SET_RESULTS=utf8");
	 // 做查詢資料的動作
	$result = mysql_query($sql); 
	//成功搜尋到資料與否的判斷式
	
	if(mysql_fetch_array($result)==0){
		echo "<h1>沒有符合您篩選的條件，請重新查詢謝謝</h1>";
		}else{
			echo "以下為您查詢的資料";
	 } 
			
	// 可以當作紀錄~從$query得到的變數去資料庫抓取出
	while ($row = mysql_fetch_array($result)) { 
	?>
	<p>
    <table border="1" align="center" width='1200' style="border:3px solid;padding:5px;" rules="all" cellpadding='5'>
    <tr>
    <td align="center" valign="middle"><div align="center">訂單編號</div></td>
    <td align="center" valign="middle"><div align="center">收件人姓名</div></td>
    <td align="center" valign="middle"><div align="center">連絡電話</div></td>
    <td align="center" valign="middle"><div align="center">通訊地址</div></td>
    <td width="center" valign="middle"><div align="center">訂購商品</div></td>
    <td width="center" valign="middle"><div align="center">所需數量</div></td>
    <td width="center" valign="middle"><div align="center">訂單金額</div></td>
    <td width="center" valign="middle"><div align="center">下單日期</div></td>
    <td width="center" valign="middle"><div align="center">信用審核</div></td>
    <td width="300" align="center" valign="middle"><div align="center">備註</div></td>
	<td width="center" valign="middle"><div align="center"></div></td>
    </tr>
    <tr bgcolor="#FFFF00">
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[NUM];   ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[NAME];   ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[PHONE]; ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[AREA]; ?> <?php echo $row[ADDS]; ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[ITEM]; ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[QUAN]; ?> 箱</td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[SUM]; ?> 元</td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[DATE]; ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[CREDIT]; ?></td>
    <td width="300" align="left" valign="middle" bgcolor="#FFFFFF"><?php echo $row[REMARK]; ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="bus_add.php?num=<?php echo $row[NUM]; ?>&amp; name=<?php echo $row[NAME]; ?>&amp; phone=<?php echo $row[PHONE]; ?>&amp; area=<?php echo $row[AREA]; ?>&amp; adds=<?php echo $row[ADDS]; ?>&amp; date=<?php echo $row[DATE]; ?>&amp; item=<?php echo $row[ITEM]; ?>&amp; quan=<?php echo $row[QUAN]; ?>&amp; remark=<?php echo $row[REMARK]; ?>&amp">修改</a></td>
    </tr>
    </table>
    <p>
	<?php } ?>
    <hr>
    <a href="bus_show.php">回前頁</a><p>
    </div>
    </center>
</body>
</html>
</div>
</body>
</html>