<?php
mysql_connect("localhost","root","asd09720");
mysql_select_db("e-dispatch");
mysql_query("set names utf8");



$storename = $_POST['storename'];

$sql = "SELECT id from store WHERE name = '$storename';";
$result = mysql_query($sql) or die('MySQL query error');
    while($row = mysql_fetch_array($result)){
        $id = $row['id'];
    }


$q=mysql_query("SELECT  *  from product WHERE Shop_Num = $id ");
while($e=mysql_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));
mysql_close();












?>