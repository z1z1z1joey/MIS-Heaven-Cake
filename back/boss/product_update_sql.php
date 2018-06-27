<?php
		session_start();
		header("Content-Type:text/html; charset=utf-8");
		include("dbconnect.php");
			
		
		$product = $_POST['product'];
		$price = $_POST['price'];
		$sum = $_POST['sum'];
		
		

		$sql="INSERT INTO `product` (`product`,`price`,`sum`) VALUES ('$product','$price','$sum')";
					mysql_query($sql) or die ("系統發生錯誤");

			echo"<script>alert('新增成功！');history.go(-1);</script>"



		

?>
