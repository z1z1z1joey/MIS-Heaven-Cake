<?php session_start() ;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Chivo:400,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><?php
					if($_SESSION['id'] != null)
					{
						echo "<a href=\"logout.php\">登出</a>";
					}
					else
					{
						echo "<a href=\"login.php\">登入</a>";
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
	</div>	<!-- end #menu --> 
</div>
<div align=center>
<script language="JavaScript">
function InputCheck(form1)
{
  if (form1.nickname.value == "")
  {
    alert("請輸入");
    form1.nickname.focus();
    return (false);
  }
  if (form1.content.value == "")
  {
    alert("請輸入");
    form1.content.focus();
    return (false);
  }
}

</script>
</div>
</head>

<body>

<?php
include("connMysql.php");
$boardname = $_POST['boardname'];
$boardsubject = $_POST['boardsubject'];
$boardsex = $_POST['boardsex'];
$boardmail = $_POST['boardmail'];
$boardcontent = $_POST['boardcontent'];




//紅色字體為判斷密碼是否填寫正確

// Usage example

if($boardcontent != null )
{
$sql = "INSERT into board (boardname,boardsubject,boardsex,boardmail,boardcontent) values ( '$boardname','$boardsubject','$boardsex','$boardmail','$boardcontent') ";
$result = mysql_query($sql) or die('MySQL insert error');
echo '<meta http-equiv=REFRESH CONTENT=1;url=index1.php>';
 

}
else {
  echo "<div align=center>輸入資料有誤,請重新填寫!</div>";
  echo '<meta http-equiv=REFRESH CONTENT=1;url=post.php>';
}
?>
	


</body>
</html>