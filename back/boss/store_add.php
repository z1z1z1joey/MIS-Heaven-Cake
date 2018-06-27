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
    <h2>訂貨系統</h2>
    
   <table border="1" align="center" style="border:3px solid;padding:5px;" rules="all" cellpadding='5'>
    <thead>
        <tr>
        <th>商品編號</th>
        <th>名稱</th>
        <th>價格</th>
        <th>庫存量</th>
        <th>訂貨量</th>
        <th>訂貨</th>    
        </tr>
    </thead>

   
      
        
        <?php $result = mysql_query("SELECT * FROM product");

  while ($row = mysql_fetch_row($result)) {
?>  
    <tr>
         <td align="center" valign="middle" bgcolor="#FFFFFF"><? echo $row[0] ?></td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><? echo $row[1] ?></td>
         <td align="center" valign="middle" bgcolor="#FFFFFF"><? echo $row[2] ?></td>
         <td align="center" valign="middle" bgcolor="#FFFFFF"><? echo $row[3] ?></td>
         <form method="post" action="order_sql.php?id=<?=$row[0]?>">
         <td><input type="text" style="font-size:20px" name="sum" size="15"></td>
         <td><input type="submit" value="訂貨"></td>
        </tr>


    </form>
     
        <?}?>
    <div id="bj">
        
      </div>
</table>
</body>
</html>