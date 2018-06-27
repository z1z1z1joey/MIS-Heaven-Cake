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
           <table>
    <thead>
        <tr>
        <th>員工帳號</th>
        <th>員工姓名</th>
        <th>請假日期</th>
            <th>請假事由</th>
      <th>狀態</th>
      <th>狀態更換</th>
            
        </tr>
    </thead>
    <tbody>
  <?php
         $data=mysql_query("select * from nocome");
       for($i=1;$i<=mysql_num_rows($data);$i++){
            $rs=mysql_fetch_row($data);
        ?>
        <tr> <form action="update_finish2.php" method="post">
            <td><input type="text" name="id" value="<?=$rs['0']?>" ></td>
            <td><?php echo $rs['1']?></td>
            <td><input type="text" name="date" value="<?=$rs['2']?>" ></td>
            <td><?php echo $rs['3']?></td>
            <td><?php echo $rs['4']?></td>
            <td>
            <?php if($rs['4']=='審核中')
            {?>
             
            <select name="status">
            
　<option value="核可">核可</option>
　<option value="不核可">不核可</option>
<option value="審核中">審核中</option>
　</select>
<p><input type='submit' value='送出表單'></form></p>
  <? }else{
  echo $rs['4'];

}?>


            
</td>
        </tr>
  <?php } ?>
    </tbody>
</table>
      </div>
      
    </div>
  </div>
</body>
</html>