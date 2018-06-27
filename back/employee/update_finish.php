<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("dbconnect.php");


?>
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
        <li><a href="mian1-1.php"><img src="../images/a.png" width="90" height="31" border="0" /></a></li>
        <li><a href="mian1-2.php"><img src="../images/b.png" width="81" height="31" /></a></li>
        <li><a href="mian1-3.php"><img src="../images/c.png" width="79" height="31" /></a></li>
      </ul>
    </div>
    <div id="content">
      <div id="menu">員工管理 &gt; 基本資料</div>
      <div id="tb">
        
<?php
include("dbconnect.php");
$id = $_POST['id'];
$username = $_POST['username'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$phone = $_POST['phone'];
$email = $_POST['email'];


//紅色字體為判斷密碼是否填寫正確
if($_SESSION['id'] != null && $pw != null && $pw2 != null && $pw == $pw2)
{
        $id = $_SESSION['id'];
    
        //更新資料庫資料語法
        $sql = "UPDATE customers SET password='$pw',username='$username', phone='$phone',email='$email' where id='$id'";
        if(mysql_query($sql))
        {
                echo '修改成功!';
                
        }
        else
        {
                echo '修改失敗!';
               
        }
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
?>
 
      </div>
      
    </div>
  </div>
</body>
</html>
