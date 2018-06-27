<?php
include("class.phpmailer.php"); //匯入PHPMailer類別
 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = '1234'; 
 $dbname = 'project';

 $number = $_POST['number'];
 $content = $_POST['content'];
 $name = $_POST['name'];
 $email = $_POST['email'];
 
 $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
  mysql_query("SET NAMES 'utf8'");
  mysql_select_db($dbname);
  
  $sql_update = "Update satisfaction Set content = '$content' WHERE number = '$number'";
  $result = mysql_query($sql_update) or die('MySQL update error');
  
$mail= new PHPMailer(); //建立新物件
$mail->IsSMTP(); //設定使用SMTP方式寄信
$mail->SMTPAuth = true; //設定SMTP需要驗證
$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
$mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機
$mail->Port = 465;  //Gamil的SMTP主機的埠號(Gmail為465)。
$mail->CharSet = "utf-8"; //郵件編碼
 
$mail->Username = "s283132343645@gmail.com"; //Gamil帳號
$mail->Password = "shit1117"; //Gmail密碼
 
$mail->From = $email; //寄件者信箱
$mail->FromName = "線上客服"; //寄件者姓名
 
$mail->Subject ="滿意度調查回覆";  //郵件標題
$mail->Body = "親愛的 ".$name." 您好,<br>".$content; //郵件內容
 
$mail->IsHTML(true); //郵件內容為html ( true || false)
$mail->AddAddress($email); //收件者郵件及名稱
 
if(!$mail->Send()) {
	echo "發送錯誤: " . $mail->ErrorInfo;
} else {
	echo '<meta http-equiv=REFRESH CONTENT=1;url=msg.php>';
}
?>