<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>審核信用資料</title>
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
    <?php if($_GET[edit] == 1){ //如果有接收到edit的值就是要更新功能?>
    <h2>審核信用資料</h2>
    <hr>
    <div>
    <p>
    <form id="form2" name="form2" method="post" action="fin_update.php">
    <input name="num" type="hidden" value="<?php echo $_GET[num] ; ?>" />
    <input name="output" type="hidden" value="尚未生產" />
    <table cellpadding="3">
      <tr>
        <td colspan="2"></td>
        </tr>
      <tr>
        <td align="center" valign="middle">收件人姓名︰</td>
        <td><?php echo $_GET[name] ; ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle">連絡電話︰</td>
        <td><?php echo $_GET[phone] ; ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle">通訊地址︰</td>
        <td><?php echo $_GET[area] ; ?> <?php echo $_GET[adds] ; ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle">下單日期：</td>
        <td><?php echo $_GET[date] ; ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle">訂單金額：</td>
        <td><?php echo $_GET[sum] ; ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle">信用查核：</td>
        <td><input type="radio" name="credit" value="不通過">０
            <input type="radio" name="credit" value="不通過">１
            <input type="radio" name="credit" value="不通過">２
            <input type="radio" name="credit" value="通過">３
            <input type="radio" name="credit" value="通過">４
            <input type="radio" name="credit" value="通過">５</td>
      </tr>
      <tr>
        <td colspan="2"></td>
        </tr>
      <tr>
        <td align="center" valign="middle">事由︰</td>
        <td><textarea name="subject" id="textarea" cols="40" rows="5"><?php echo $_GET[subject] ; ?></textarea></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <br>
          <input type="submit" name="button2" value="確認" onclick="if(confirm('確認資料無誤要送出嗎？'))return true;else return false" />
        </div></td>
        </tr>
    </table>
    </form>
    <?php }else{ //沒有接收到edit值就保留新增功能?>
    <h2>確認撥款資料</h2>
    <hr>
    <p>
    <form id="form2" name="form2" method="post" action="fin_update.php">
    <input name="num" type="hidden" value="<?php echo $_GET[num] ; ?>" />
    <input name="status" type="hidden" value="已撥款" />
    <table cellpadding="3">
      <tr>
        <td colspan="2"></td>
        </tr>
      <tr>
        <td width="80" align="center" valign="middle">麵粉︰</td>
		<td width="174"><?php echo $_GET[ing1] ; ?> 包</td>
      </tr>
      <tr>
        <td align="center" valign="middle">水果︰</td>
	    <td><?php echo $_GET[ing2] ; ?> 個</td>
      <tr>
        <td align="center" valign="middle">奶油︰</td>
		<td><?php echo $_GET[ing3] ; ?> 罐</td>
      <tr>
   <tr>
        <td align="center" valign="middle">巧克力︰</td>
		<td><?php echo $_GET[ing4] ; ?> 包</td>
      <tr>
   <tr>
        <td align="center" valign="middle">起司︰</td>
		<td><?php echo $_GET[ing5] ; ?> 塊</td>
      <tr>

        <td align="center" valign="middle">總金額：</td>
		<td><?php echo $_GET[sum] ; ?> 元</td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <br>
          <input type="submit" name="button2" value="確認" onclick="if(confirm('確認資料無誤要送出嗎？'))return true;else return false" />
          </div></td>
      </tr>
    </table>
    </form>
    <?php } ?>
    <p>
    <hr>
    <a href="fin_show.php">回前頁</a>
	</div>
</center>
</div>
</body>
</html>