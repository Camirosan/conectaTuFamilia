<?php require_once('../conn/key.php'); ?>
<?php

$json = utf8_encode($_POST['data']); 
$data = json_decode($json);

if ($data->usuario == 1) {
	$usuario = $data->userName;
	$password = $data->password;
}
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
// echo 'familias_id : ', $familias_id, "\n";
// Añadir persona a la base de datos persona
mysql_select_db($database_key, $key);
$Add_data	=
"INSERT INTO persona (`nombres`, `apellido_1`, `apellido_2`,  `edad`, `familias_id`)
 		VALUES ('$nombres', '$apellido_1', '$apellido_2', '$edad', '$familias_id')";
   
$result = mysql_query($Add_data) or die(mysql_error());

$id_persona = mysql_insert_id();
// echo 'persona_id : ', $id_persona, "\n";

// Añadir suario a la base de datos usuario
if ($data->usuario == 1) {
	mysql_select_db($database_key, $key);
	$Add_data	=
	"INSERT INTO usuario (`usuario`, `password`, `persona_id`)
			VALUES ('$usuario', '$password', '$id_persona')";
	
	$result = mysql_query($Add_data) or die(mysql_error());
}

echo $result;

mysql_close($key);

?>