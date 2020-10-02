<?php
include 'prueba.php';
include 'key.php';
$mydb = connect_db();
$query = "SELECT * FROM usuarios WHERE id LIKE 1";
$result = $mydb->query($query);
//$result = query_db($query, $mydb);
$mydb->close();
//var_dump($result);
$data = extractData($result);
//var_dump($data);
//searchGen("usuarios", $mydb);

?>