<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>刪除訂單資料</title>
</head>

<body>
	<?php
    $link  =mysqli_connect("localhost","root","1234") or die("無法連接".mysql_error());  // 建立MySQL的資料庫連結
    
	mysqli_select_db($link,"project")or die ("無法選擇資料庫".mysql_error()); // 選擇資料庫
    
    mysqli_query($link, 'SET CHARACTER SET utf8');
    
    mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");
    
	$sql = "DELETE FROM business WHERE NUM='$_POST[id]'"; //設定字串，將輸入的姓名在資料表比對後刪除該筆記錄
	
	mysqli_query($link,$sql)or die ("無法刪除".mysql_error()); //執行sql語法
		
	mysql_close($link); //關閉資料庫連結
	
	header("location:bus_show.php");  //回index.php
    ?>
</body>
</html>