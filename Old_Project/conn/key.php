<?php

$hostname_key = "localhost";
$database_key = "familia";
// Web admin
$username_key = "root";
$password_key = "";

$key = mysql_pconnect($hostname_key, $username_key, $password_key) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_query("SET NAMES 'utf8'");    // Comando para que pueda leer y mostrar bien la Ñ

?>