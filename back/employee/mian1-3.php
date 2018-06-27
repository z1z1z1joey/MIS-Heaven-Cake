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
        <li><a href="mian1-2.php"><img src="../images/b.png" width="81" height="31" /></a></li>
        <li><a href="mian1-3.php"><img src="../images/c-1.png" width="79" height="31" /></a></li>
      </ul>
    </div>
    <div id="content">
      <div id="menu">員工管理 &gt; 薪資管理</div>
      <div id="tb">
       
     <table>
    <thead>
        <tr>
        <th>員工帳號</th>
            <th>年份</th>
      <th>月份</th>
      <th>業績獎金</th>
            <th>底薪</th>
            
        </tr>
    </thead>
    <tbody>
  <?php
  $data1 = mysql_query("SELECT SUM(SUM) from business");
              $data2 = mysql_query("SELECT COUNT(id) from customers");

    $ro = mysql_fetch_row($data1);
    $r = mysql_fetch_row($data2);

    
                $sum1=$ro[0]/10/$r[0];
         $data=mysql_query("select * from salary WHERE id='".$msg."' ");
       for($i=1;$i<=mysql_num_rows($data);$i++){
            $rs=mysql_fetch_row($data);
            $rs['3']=$sum1;
            $rs['5']=$rs['3']+$rs['4'];
        ?>
        <tr>
            <td><?php echo $rs['0']?></td>
            <td><?php echo $rs['1']?></td>
            <td><?php echo $rs['2']?></td>
             <td><?php echo $rs['3']?></td>
             <td><?php echo $rs['4']?></td>
             
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
