<?php 
include '../conn/key.php';
$json = utf8_encode($_POST['data']);
$data = json_decode($json);
$userName = $data->user;
$password = $data->pwd;
$mydb = connect_db();
$query = "SELECT * FROM `usuarios` WHERE `usuario` LIKE '$userName'";
if ($result = $mydb->query($query)) {
    $data = $result->fetch_assoc();
    $user = $data['usuario'];
    $pwd = $data['password'];
    if($user == $userName && $pwd == $password){
        session_start();
        $_SESSION['user'] = $user;
        echo 1;
    }else{
        echo 0;
    }
    $result->free();
}else{
    echo 'Error en la consulta con la base de datos';
};
$mydb->close();
?>