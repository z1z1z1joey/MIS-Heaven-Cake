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
        <li><a href="mian1-1.php"><img src="../images/a-1.png" width="90" height="31" border="0" /></a></li>
        <li><a href="mian1-2.php"><img src="../images/b-1.png" width="81" height="31" /></a></li>
        <li><a href="mian1-3.php"><img src="../images/c.png" width="79" height="31" /></a></li>
      </ul>
    </div>
    <div id="content">
      <div id="menu">員工管理 &gt; 基本資料</div>
      <div id="tb">
        

 <?php
include("dbconnect.php");
$id = $_SESSION ["id"];
$date = $_POST['bookdate'];
$reason = $_POST['reason'];



//紅色字體為判斷密碼是否填寫正確
$sql = "SELECT * FROM nocome where id = '$id' ";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);
if ( $row[2] == $date)
{
  echo '日期重複，請重新請假';
  echo '<meta http-equiv=REFRESH CONTENT=1;url=mian1-2.php>';  
}


    
else if($reason==null)
{

 echo '請填原因';
echo '<meta http-equiv=REFRESH CONTENT=1;url=mian1-2.php>'; 

}


else
{
$sql = "INSERT into nocome (id,datea, reason) values ( '$id','$date', '$reason')";
$result = mysql_query($sql) or die('MySQL insert error');
 

}

?>
      </div>
      
    </div>
  </div>
</body>
</html>
