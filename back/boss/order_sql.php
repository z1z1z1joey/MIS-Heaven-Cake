<?php
		session_start();
		header("Content-Type:text/html; charset=utf-8");
		include("dbconnect.php");
			
		
		
		// $sum1 = $_POST['sum'];
		// $id = $_GET['id'];
		// while(mysql_num_rows($data))
		// {
		// 	$sql=" UPDATE product SET sum = sum + '$sum1' WHERE id = '$id' ";
		// 	mysql_query("UPDATE product  SET sum = sum + '$sum' WHERE no = '$no'");
		// }

    $sum = $_POST['sum'];
	$no  = $_GET['id'];
	
	mysql_query("UPDATE product  SET sum = sum + '$sum' WHERE id= '$no'");
		
               
			
		
		echo"<script>alert('新增成功！');history.go(-1);</script>";



	

?>