<?php
// echo "en registro.php";
include '../conn/key.php';
$json = utf8_encode($_POST['data']);
$data = json_decode($json);
$case = $data->case;
switch ($case){
    case 0:  //Consulta realizada para mostrar las familias disponibles en la bd
        $query = "SELECT * FROM `familias` ORDER BY `familia` ASC";
        $index = 'familia';
        // echo $query;
    break;
    case 1:
        $searchBy = $data->searchBy;
        $index = 'nombre';
        $query = "SELECT `perfiles`.`nombre` FROM `perfiles` WHERE `id` IN (
            SELECT `rel_per_fam`.`id_perfil` FROM `rel_per_fam` WHERE `id_familia` IN (
                SELECT `familias`.`id` FROM `familias` WHERE `familias`.`familia` = '$searchBy' ))";
        // echo $query;
    break;
    case 2:
        echo 'caso 2';
    break;
    case 3:
        echo 'caso 3';
    break;
}
$mydb = connect_db();
// $query = "SELECT * FROM `usuarios` WHERE `usuario` LIKE '$userName'";
if ($result = $mydb->query($query)) {
    // $data = $result->fetch_assoc();
    $array[] = $case;
    while ($data = $result->fetch_assoc()) {
        // printf ("%s (%s)\n", $fila["Name"], $fila["CountryCode"]);
        // echo 'data : ';
        // var_dump ($data);
        $array[] = $data[$index];
    }
    echo json_encode($array);
    // echo "\n array : \n";
    // var_dump($array);
    $result->free();
}else{
    echo 'Error en la consulta con la base de datos';
};
$mydb->close();
?>