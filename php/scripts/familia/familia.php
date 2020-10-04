<?php
include '../../conn/key.php';
$json = utf8_encode($_POST['data']);
$data = json_decode($json);
$user = $data->user;

$query = "SELECT * FROM `familias` WHERE `id` IN (
SELECT `rel_per_fam`.`id_familia` FROM `rel_per_fam` WHERE `id_perfil` IN (
SELECT `usuarios`.`id_perfil` FROM `usuarios` WHERE `usuarios`.`usuario` = '$user' ))";
$mydb = connect_db();
if ($result = $mydb->query($query)) {
    // $array[] = $case;
    while ($data = $result->fetch_assoc()) {
        $familia[] = $data['familia'];
        $miembros[] = $data['cant_miembros'];
    }
    echo json_encode($familia);
    echo json_encode($miembros);
    $result->free();
}else{
    echo 'Error en la consulta con la base de datos';
};
$mydb->close();
?>