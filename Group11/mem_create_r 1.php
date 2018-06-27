<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>加入會員</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Chivo:400,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><?php
					if($_SESSION['account'] != null)
					{
						echo "<a href=\"logout.php\">登出</a>";
					}
					else
					{
						echo "<a href=\"member.php\">登入</a>";
						echo "&nbsp;&nbsp;&nbsp;";
						echo "<a href=\"mem_create.php\">加入會員</a>";
					}
				?></h1>
			</div>
		</div>
	</div>
	<div id="menu-wrapper">
		<div id="menu" class="container">
			<ul>
				<li class="current_page_item"><a href="index.php">首頁</a></li>
				<li><a href="shop.php">商品訂購</a></li>
				<li><a href="user.php">會員中心</a></li>
				<li><a href="order.php">訂單查詢</a></li>
				<li><a href="about.php">關於我們</a></li>
			</ul>
		</div>
		<!-- end #menu --> 
</div>
<br><br><br><br><br>
<?php
include("class.phpmailer.php"); //匯入PHPMailer類別
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '1234'; 
$dbname = 'project';

$number = $_GET['id'];
$name = $_REQUEST['name'];
$account = $_REQUEST['account'];
$password = $_REQUEST['password'];
$password2 = $_REQUEST['password2'];
$phone = $_REQUEST['phone'];
$address = $_REQUEST['address'];
$email = $_REQUEST['email'];
$sex = $_REQUEST['sex'];
 
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
mysql_query("SET NAMES 'utf8'");
mysql_select_db($dbname);

function randStrGen($len){
    $result = "";
    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++){
	    $randItem = array_rand($charArray);
	    $result .= "".$charArray[$randItem];
    }
    return $result;
}

// Usage example
$verification = randStrGen(5);
if($account != null && $password != null && $password2 != null && $password == $password2)
{
$sql_insert = "INSERT INTO member(name, account, password, phone, address, email, sex, verification) VALUES ('$name','$account','$password','$phone','$address','$email','$sex','$verification')";
$result = mysql_query($sql_insert) or die('MySQL insert error');
 
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
 
$mail->Subject ="會員認證信";  //郵件標題
$mail->Body = "姓名:".$name."<br>帳號:".$account."<br>密碼:".$password."<br>認證碼:".$verification."<br>請<a href=\"http://140.135.113.45/Group12/verification.php\">點此</a>啟用帳號"; //郵件內容
 
$mail->IsHTML(true); //郵件內容為html ( true || false)
$mail->AddAddress($email); //收件者郵件及名稱
 
if(!$mail->Send()) {
	echo "發送錯誤: " . $mail->ErrorInfo;
} else {
	setcookie("account", $account, time()+600);
	echo "<div align=center>感謝您的加入,請至E-mail啟用帳號!</div>";
	echo '<meta http-equiv=REFRESH CONTENT=1;url=verification.php>';
}
}
else {
	echo "<div align=center>輸入資料有誤,請重新填寫!</div>";
	echo '<meta http-equiv=REFRESH CONTENT=1;url=mem_create.php>';
}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>