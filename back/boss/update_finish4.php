<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("dbconnect.php");


?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link href="../style/page_mian.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="mainBg">
    
    <div id="content">
      <div id="menu">商品陳列</div>
      <div id="tb">
        
<?php
include("dbconnect.php");
$id= $_POST['id'];





//紅色字體為判斷密碼是否填寫正確
if( $id != null  )
{
        
        //更新資料庫資料語法
        $sql = "DELETE FROM product WHERE id='$id'";
        if(mysql_query($sql))
        {
                echo '刪除成功!';
                
        }
        else
        {
                echo '請輸入商品編號!';
               
        }
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
?>
 
      </div>
      
    </div>
  </div>
</body>

</html>
