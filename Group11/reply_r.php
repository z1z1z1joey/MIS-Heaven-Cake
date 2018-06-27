<?php
 header("Content-Type:text/html;charset=utf8");
 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = '1234'; 
 $dbname = 'project';

 
 
 
 $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
  mysql_query("SET NAMES 'utf8'");
  mysql_select_db($dbname);
  
  $id = $_POST['id'];
  $reply = $_POST['reply'];
  
  $sql_update = "Update guestbook Set reply = '$reply' WHERE id = '$id'";
  $result = mysql_query($sql_update) or die('MySQL update error');

	 header('Location: memo.php');
 
  
?>