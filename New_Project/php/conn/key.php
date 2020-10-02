<?php

function connect_db(){
    $hostname_key = "localhost";
    $database_key = "tufamilia";
    $username_key = "root";
    $password_key = "";
    $mydb = new mysqli($hostname_key, $username_key, $password_key, $database_key);
    if ( $mydb->connect_errno){
		printf("Conexión fallida: %s\n", $mydb->connect_error);
    	exit();
	}else{
        return $mydb;
    }
}

?>