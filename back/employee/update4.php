<?php session_start(); 
include("dbconnect.php");
if ($_SESSION["login_session"] != true)
   header("Location: login.php");  // 轉址至登入表單
else
   $msg =$_SESSION["id"] ;
        ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link href="../style/page_mian.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="mainBg">
    
    <div id="content">
      <div id="menu">商品陳列</div>
      <div id="tb">
        
     <table width="720" border="0" cellspacing="1" cellpadding="0">
          <form action="product_update_sql.php" method="post">

新商品名稱:<input type="text" name="product" > <br>
價錢:<input type="int" name="price" > <br>
庫存數量:<input type="int" name="sum" > <br>
<p><input type='submit' value='送出表單'></p>
</form>
        </table>
      
      </div>
  </div>
</div> 
</body>
</html>
