<!DOCTYPE html>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html lang="zh-tw" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>當前銷售狀況</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Chivo:400,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- morris.css -->
	<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
</head>
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
<h2>當前銷售狀況</h2>
    <hr>
    <div>
<!-- 資料庫連線 -->
	<?php
	error_reporting(0);
	$dbServer = "localhost";
	$dbName = "project"; 
	$dbUser = "root";
	$dbPass = "1234";

	if (!@mysql_connect($dbServer, $dbUser, $dbPass))
		die("無法連線資料庫伺服器");
	mysql_query("SET NAMES utf8");
	if (!@mysql_select_db($dbName))  die("無法使用資料庫");
    ?>
<!-- 資料庫連線 END -->	
	
	
<!--google chart DIV-->	
	
	<div id="chart_div" style="width: 60%; height: 500px;"></div>
	
<!--morris.js chart-->	
	
	<div id="donut" style="width: 50%; height: 250px;"></div>
	
<!--google chart-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['名稱', '數量（個）'],
		  <?php
		  $sql = "SELECT ITEM,SUM(QUAN) FROM business WHERE SHIP='已出貨' GROUP BY ITEM";
		  $result = mysql_query($sql);
		  while($row = mysql_fetch_row($result)){
			  echo "['$row[0]',$row[1]],";
			  }
		  ?>
        ]);

        var options = {
          title: '銷售量'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
<!--google chart END-->
<!--morris.js-->	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
	<script>
	new Morris.Donut({
	  element: 'donut',
	  data: [
		<?php
		$sql = "SELECT ITEM,SUM(QUAN) FROM business WHERE SHIP='已出貨' GROUP BY ITEM";
		$result = mysql_query($sql);
        while($row = mysql_fetch_row($result)){
			echo "{label: '$row[0]', value: $row[1]},";
		}
		?>
	  ]
	});
	</script>
<!--morris.js END-->
	<p>
    <hr>
    <a href="bus_show.php">回前頁</a><p>
    </div>
</center>
</div>
</body>
</html>