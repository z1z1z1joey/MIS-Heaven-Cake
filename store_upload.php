<?php

mysql_connect("localhost","root","asd09720");    //與資料庫建立連線
mysql_select_db("e-dispatch");  //選擇資料庫 
mysql_query("SET NAMES 'utf-8'");

if(isset($_POST['image'])){

	    
    $storename = $_POST['name'];
	$upload_folder = "store";	
	$filename = iconv("UTF-8", "big5", $storename);
	$encode_storename = urlencode($storename);
	$path = "$upload_folder/$filename.jpeg";
	$image = $_POST['image'];
    
    $sql_in = "UPDATE store SET Store_Image = '$upload_folder/$encode_storename.jpeg' WHERE name = '$storename';";
  

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