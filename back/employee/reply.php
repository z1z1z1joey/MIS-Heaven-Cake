<?php 
session_start();
if($_SESSION['v']!="yes"){
 header("index.php");
}

require("dbconnect.php");
$id=$_GET['id'];
$data=mysql_query("select * from board where boardid='$id'");
if(isset($_POST['boardreply'])){
 $boardreply=$_POST['boardreply'];
 $time=date("Y:m:d H:i:s",time()+28800);
 mysql_query("update board set boardreply='$boardreply',boardtime = '$time' where boardid = '$id'");
 header("location:finreply.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<title>自製留言板</title>

<style>
.reply .container{
  margin:auto;
  background-color:#f5f5f5;
  width:800px;
  padding:20px 20px 40px;;
  font-size:20px;
  font-family:微軟正黑體;
 }
.reply .container .button{
  text-align:right;
  padding: 10px;
 }
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
<div class="nav nav-tabs">
 <div class="container">
     
    </div>
</div>
<br />
<br />
<?php
for($i=1;$i<=mysql_num_rows($data);$i++){
 $rs=mysql_fetch_assoc($data);
?>
<div class="container">
  <div class="CSSTableGenerator">
      <table align="center">
            <tr>
              <td><?php echo $rs['boardsubject']?></td>
            </tr>
            <tr>
              <td width="15%">暱稱</td>
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
        </table>
 </div>
</div>
<br />
<?php } ?>
<div class="reply">
 <div class="container">
     <form id="form1" name="form1" method="post" action="">
         <div class="form-group">
             <label for="boardreply" class="col-ms-6 control-label">回覆內容：</label>
                <div class="col-ms-6">
                 <textarea class="form-control" rows="8" id="boardreply" name="boardreply"/></textarea>
                </div>
            </div>
            <div class="button">
             <input type="submit" class="btn" value="回覆"/>
            </div>
        </form>
    </div>
</div>

</body>
</html>