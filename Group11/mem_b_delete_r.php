<?php   
 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = '1234'; 
 $dbname = 'project';
 
 $number = $_POST['number'];
 $name = $_POST['name'];
 $account = $_POST['account'];
 $password = $_POST['password'];
 $phone = $_POST['phone'];
 $address = $_POST['address'];
 $email = $_POST['email'];
 $sex = $_POST['sex'];
 $identify = $_POST['identify'];
 
 $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
  mysql_query("SET NAMES 'utf8'");
  mysql_select_db($dbname);
  
  $sql_delete = "DELETE FROM member Where number = '$number'";
  $result = mysql_query($sql_delete) or die('MySQL delete error');
  header("Location: member_b.php")
?>