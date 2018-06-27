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
        <li><a href="mian1-1.php"><img src="../images/a-1.png" width="90" height="31" border="0" /></a></li>
        <li><a href="mian1-2.php"><img src="../images/b-1.png" width="81" height="31" /></a></li>
        <li><a href="mian1-3.php"><img src="../images/c.png" width="79" height="31" /></a></li>
      </ul>
    </div>
    <div id="content">
      <div id="menu">員工管理 &gt; 基本資料</div>
      <div id="tb">
       
     <table>
    <thead>
        <tr>
        <th>請假日期</th>
            <th>請假事由</th>
      <th>狀態</th>
            
        </tr>
    </thead>
    <tbody>
  <?php
         $data=mysql_query("select * from nocome WHERE id='".$msg."'");
       for($i=1;$i<=mysql_num_rows($data);$i++){
            $rs=mysql_fetch_row($data);
        ?>
        <tr>
            <td><?php echo $rs['2']?></td>
            <td><?php echo $rs['3']?></td>
            <td><?php echo $rs['4']?></td>
        </tr>
  <?php } ?>
    </tbody>
</table>
      <div id="bj">
        <ul>
          
          <li><a href="update2.php"><img src="../images/edit.gif" width="74" height="31" border="0" /></a></li>
          
        </ul>
      </div>
      </div>
     </div>
</body>
</html>
