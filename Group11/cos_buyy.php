<?php session_start(); ?>
<html>
<head><title></title></head>
<body>

<?php 
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'asd09720'; 
$dbname = 'login';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
mysql_query("SET NAMES 'utf8'");
mysql_select_db($dbname);
date_default_timezone_set('Asia/Taipei');
    
    $d=time();	
    $datetime = date("Y-m-d H:i:s",$d) ; 
	
	$item = $_POST['item'];
	$quan = $_POST['quan'];
	$ship = $_POST['ship'];
	  
	  if($item == "芒果舞曲6吋"){
		  $sum = $quan * 1300;
		  
	  } else if($item == "草莓樂園6吋"){
		  $sum = $quan * 1050;
		  
		  } else if($item == "莓果繽紛樂6吋"){
			  $sum = $quan * 955;
			  
			  } else{
				  $sum = $quan * 950;
				  
				  }
				    
					setcookie("item", $item, time()+600);
					setcookie("quan", $quan, time()+600);
					setcookie("sum", $sum, time()+600);
					setcookie("date", $date, time()+600);
					setcookie("ship", $ship, time()+600);
	
	mysql_close($conn); //關閉資料庫連結

?>
<?php echo '<meta http-equiv=REFRESH CONTENT=1;url=cos_buy.php>'; ?>
</body>
</html>