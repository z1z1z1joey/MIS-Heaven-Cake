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
      <div id="menu">回覆管理 &gt; 留言資料</div>
      <div id="tb">
      </div>
<table>
    <thead>
        <tr>
        <th>暱稱</th>
        <th>性別</th>
        <th>標題</th>
            <th>發布時間</th>
            <th>信箱</th>
            <th>內容</th>
            <th>回應</th>
            
        </tr>
    </thead>
    <tbody>
  <?php
         $data=mysql_query("select * from board ");
       for($i=1;$i<=mysql_num_rows($data);$i++){
            $rs=mysql_fetch_row($data);
        ?>
        <tr>
            <td><?php echo $rs['0']?></td>
            <td><?php echo $rs['1']?></td>
            <td><?php echo $rs['2']?></td>
            <td><?php echo $rs['3']?></td>
            <td><?php echo $rs['4']?></td>
            <td><?php echo $rs['5']?></td>
            <td><?php echo $rs['6']?></td>
        </tr>
  <?php }?> 
    </tbody>
</table>
</body>
</html>