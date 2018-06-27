<?php session_start(); //
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
    <h2>訂單管理</h2>
    
   <table border="1" align="center" style="border:3px solid;padding:5px;" rules="all" cellpadding='5'>
      <thead>
        <tr>
        <th>名稱</th>
        <th>數量</th>
        <th>價格</th>
        <th>日期</th>
        <th>收件人</th>
        <th>電話</th>
        <th>備註</th>
        <th>地址</th>
        <th>帳號</th>
        </tr>
       </thead>
    <tbody>
  <?php
         $data=mysql_query("select * from business");
       for($i=1;$i<=mysql_num_rows($data);$i++){
            $rs=mysql_fetch_row($data);
        ?>
        <tr>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $rs['1'] ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $rs['2'] ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $rs['3'] ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $rs['4'] ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $rs['7'] ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $rs['8'] ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $rs['9'] ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $rs['10'] ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $rs['11']?></td>
        </tr>
  <?php } ?>
    </tbody>
</table>
</body>
</html>