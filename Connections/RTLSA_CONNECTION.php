<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_RTLSA_CONNECTION = "localhost";
$database_RTLSA_CONNECTION = "rtlsa";
$username_RTLSA_CONNECTION = "root";
$password_RTLSA_CONNECTION = "test123";
$RTLSA_CONNECTION = mysql_pconnect($hostname_RTLSA_CONNECTION, $username_RTLSA_CONNECTION, $password_RTLSA_CONNECTION) or trigger_error(mysql_error(),E_USER_ERROR); 
?>