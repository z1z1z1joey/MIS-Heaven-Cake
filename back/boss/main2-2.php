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
    <h2>庫存管理</h2>
    
   <table border="1" align="center" style="border:3px solid;padding:5px;" rules="all" cellpadding='5'>
    <thead>
        <tr>
        <th>商品編號</th>
        <th>名稱</th>
        <th>價格</th>
           <th>庫存量</th>
            
        </tr>
    </thead>
    <tbody>
  <?php
         $data=mysql_query("select * from product");
       for($i=1;$i<=mysql_num_rows($data);$i++){
            $rs=mysql_fetch_row($data);
        ?>
        <tr>
           <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $rs['0'] ?></td>
           <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $rs['1'] ?></td>
           <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $rs['2'] ?></td>
           <td align="center" valign="middle" bgcolor="#FFFFFF"><?php echo $rs['3'] ?></td>
        
        
         
         <?php
         if ($rs[3]<=2){
          echo "<script>";
          echo "alert(\"$rs[1]庫存不足,請補貨;\");";
          echo "</script>";
        
          }
          ?>
        </tr>
  <?php } ?>
    </tbody>
    <div id="bj">
        <ul>
          
          <li><a href="store_add.php"><img src="../images/edit.gif" width="74" height="31" border="0" /></a></li>
          
        </ul>
      </div>
</table>
</body>
</html>