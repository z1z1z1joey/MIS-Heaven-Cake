<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>確認出貨資料</title>
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
    <?php if($_GET[edit] == 1){ //如果有接收到edit的值就是要更新功能?>
    <h2>確認出貨資料</h2>
    <hr>
    <div>
    <p>
     <form id="form2" name="form2" method="post" action="ware_update.php">
    <input name="num" type="hidden" value="<?php echo $_GET[num] ; ?>" />
    <table cellpadding="3">
      <tr>
        <td colspan="2">
        </td>
      <tr>
        <td width="115" align="center" valign="middle">收件人姓名︰</td>
        <td width="185"><?php echo $_GET[name] ; ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle">連絡電話︰</td>
        <td><?php echo $_GET[phone] ; ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle">通訊地址︰</td>
        <td><?php echo $_GET[adds] ; ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle">下單日期：</td>
        <td><?php echo $_GET[date] ; ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle">訂購商品：</td>
        <td><?php echo $_GET[item] ; ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle">所需數量：</td>
        <td><?php echo $_GET[quan] ; ?> 箱</td>
      </tr>
      <tr>
        <td align="center" valign="middle">訂單金額：</td>
        <td><?php echo $_GET[sum] ; ?> 元</td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <br>
          <input name="ship" type="hidden" value="已出貨" />
          <input type="submit" name="button2" value="確認" onclick="if(confirm('確認資料無誤要送出嗎？'))return true;else return false" />
          </div></td>
      </tr>
    </table>
    </form>
    <?php }else{ //沒有接收到edit值就保留新增功能?>
    <h2>填寫訂貨資料</h2>
    <hr>
    <p>
    <form id="form2" name="form2" method="post" action="ware_update.php"><input name="status" type="hidden" value="未撥款" />
    <table border="1" align="center" style="border:3px solid;padding:5px;" rules="all" cellpadding='5'>
  <tr>
    <td colspan="5" align="center" valign="middle" bgcolor="#FFFFFF">產品名稱與成分內容</td>
    </tr>
  <tr>
     <td align="center" valign="middle" bgcolor="#FFFFFF">麵粉</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF">水果</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF">奶油</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF">巧克力</td>
       <td align="center" valign="middle" bgcolor="#FFFFFF">起司</td>
  </tr>
  
  <?php
    $link=mysqli_connect("localhost","root","1234") or die ("無法開啟Mysql資料庫連結"); //建立mysql資料庫連
	mysqli_select_db($link, "project"); //選擇資料庫
	$sql = "SELECT SUM(ING1) AS AA,SUM(ING2) AS AB,SUM(ING3) AS AC,SUM(ING4) AS AD,SUM(ING5) AS AE FROM inventory"; //在test資料表中選擇所有欄位，以ID為遞增排序
	mysqli_query($link, 'SET CHARACTER SET utf8');	 // 送出Big5編碼的MySQL指令 
	mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");
	$result = mysqli_query($link,$sql); // 執行SQL查詢
	$row = mysqli_fetch_row($result); //將陣列以數字排列索引
	?>
  
  <tr>
     <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[0]." 包"; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[1]." 個"; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[2]." 罐"; ?></td>
         <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[3]." 包"; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[4]." 塊"; ?></td>

  </tr>
</table><br>
    <table cellpadding="3">
        <tr>
          <td colspan="2" align="left" valign="middle"></td>
        </tr>
        <td align="center" valign="middle">麵粉：</td>
        <td><input name="ing1" type="text" onkeyup="this.value=this.value.replace(/\D/g,'')" /> 包</td>
      </tr>
      <tr>
        <td align="center" valign="middle">水果︰</td>
        <td><input name="ing2" type="text" onkeyup="this.value=this.value.replace(/\D/g,'')" /> 個</td>
      </tr>
      <tr>
        <td align="center" valign="middle">奶油：</td>
        <td><input name="ing3" type="text" onkeyup="this.value=this.value.replace(/\D/g,'')" /> 罐</td>
      </tr>
  <tr>
        <td align="center" valign="middle">巧克力：</td>
        <td><input name="ing4" type="text" onkeyup="this.value=this.value.replace(/\D/g,'')" /> 包</td>
      </tr>
  <tr>
        <td align="center" valign="middle">起司：</td>
        <td><input name="ing5" type="text" onkeyup="this.value=this.value.replace(/\D/g,'')" /> 塊</td>
      </tr>

      <tr>
      <td colspan="3"><div align="center">
        <br>
        <input type="submit" name="button2" value="訂購" onclick="if(confirm('確認資料無誤要送出嗎？'))return true;else return false" />
        </div></td>
    </tr>
</table>
    </form>
    <?php } ?>
    <p>
    <hr>
    <a href="ware_show.php">回前頁</a>
    </div>
</center>
</div>
</body>
</html>