<?php
mysql_connect("localhost","root","asd09720");
mysql_select_db("e-dispatch");
mysql_query("set names utf8");
$q=mysql_query("SELECT  *  from store WHERE Store_Image != '' ");
while($e=mysql_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysql_close();
?>