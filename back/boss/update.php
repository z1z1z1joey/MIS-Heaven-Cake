<?php session_start(); 
include("dbconnect.php");
if ($_SESSION["login_session"] != true)
   header("Location: login.php");  // 轉址至登入表單
else
   $msg =$_SESSION["id"] ;
     		?>
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
        <li><a href="mian1-1.php"><img src="../images/a.png" width="90" height="31" border="0" /></a></li>
        <li><a href="mian1-2.php"><img src="../images/b.png" width="81" height="31" /></a></li>
        <li><a href="mian1-3.php"><img src="../images/c.png" width="79" height="31" /></a></li>
      </ul>
    </div>
    <div id="content">
      <div id="menu">員工管理 &gt; 基本資料</div>
      <div id="tb">
        
     <table width="720" border="0" cellspacing="1" cellpadding="0">
          <form action="update_finish.php" method="post">
新員工帳號:<input type="int" name="id" > <br>
新員工姓名:<input type="text" name="username" > <br>

性別:<select name="sex">
　<option value="男生">男生</option>
　<option value="女生">女生</option>
　<option value="第三性別">第三性別</option>
</select> <br>
生日:<input type="date" name="bookdate" min="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d', strtotime("+7 day", time()))?>" value="<?=date('Y-m-d')?>" > <br>
電話:<input type="int" name="phone" > <br>
信箱:<input type="text" name="email" > <br>
<p><input type='submit' value='送出表單'></p>
</form>
        </table>
      
      </div>
  </div>
</div> 
</body>
</html>
