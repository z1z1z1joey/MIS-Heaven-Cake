<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>連結到資料庫</title>
</head>

<body>
	<?php
    $ing1 = $_POST[ing1];
	$ing2 = $_POST[ing2];
	$ing3 = $_POST[ing3];
                      $ing4 = $_POST[ing4];
                       $ing5 = $_POST[ing5];

	  
	$sum = ($ing1*30) + ($ing2*50) + ($ing3*20)+ ($ing4*20)+ ($ing5*30);
	?>
	<?php
    $link  =mysqli_connect("localhost","root","1234") or die("無法連接".mysql_error());  // 建立MySQL的資料庫連結
    
	mysqli_select_db($link,"project")or die ("無法選擇資料庫".mysql_error()); // 選擇資料庫
    
    mysqli_query($link, 'SET CHARACTER SET utf8');
    
    mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");
    
    $sql = "INSERT INTO purchase (NUM, ING1, ING2, ING3,ING4,ING5, SUM, STATUS)
    VALUES (NULL,'$_POST[ing1]','$_POST[ing2]','$_POST[ing3]','$_POST[ing4]','$_POST[ing5]','$sum','$_POST[status]')"; //homework為資料表名稱,大寫NUM...為資料表欄位名稱,小寫name為填寫表格的value(沒有小寫nmu是因為編號設定自動產生)
	
    mysqli_query($link,$sql)or die ("無法新增".mysql_error()); //執行sql語法
    
    mysql_close($link); //關閉資料庫連結
    
    header("location:ware_show.php");  //回首頁
    ?>
    <?php
    $link  =mysqli_connect("localhost","root","1234") or die("無法連接".mysql_error());  // 建立MySQL的資料庫連結
    
	mysqli_select_db($link,"project")or die ("無法選擇資料庫".mysql_error()); // 選擇資料庫
    
    mysqli_query($link, 'SET CHARACTER SET utf8');
    
    mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");
    
    $sql ="UPDATE business SET SHIP='$_POST[ship]' WHERE NUM='$_POST[num]'";

    mysqli_query($link,$sql)or die ("無法新增".mysql_error()); //執行sql語法
    
    mysql_close($link); //關閉資料庫連結
    
    header("location:ware_show.php");  //回首頁
    ?>
</body>
</html>