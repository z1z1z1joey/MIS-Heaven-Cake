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
    
    <div id="content">
  <div id="menu">庫存管理</div>
      <div id="tb">
           <table> <form action="update_finish5.php" method="post">
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
            $rs=mysql_fetch_row($data);}
        ?>
        <tr>
           
            <td><?php echo $rs['0']?></td>
            <td><?php echo $rs['1']?></td>
            <td><input type="text" name="price" value="<?=$rs['2']?>" ></td>
            <td><input type="text" name="amount" value="<?=$rs['3']?>" ></td>
            <td><input type="submit" name="button" value="確定" /></td>

        </tr>
  
    </tbody>

  </form>
  </table>
      </div>
      
    </div>
  </div>
</body>
</html>