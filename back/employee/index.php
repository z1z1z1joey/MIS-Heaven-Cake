<?php 

session_start(); 
 
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>后台管理页面</title>
</head>
<frameset rows="75,*" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="top.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset rows="*" cols="230,*" framespacing="0" frameborder="no" border="0">
    <frame src="left.php" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="mian1-1.php" name="mainFrame" id="mainFrame" title="mainFrame" />
  </frameset>
</frameset>
<body>
</body>
</html>
