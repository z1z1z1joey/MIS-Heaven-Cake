<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>確認生產資料</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Chivo:400,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<style>
	body {
	margin:0;
		padding:0;
		background:  url() center center fixed no-repeat;
		-moz-background-size:cover;
		-webkit-background-size:cover;
		-o-background-size:cover;
		background-size:cover;
		
	}		
</style></head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><?php
					if($_SESSION['account'] != null)
					{
						echo "<a href=\"logout.php\">登出</a>";
					}
					else
					{
						echo "<a href=\"member.php\">登入</a>";
						echo "&nbsp;&nbsp;&nbsp;";
						echo "<a href=\"mem_create.php\">加入會員</a>";
					}
				?></h1>
			</div>
		</div>
	</div>
	<div id="menu-wrapper">
		<div id="menu" class="container">
			<ul>
				<li class="current_page_item"><a href="index.php">前台</a></li>
				<li><a href="bus_show.php">訂單管理</a></li>
				<li><a href="fin_show.php">會計審核</a></li>
				<li><a href="pro_show.php">生產管理</a></li>
				<li><a href="pur_show.php">採購管理</a></li>
				<li><a href="ware_show.php">倉儲管理</a></li>
				<li><a href="member_b.php">會員管理</a></li>
				<li><a href="msg.php">意見管理</a></li>

			</ul>
		</div>
		<!-- end #menu --> 
</div>
<center>
    <h2>確認生產資料</h2>
    <hr>
    <div>
    <p>
    <?php if($_GET[edit] == 1){ //如果有接收到edit的值就是要更新功能?>
    <form id="form2" name="form2" method="post" action="pro_update.php">
    <input name="num" type="hidden" value="<?php echo $_GET[num] ; ?>" /><br>
    <table border="1" align="center" style="border:3px solid;padding:5px;" rules="all" cellpadding='5'>
  <tr>
    <td colspan="4" align="center" valign="middle" bgcolor="#FFFFFF">材料需求</td>
    </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF">
      <img src="1.jpg" width="170" height="135" /><br>法式巧克力</td>
    <td align="center" valign="middle" bgcolor="#33CCFF">
      <img src="2.jpg" width="170" height="135" /><br>1974烤起司蛋糕</td>
    <td align="center" valign="middle" bgcolor="#FFFFFF">
      <img src="3.jpg" width="170" height="135" /><br>餅乾泡芙</td>
    <td align="center" valign="middle" bgcolor="#33CCFF">
      <img src="4.jpg" width="170" height="135" /><br>水果千層</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF">
    麵粉×1<br>    
    巧克力×1</td>
    <td align="center" valign="middle" bgcolor="#33CCFF">
    麵粉×1<br>    
    起司×1<br></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF">
    麵粉×1<br>
    奶油×1<br>
    </td>
    <td align="center" valign="middle" bgcolor="#33CCFF">
    麵粉×1<br>    
    奶油×<br>
 水果×1<br>
    </td>
  </tr>
</table><br>
    <table cellpadding="3">
        <td width="100" align="center" valign="middle">收件人姓名︰</td>
        <td width="170"><?php echo $_GET[name] ; ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle">連絡電話︰</td>
        <td><?php echo $_GET[phone] ; ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle">下單日期：</td>
        <td><?php echo $_GET[date] ; ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle">通訊地址︰</td>
        <td><?php echo $_GET[area] ; ?> <?php echo $_GET[adds] ; ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle">訂購商品：</td>
        <td><?php echo $_GET[item] ; ?></td>
       </tr>
      <tr>
        <td align="center" valign="middle">所需數量：</td>
        <td><?php echo $_GET[quan] ; ?></td>
       </tr>
      <tr>
      <td colspan="2">本訂單所需成分清單為：</td>
    </tr>
    <tr>
      <td colspan="2">
        <?php
		$item = $_GET[item];
		$quan = $_GET[quan];
		
		if($item == "法式巧克力"){
			$ing1 = $quan * 1;
			$ing4 = $quan * 1;
			} else if($item == "1974烤起司蛋糕"){
				$ing1 = $quan * 1;
				$ing5 = $quan * 1;
				} else if($item == "餅乾泡芙"){
					$ing1 = $quan * 1;
					$ing3 = $quan * 1;
					} else{
						$ing1 = $quan * 1;
						$ing2 = $quan * 1;
						$ing3 = $quan * 1;
						}
						
	  echo " <li>麵粉× ".$ing1." 包<br><li>水果× ".$ing2." 個<br><li>奶油× ".$ing3." 罐<br><li>巧克力× ".$ing4." 包<br><li>起司× ".$ing5." 塊<br>";
	  ?>
      <?php
      $ming1 = -($ing1);
	  $ming2 = -($ing2);
	  $ming3 = -($ing3);
$ming4 = -($ing4);
$ming5 = -($ing5);
	  ?>
      <input name="ing1" type="hidden" value="<?php echo $ing1; ?>" />
      <input name="ing2" type="hidden" value="<?php echo $ing2; ?>" />
      <input name="ing3" type="hidden" value="<?php echo $ing3; ?>" />
      <input name="ing4" type="hidden" value="<?php echo $ing4; ?>" />
      <input name="ing5" type="hidden" value="<?php echo $ing5; ?>" />

      <input name="ming1" type="hidden" value="<?php echo $ming1; ?>" />
      <input name="ming2" type="hidden" value="<?php echo $ming2; ?>" />
      <input name="ming3" type="hidden" value="<?php echo $ming3; ?>" />
      <input name="ming4" type="hidden" value="<?php echo $ming4; ?>" />
      <input name="ming5" type="hidden" value="<?php echo $ming5; ?>" />

</tr>
      <tr>
      <td colspan="5"></td>
    </tr>
    <tr>
    <td colspan="5"><div align="center">
    <br>
    <input name="output" type="hidden" value="已完成" />
    <input type="submit" name="button2" value="確認" onclick="if(confirm('確認資料無誤要送出嗎？'))return true;else return false" />
    </div></td>
  </tr>
</table>
    </form>
    <?php }else{} ?>
    <p>
    <hr>
    <a href="pro_show.php">回前頁</a>
	</div>
</center>
</div>
</body>
</html>