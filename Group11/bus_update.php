<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>連結到資料庫</title>
</head>

<body>
	<?php
    $item = $_POST[item];
	$quan = $_POST[quan];
	
	if($item == "法式巧克力"){
		$sum = $quan * 130;
		} else if($item == "1974烤起司蛋糕"){
			$sum = $quan * 350;
			} else if($item == "餅乾泡芙"){
				$sum = $quan * 55;
				} else{
					$sum = $quan * 150;
					}
	?>
	<?php
    $link  =mysqli_connect("localhost","root","1234") or die("無法連接".mysql_error());  // 建立MySQL的資料庫連結
    
	mysqli_select_db($link,"project")or die ("無法選擇資料庫".mysql_error()); // 選擇資料庫
    
    mysqli_query($link, 'SET CHARACTER SET utf8');
    
    mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");
    
    $sql ="UPDATE business SET ADDS='$_POST[adds]',ITEM='$_POST[item]',QUAN='$_POST[quan]',SUM='$sum',REMARK='$_POST[remark]' WHERE NUM='$_POST[num]'";

    mysqli_query($link,$sql)or die ("無法新增".mysql_error()); //執行sql語法
    
    mysql_close($link); //關閉資料庫連結
    
    header("location:bus_show.php");  //回首頁
    ?>
</body>
</html>