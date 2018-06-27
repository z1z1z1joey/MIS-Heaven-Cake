<?php

mysql_connect("localhost","root","asd09720");    //與資料庫建立連線
mysql_select_db("e-dispatch");  //選擇資料庫 
mysql_query("SET NAMES 'utf-8'");

if(isset($_POST['image'])){

	date_default_timezone_set('Asia/Taipei');
	$date=date('Y').date('m').date('d').date('H').date('i');

    
    $storename = $_POST['storename'];
	$upload_folder = "upload";
	$name = $_POST['name'];
	$price = $_POST['price']."元";
	$filename =  iconv("UTF-8", "big5", $name) .iconv("UTF-8", "big5", $price);
	$encode_filename = urlencode($filename);
	$path = "$upload_folder/$date$filename.jpeg";
	$image = $_POST['image'];
    $sql = "SELECT id from store WHERE name = '$storename';";
    $result = mysql_query($sql) or die('MySQL query error');
    while($row = mysql_fetch_array($result)){
        $id = $row['id'];
    }    
        

    $sql_in = "INSERT INTO product(Shop_Num, Product_Name, Product_Price, Product_Pic) VALUES('$id', '$name', '$price', '$upload_folder/$date$encode_filename.jpeg')";
    

	if(file_put_contents($path, base64_decode($image)) != false ){
				
		mysql_query($sql_in);
		echo "upload_success";

		exit;
	}
    else {
        echo "upload";
    }

}

else{	
	echo "image_not_in";
	exit;
}


?>