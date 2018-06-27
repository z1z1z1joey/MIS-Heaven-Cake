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
       
            <table>
    <thead>
        <tr>
        <th>會員姓名</th>
            <th>會員帳號</th>
      <th>密碼</th>
      <th>性別</th>
      <th>電話</th>
      <th>地址</th>
      <th>信箱</th>
            
        </tr>
    </thead>
    <tbody>
  <?php
         $data=mysql_query("select * from member");
       for($i=1;$i<=mysql_num_rows($data);$i++){
            $rs=mysql_fetch_row($data);
        ?>
        <tr>
            <td><?php echo $rs['0']?></td>
            <td><?php echo $rs['1']?></td>
            <td><?php echo $rs['2']?></td>
            <td><?php echo $rs['6']?></td>
            <td><?php echo $rs['3']?></td>
            <td><?php echo $rs['4']?></td>
            <td><?php echo $rs['5']?></td>
        </tr>
  <?php } ?>
    </tbody>
</table>
      <div id="bj">
        <ul>
          
         
          
        </ul>
      </div>
      </div>
     </div>
</body>
</html>