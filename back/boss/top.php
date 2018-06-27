<?php 
session_start(); 
include("dbconnect.php");
if ($_SESSION["login_session"] != true) {
  header("Location: login.php");  // 轉址至登入表單
} else {
  $msg = $_SESSION["id"];
  echo "<script>console.log('Already logged in.".$msg."');</script>";
}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link href="../style/page_top.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="top">
  <div id="logo"><img src="../images/logo.png" width="280" height="75" /></div>
  <div id="topRight">
    <div id="exit">
      <ul>
        <li><img src="../images/logout.gif" width="16" height="16" /><strong><a target="_parent" href="logout.php">退出</a></strong></li>
        
      </ul>
    </div>
    <div id="login">
      <ul>
        <li>身份：老闆</li>
        <li>使用者：<? echo $msg; ?></li>
      </ul>
    </div>
  </div>
</div>

</body>
</html>
