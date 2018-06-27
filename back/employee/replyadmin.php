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
<?php 
$cc="SELECT * from board order by boardid desc";
$data=mysql_query($cc)//讓資料由最新呈現到最舊
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<title>管理員回覆</title>

<style>
.top{
 margin:auto;
 width:60vw;
 text-align:right;
 padding:15vh 0 0 0;
 font-family:微軟正黑體;
}
/*.nav{
 background-color:#339;
 padding: 10px 0px;
 }*/
.nav a {
  color: #5a5a5a;
  font-size: 11px;
  font-weight: bold;
  text-transform: uppercase;
}

.nav li {
  display: inline;
}
 .CSSTableGenerator {
 margin:auto;
 padding:0px;
 width:60vw;
 }
 .CSSTableGenerator table{
    border-collapse: collapse;
    border-spacing: 0;
 width:100%;
 height:100%;
 margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
 -moz-border-radius-bottomright:9px;
 -webkit-border-bottom-right-radius:9px;
 border-bottom-right-radius:9px;
}
.CSSTableGenerator table tr:first-child td:first-child {
 -moz-border-radius-topleft:9px;
 -webkit-border-top-left-radius:9px;
 border-top-left-radius:9px;
}
.CSSTableGenerator table tr:first-child td:last-child {
 -moz-border-radius-topright:9px;
 -webkit-border-top-right-radius:9px;
 border-top-right-radius:9px;
 
}.CSSTableGenerator tr:last-child td:first-child{
 -moz-border-radius-bottomleft:9px;
 -webkit-border-bottom-left-radius:9px;
 border-bottom-left-radius:9px;
 
}.CSSTableGenerator tr:hover td{
 background-color:#005fbf;
 color:white;
}
.CSSTableGenerator td{
 vertical-align:middle;
 background-color:#e5e5e5;
 border:1px solid #999999;
 border-width:0px 1px 1px 0px;
 text-align:left;
 padding:8px;
 font-size:16px;
 font-family:Arial,微軟正黑體;
 font-weight:normal;
 color:#000000;
}.CSSTableGenerator tr:last-child td{
 border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
 border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
 border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
  background:-o-linear-gradient(bottom, #005fbf 5%, #005fbf 100%); 
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #005fbf) );
  background:-moz-linear-gradient( center top, #005fbf 5%, #005fbf 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#005fbf"); 
  background: -o-linear-gradient(top,#005fbf,005fbf);
  background-color:#005fbf;
  text-align:center;
  font-size:20px;
  font-family:Arial, 微軟正黑體;
  font-weight:bold;
  color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
  background:-o-linear-gradient(bottom, #005fbf 5%, #005fbf 100%); 
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #005fbf) );
  background:-moz-linear-gradient( center top, #005fbf 5%, #005fbf 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#005fbf"); 
  background: -o-linear-gradient(top,#005fbf,005fbf);
  background-color:#005fbf;
}

 
</style>
</head>

<body>


      
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php
for($i=1;$i<=mysql_num_rows($data);$i++){
 $rs=mysql_fetch_assoc($data);
?>
<div class="container">
  <div class="CSSTableGenerator">
      <table align="center">
            <tr>
              <td><?php echo $rs['boardSubject']?></td>
             
              <td> <a href="reply.php?id=<?php echo $rs['boardid']  ?>">回覆</a>
			  </td>

            </tr>
            <tr>
              <td width="25%">暱稱</td>
              <td width="25%"><?php echo $rs['boardname']?></td>
            </tr>
            <tr>
              <td>信箱</td>
              <td><?php echo $rs['boardmail']?></td>
            </tr>
            <tr>
              <td>性別</td>
              <td><?php echo $rs['boardsex']?></td>
            </tr>
            <tr>
              <td>留言內容</td>
              <td><?php echo $rs['boardcontent']?></td>
            </tr>
            <?php if($rs['reply']!=""){?>
            <tr>
              <td colspan="2" style="background:#999; color:white; text-align:center">站長回覆</td>
            </tr>
            <tr>
              <td colspan="2"><?php echo $rs['reply']?></td>
            </tr>
            <?php } ?>
        </table>
 </div>
</div>
<br />
<?php } ?>


</body>
</html>