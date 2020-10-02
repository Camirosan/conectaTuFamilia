

<?php
include 'php/conn/key.php';
//$mydb = select_db();
function query_db($userName){
	$mydb = connect_db();
	$query = "SELECT * FROM `usuarios` WHERE `usuario` LIKE '$userName'";
	if ($result = $mydb->query($query)) {

		/* obtener un array asociativo */
		while ($fila = $result->fetch_assoc()) {
			var_dump ($fila);
		}
	
		/* liberar el conjunto de resultados */
		$result->free();
	}
}

function extractData($object){
	while($dato = $object->fetch_assoc()){
		//var_dump($dato);
		//echo "\n";
		foreach ($dato as $value){
			//var_dump($value);
			//echo "$value", "<br>";
			//echo "\n";
			$dato[] = $value; 
		};
	};
	return ($dato);
}

function searchGen($tabla, $database, $registro = '*'){
    $query = "SELECT $registro FROM $tabla";
	$result = $database->query($query);
    //echo 'prueba';
	while($dato = $result->fetch_assoc()){
		//var_dump($dato);
		//echo "\n";
		foreach ($dato as $value){
			//var_dump($value);
			echo "$value", "<br>";
			//echo "\n";
		};
	}
}

//searchAtrib("usuarios", "id", "1", $mydb);
//searchGen("usuarios", $mydb);
//mysqli_close($key);
?>