<?php
		session_start();
		header("Content-Type:text/html; charset=utf-8");

		mysql_connect("localhost","root","asd09720") or die ("fail");  //連結mysql
		mysql_select_db("login");  //選擇資料庫
		mysql_query("SET NAMES 'utf8'");  //文字編碼設UTF8	
		$id = $_SESSION['account'];
		$name = $_POST["name"];
		$amount = $_POST["amount"];
		$price = $_POST["price"];
		$time = $_POST["time"];
		$address = $_POST["address"];
		$pp = $_POST["pp"];
		
		

		$sql="INSERT INTO `login`.`list` (`id`, `name`,`amount`,`price`,`time`,`address`,`pp`) VALUES ('".$id."','".$name."','".$amount."','".$price."','".$time."','".$address."','".$pp."')";
					mysql_query($sql) or die ("系統發生錯誤");
			echo "<script>";
			echo "alert(\"完成訂購！\");";
			echo "</script>";
			echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';



		

?>
