<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會計審核</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Chivo:400,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<style>
	body {
	margin:0;
		padding:0;
		background:  url() center center fixed no-repeat;
		-moz-background-size:cover;
		-webkit-background-size:cover;
		-o-background-size:cover;
		background-size:cover;
		
	}		
</style></head>
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
    <h2>會計審核</h2>
    
    <div>
    <p>
    <?php
    $link=mysqli_connect("localhost","root","1234") or die ("無法開啟Mysql資料庫連結"); //建立mysql資料庫連
	mysqli_select_db($link, "project"); //選擇資料庫
	$sql = "SELECT * FROM business WHERE CREDIT='不通過' ORDER BY NUM ASC"; //在test資料表中選擇所有欄位，以ID為遞增排序
	mysqli_query($link, 'SET CHARACTER SET utf8');	 // 送出Big5編碼的MySQL指令 
	mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");
	$result = mysqli_query($link,$sql); // 執行SQL查詢
	//$row = mysqli_fetch_assoc($result); //將陣列以欄位名索引
	//$row = mysqli_fetch_row($result); //將陣列以數字排列索引
	$total_fields=mysqli_num_fields($result); // 取得欄位數
	$total_records=mysqli_num_rows($result);  // 取得記錄數
	?>
    目前總共　<?php echo $total_records; ?>　筆訂單待審核。
    <br>
    <table border="1" align="center" style="border:3px solid;padding:5px;" rules="all" cellpadding='5'>
    <tr>
    <td align="center" valign="middle"><div align="center">訂單編號</div></td>
    <td align="center" valign="middle"><div align="center">收件人姓名</div></td>
    <td align="center" valign="middle"><div align="center">連絡電話</div></td>
    <td align="center" valign="middle"><div align="center">通訊地址</div></td>
    <td width="center" valign="middle"><div align="center">下單日期</div></td>
    <td width="center" valign="middle"><div align="center">訂單金額</div></td>
    <td width="center" valign="middle"><div align="center">信用查核</div></td>
    <td width="300" align="center" valign="middle"><div align="center">事由</div></td>
	<td align="center" valign="middle"><div align="center">處理</div></td>
    </tr>
    
	<?php for ($i=0;$i<$total_records;$i++) {$row = mysqli_fetch_assoc($result); //將陣列以欄位名索引  ?>
    <?php if( $i%2==1){ //用變數$i除以2求餘數判斷是否等於1     ?>
    <tr>
    <tr bgcolor="#FFFF00">
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[NUM];   ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[NAME];   ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[PHONE]; ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[ADDS]; ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[DATE]; ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[SUM]; ?> 元</td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[CREDIT] ?></td>
    <td width="300" align="left" valign="middle" bgcolor="#FFFFFF"><?php echo $row[SUBJECT]; ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="fin_add.php?num=<?php echo $row[NUM]; ?>&amp; name=<?php echo $row[NAME]; ?>&amp; phone=<?php echo $row[PHONE]; ?>&amp; area=<?php echo $row[AREA]; ?>&amp; adds=<?php echo $row[ADDS]; ?>&amp; date=<?php echo $row[DATE]; ?>&amp; sum=<?php echo $row[SUM]; ?>&amp; credit=<?php echo $row[CREDIT]; ?>&amp; subject=<?php echo $row[SUBJECT]; ?>&amp; edit=1">審核</a></td>
    </tr>
    
	<?php }else{ ?>
    <tr bgcolor="#FFFF00">
    <td align="center" valign="middle" bgcolor="#33CCFF"><?php echo $row[NUM];   ?></td>
    <td align="center" valign="middle" bgcolor="#33CCFF"><?php echo $row[NAME];   ?></td>
    <td align="center" valign="middle" bgcolor="#33CCFF"><?php echo $row[PHONE]; ?></td>
    <td align="center" valign="middle" bgcolor="#33CCFF"><?php echo $row[ADDS]; ?></td>
    <td align="center" valign="middle" bgcolor="#33CCFF"><?php echo $row[DATE]; ?></td>
    <td align="center" valign="middle" bgcolor="#33CCFF"><?php echo $row[SUM]; ?> 元</td>
    <td align="center" valign="middle" bgcolor="#33CCFF"><?php echo $row[CREDIT]; ?></td>
    <td width="300" align="left" valign="middle" bgcolor="#33CCFF"><? echo $row[SUBJECT]; ?></td>
    <td align="center" valign="middle" bgcolor="#33CCFF"><a href="fin_add.php?num=<?php echo $row[NUM]; ?>&amp; name=<?php echo $row[NAME]; ?>&amp; phone=<?php echo $row[PHONE]; ?>&amp; area=<?php echo $row[AREA]; ?>&amp; adds=<?php echo $row[ADDS]; ?>&amp; date=<?php echo $row[DATE]; ?>&amp; sum=<?php echo $row[SUM]; ?>&amp; credit=<?php echo $row[CREDIT]; ?>&amp; subject=<?php echo $row[SUBJECT]; ?>&amp; edit=1">審核</a></td>
    </tr>
    <?php  }}  ?>
    </table>
    <?php
    $link=mysqli_connect("localhost","root","1234") or die ("無法開啟Mysql資料庫連結"); //建立mysql資料庫連
	mysqli_select_db($link, "project"); //選擇資料庫
	$sql = "SELECT * FROM purchase WHERE STATUS='未撥款' ORDER BY NUM ASC"; //在test資料表中選擇所有欄位，以ID為遞增排序
	mysqli_query($link, 'SET CHARACTER SET utf8');	 // 送出Big5編碼的MySQL指令 
	mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");
	$result = mysqli_query($link,$sql); // 執行SQL查詢
	//$row = mysqli_fetch_assoc($result); //將陣列以欄位名索引
	//$row = mysqli_fetch_row($result); //將陣列以數字排列索引
	$total_fields=mysqli_num_fields($result); // 取得欄位數
	$total_records=mysqli_num_rows($result);  // 取得記錄數
	?>
    <p>
    目前總共　<?php echo $total_records; ?>　筆訂單待撥款。
    <br>
    <table border="1" align="center" style="border:3px solid;padding:5px;" rules="all" cellpadding='5'>
    <tr>
    <td align="center" valign="middle"><div align="center">訂單編號</div></td>
     <td align="center" valign="middle"><div align="center">麵粉</div></td>
    <td align="center" valign="middle"><div align="center">水果</div></td>
    <td align="center" valign="middle"><div align="center">奶油</div></td>
  <td align="center" valign="middle"><div align="center">巧克力</div></td>

  <td align="center" valign="middle"><div align="center">起司</div></td>
    <td align="center" valign="middle"><div align="center">總金額</div></td>
    <td align="center" valign="middle"><div align="center">撥款狀態</div></td>
	<td align="center" valign="middle"><div align="center">處理</div></td>
    </tr>
    
	<?php for ($i=0;$i<$total_records;$i++) {$row = mysqli_fetch_assoc($result); //將陣列以欄位名索引  ?>
    <?php if( $i%2==1){ //用變數$i除以2求餘數判斷是否等於1     ?>
    <tr>
    <tr bgcolor="#FFFF00">
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[NUM];   ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[ING1];   ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[ING2]; ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[ING3]; ?></td>
 <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[ING4]; ?></td>
 <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[ING5]; ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[SUM]; ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[STATUS]; ?></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="fin_add.php?num=<?php echo $row[NUM]; ?>&amp; ing1=<?php echo $row[ING1]; ?>&amp;  ing2=<?php echo $row[ING2]; ?>&amp; ing3=<?php echo $row[ING3]; ?>&amp;  ing4=<?php echo $row[ING4]; ?>&amp;  ing5=<?php echo $row[ING5]; ?>&amp; sum=<?php echo $row[SUM]; ?>&amp">撥款</a></td>
    </tr>
	<?php }else{ ?>
    <tr bgcolor="#FFFF00">
    <td align="center" valign="middle" bgcolor="#33CCFF"><?php echo $row[NUM];   ?></td>
    <td align="center" valign="middle" bgcolor="#33CCFF"><?php echo $row[ING1];   ?></td>
    <td align="center" valign="middle" bgcolor="#33CCFF"><?php echo $row[ING2]; ?></td>
    <td align="center" valign="middle" bgcolor="#33CCFF"><?php echo $row[ING3]; ?></td>
  <td align="center" valign="middle" bgcolor="#33CCFF"><?php echo $row[ING4]; ?></td>
  <td align="center" valign="middle" bgcolor="#33CCFF"><?php echo $row[ING5]; ?></td>

    <td align="center" valign="middle" bgcolor="#33CCFF"><?php echo $row[SUM]; ?></td>
    <td align="center" valign="middle" bgcolor="#33CCFF"><?php echo $row[STATUS]; ?></td>
    <td align="center" valign="middle" bgcolor="#33CCFF"><a href="fin_add.php?num=<?php echo $row[NUM]; ?>&amp; ing1=<?php echo $row[ING1]; ?>&amp;  ing2=<?php echo $row[ING2]; ?>&amp; ing3=<?php echo $row[ING3]; ?>&amp;  ing4=<?php echo $row[ING4]; ?>&amp;  ing5=<?php echo $row[ING5]; ?>&amp; sum=<?php echo $row[SUM]; ?>&amp">撥款</a></td>
    </tr>
    <?php  }}  ?>
    </table>
    <p>
    </div>
</center>
</div>
</body>
</html>