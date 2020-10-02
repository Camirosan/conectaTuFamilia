<?php require_once('../conn/key.php'); ?>
<?php

$json = utf8_encode($_POST['data']);
$data = json_decode($json);

$userId = $data->id;
$nombres = $data->nombres;
$apellido_1 = $data->apelido1;
$apellido_2 = $data->apelido2;
$edad = $data->edad;
$familia = $data->familia;

mysql_select_db($database_key, $key);
$query = "SELECT * FROM `familias` WHERE `familia` LIKE '$familia'";
$result = mysql_query($query, $key) or die(mysql_error());
$row_result = mysql_fetch_assoc($result);
$familias_id = mysql_result($result, 0);
if ($familias_id == 0) {
	mysql_select_db($database_key, $key);
	$Add_data	=
	"INSERT INTO familias (`familia`)
			VALUES ('$familia')";
	
	mysql_query($Add_data) or die(mysql_error());
	$familias_id = mysql_insert_id();
}
mysql_select_db($database_key, $key);

$Add_data	= "UPDATE `persona` SET `nombres` = '$nombres', `apellido_1` = '$apellido_1', `apellido_2` = '$apellido_2', `edad` = '$edad', `familias_id` = '$familias_id' WHERE `persona`.`id` = '$userId'";

$result = mysql_query($Add_data) or die(mysql_error());
echo $result;

mysql_close($key);

?>