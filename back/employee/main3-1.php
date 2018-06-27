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
      
    </div>
    <div id="content">
      <div id="menu">會員管理 &gt; 會員資料</div>
      <div id="tb">
       
           
   <?php echo '您無權限觀看此頁面!';  ?>
         
  
    
      <div id="bj">
        <ul>
          
          
          
        </ul>
      </div>
      </div>
     </div>
</body>
</html>