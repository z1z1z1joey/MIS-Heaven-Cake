<?php session_start(); 
include("dbconnect.php");
if ($_SESSION["login_session"] != true)
   header("Location: login.php");  // 轉址至登入表單
else
   $msg = $_SESSION["username"] ;?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link href="../style/page_mian.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">
	
      <div id="tb">

 <center>
    <h2>庫存管理</h2>
    
    <div>
    <p>
    <table border="1" align="center" style="border:3px solid;padding:5px;" rules="all" cellpadding='5'>
    <tr>
    <td colspan="5" align="center" valign="middle">
	<?php
    $link=mysqli_connect("localhost","root","asd09720") or die ("無法開啟Mysql資料庫連結"); //建立mysql資料庫連
	mysqli_select_db($link, "product"); //選擇資料庫
	$sql = "SELECT SUM(ING1) AS AA,SUM(ING2) AS AB,SUM(ING3) AS AC,SUM(ING4) AS AD,SUM(ING5) AS AE FROM inventory"; //在test資料表中選擇所有欄位，以ID為遞增排序
	mysqli_query($link, 'SET CHARACTER SET utf8');	 // 送出Big5編碼的MySQL指令 
	mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");
	$result = mysqli_query($link,$sql); // 執行SQL查詢
	//$row = mysqli_fetch_assoc($result); //將陣列以欄位名索引

	//$total_fields=mysqli_num_fields($result); // 取得欄位數
	//$total_records=mysqli_num_rows($result);  // 取得記錄數
	?>
<div align="center">目前所有庫存量</div></td>
      </tr>
      <tr bgcolor="#FFFF00">
        <td align="center" valign="middle" bgcolor="#FFFFFF">麵粉</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF">水果</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF">奶油</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF">巧克力</td>
       <td align="center" valign="middle" bgcolor="#FFFFFF">起司</td>

      </tr>
      <tr bgcolor="#FFFF00">
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[0]." 包"; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[1]." 個"; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[2]." 罐"; ?></td>
         <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[3]." 包"; ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $row[4]." 塊"; ?></td>

      </tr>
    </table>
    <p>
    </div>
</center>
      </div>
</body>
</html>