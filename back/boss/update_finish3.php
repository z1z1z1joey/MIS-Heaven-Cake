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
      <div id="menu">員工管理 &gt; 薪資管理</div>
      <div id="tb">
        
<?php


$salary = $_POST['salary'];
$id = $_POST['id'];
$year = $_POST['year'];
$month = $_POST['month'];




//紅色字體為判斷密碼是否填寫正確
$sql = "SELECT * FROM salary ";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);
if ( $row[0] == $id && $row[1]==$year && $row[2]==$month)
{
  echo '帳號重複，請重新輸入';
  echo '<meta http-equiv=REFRESH CONTENT=1;url=mian1-3.php>';  
}


    

// Usage example

elseif($id != null )
{
$sql = "INSERT into salary(id,year,month,salary) values('$id','$year','$month','$salary')";
$result = mysql_query($sql) or die(mysql_error());
 

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
