<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_link = "localhost";
$database_link = "s10144228";
$username_link = "root";
$password_link = "283132343645";
$link = mysql_pconnect($hostname_link, $username_link, $password_link) or trigger_error(mysql_error(),E_USER_ERROR); 
?>