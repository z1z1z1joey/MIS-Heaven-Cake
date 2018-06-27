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
        <li><a href="mian1-2.php"><img src="../images/b-1.png" width="81" height="31" /></a></li>
        <li><a href="mian1-3.php"><img src="../images/c.png" width="79" height="31" /></a></li>
      </ul>
    </div>
    <div id="content">
      <div id="menu">員工管理 &gt; 請假管理</div>
      <div id="tb">
        <table width="720" border="0" cellspacing="1" cellpadding="0">
          <form action="update_finish2.php" method="post">

請假日期：<input type="date" name="bookdate" min="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d', strtotime("+7 day", time()))?>" value="<?=date('Y-m-d')?>" > <br>
請假事由：：<input type="text" name="reason" > <br>
<p><input type='submit' value='送出表單'></p>
</form>
        </table>
      </div>
      
    </div>
  </div>
</body>
</html>
