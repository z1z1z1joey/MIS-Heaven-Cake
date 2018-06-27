<?php session_start(); 
include("dbconnect.php");
if ($_SESSION["login_session"] != true)
   header("Location: login.php");  // 轉址至登入表單
else
   $msg = $_SESSION["username"] ;?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link href="../style/page_mian.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="mainBg">
    <div id="topNav">
      <ul>
        <li><a href="mian1-1.php"><img src="../images/a-1.png" width="90" height="31" border="0" /></a></li>
        <li><a href="mian1-2.php"><img src="../images/b.png" width="81" height="31" /></a></li>
        <li><a href="mian1-3.php"><img src="../images/c-1.png" width="79" height="31" /></a></li>
      </ul>
    </div>
    <div id="content">
      <div id="menu">員工管理 &gt; 薪資管理</div>
      <div id="tb">
        你好
      </div>
      <div id="bj">
        <ul>
          <li><a href="javascript:void(null);"><img src="../images/add.gif" width="74" height="31" border="0" /></a></li>
          <li><a href="#"><img src="../images/edit.gif" width="74" height="31" border="0" /></a></li>
          <li><a href="#"><img src="../images/del.gif" width="74" height="31" border="0" /></a></li>
        </ul>
      </div>
    </div>
  </div>
</body>
</html>
