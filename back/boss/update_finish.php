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
$birth = $_POST['bookdate'];
$username = $_POST['username'];
$sex = $_POST['sex'];
$phone = $_POST['phone'];
$email = $_POST['email'];



//紅色字體為判斷密碼是否填寫正確
$sql = "SELECT * FROM customers where id = '$id'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);
if ( $row[1] == $id)
{
  echo '帳號重複，請重新註冊';
  echo '<meta http-equiv=REFRESH CONTENT=1;url=mian1-1.php>';  
}


    

// Usage example

elseif($id != null )
{
$sql = "INSERT into customers (id,username,password,sex,birth,phone,email) values ( '$id','$username','$phone','$sex','$birth','$phone','$email') ";
$result = mysql_query($sql) or die('MySQL insert error');
 echo '<meta http-equiv=REFRESH CONTENT=1;url=mian1-1.php>';  
}


else {
  echo "<div align=center>輸入資料有誤,請重新填寫!</div>";
  echo '<meta http-equiv=REFRESH CONTENT=1;url=mem_create.php>';
}
?>

 
      </div>
      
    </div>
  </div>
</body>
</html>
