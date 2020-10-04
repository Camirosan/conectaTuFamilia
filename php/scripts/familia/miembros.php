<?php
include '../../conn/key.php';
$json = utf8_encode($_POST['data']);
$data = json_decode($json);
$familia = $data->familia;

$query = "SELECT `cant_miembros` FROM `familias` WHERE `familias`.`familia` = '$familia'";
$mydb = connect_db();
if ($result = $mydb->query($query)) {
    $data = $result->fetch_assoc();
    $miembros = $data['cant_miembros'];
    echo json_encode($miembros);
    $result->free();
}else{
    echo 'Error en la consulta con la base de datos';
};
$mydb->close();
?>