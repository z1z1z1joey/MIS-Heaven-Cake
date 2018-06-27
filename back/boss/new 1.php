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
<div id="mainBg">
    <div id="topNav">
      <ul>
        <li><a href="mian1-1.php"><img src="../images/a-1.png" width="90" height="31" border="0" /></a></li>
        <li><a href="mian1-2.php"><img src="../images/b.png" width="81" height="31" /></a></li>
        <li><a href="mian1-3.php"><img src="../images/c-1.png" width="79" height="31" /></a></li>
      </ul>
    </div>
    <div id="content">
      <div id="menu">商品管理 &gt; 商品陳列</div>
      <div id="tb">
        <table width="720" border="0" cellspacing="1" cellpadding="0">
          <tr>
		  <table border="1" align="center" style="border:3px solid;padding:5px;" rules="all" cellpadding='5'>
    <tr>
    <td colspan="5" align="center" valign="middle">
	
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

</body>
</html>