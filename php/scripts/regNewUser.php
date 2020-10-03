<?php
// echo "en registro.php";
include '../conn/key.php';
$json = utf8_encode($_POST['data']);
// echo("\n json \n");
// var_dump($json);
$data = json_decode($json);
// echo("\n data \n");
// var_dump($data);
$familia = $data->familia;
$nombres = $data->nombres; 
$apellido1 = $data->apellido1;
$apellido2 = $data->apellido2;
$email = $data->email;
$usuario = $data->usuario;
$password = $data->password;
// echo("\n familia \n");
// var_dump($familia);
// echo("\n nombres \n");
// var_dump($nombres);
// echo("\n apellido1 \n");
// var_dump($apellido1);
// echo("\n apellido2 \n");
// var_dump($apellido2);
// echo("\n email \n");
// var_dump($email);
// echo("\n usuario \n");
// var_dump($usuario);
// echo("\n password \n");
// var_dump($password);
$id_familia = 0;
$mydb = connect_db();
// Buscamos si existe la familia
$query = "SELECT * FROM `familias` WHERE `familia` LIKE '$familia'";
if($result = $mydb->query($query)){
    echo("consulta exitosa \n");
    if($data = $result->fetch_assoc()){
        echo 'data : ';
        var_dump ($data);
        $id_familia = $data['id'];
        $cant_miembros = $data['cant_miembros'];
        echo "idfamilia = ", $id_familia;
        echo "\n cant_miembros = ", $cant_miembros;
        $cant_miembros ++;
        echo "\n cant_miembros = ", $cant_miembros;
    }else{
        $id_familia = 0;
        echo("la familia no se encuentra registrada en la bd");
    };   
    // $array = [];
    // while ($data = $result->fetch_assoc()) {
    //     // printf ("%s (%s)\n", $fila["Name"], $fila["CountryCode"]);
    //     echo 'data : ';
    //     var_dump ($data);
    //     // $array[] = $data;
    // }
    // echo json_encode($array);
    // echo ("\n array : \n");
    // var_dump($array);
    $result->free();
    // echo ("\n resultado = \n");
    // var_dump($result);
}else{
    echo ('Error en la consulta con la base de datos');
    echo ($mydb->error);
};
if($id_familia == 0){
    $query = "INSERT INTO `familias`(`familia`, `cant_miembros`) VALUES ('$familia', '1')";
    if($mydb->query($query)){
        $id_familia = $mydb->insert_id;
        echo("familia cerada exitosamente\n");
    }else{
        echo("no se pudo crear familia\n");
    };
}else{
    $query = "UPDATE `familias` SET `cant_miembros` = '$cant_miembros' WHERE `familias`.`id` = '$id_familia'";
    if($mydb->query($query)){
        echo("cantidad de personas en familia actualizada\n");
    }else{
        echo("no se pudo actualizar la cantidad de personas en familia\n");
    };
};

$query = "INSERT INTO `perfiles` (`nombre`, `apellido_1`, `apellido_2`) VALUES ('$nombres', '$apellido1', '$apellido2')";
if($mydb->query($query)){
    echo("perfil añadido con exito\n");
    $id_perfil = $mydb->insert_id;
    
}else{
    echo "no se pudieron añadir los valores de perfil y familia";
};
$query = "INSERT INTO `rel_per_fam` (`id_perfil`, `id_familia`) VALUES ('$id_perfil', '$id_familia')";
if($mydb->query($query)){
    echo("relacion reada con exito\n");
}else{
    echo("No se pudo hacer la relación\n");
}
$query = "INSERT INTO `usuarios` (`usuario`, `password`, `correo`, `id_perfil`) VALUES ('$usuario', '$password', '$email', '$id_perfil')";
if($mydb->query($query)){
    echo("Usuario creado con exito\n");
}else{
    echo("no se pudo crear el usuario\n");
}
// if ($result = $mydb->query($query)) {
//     // $data = $result->fetch_assoc();
//     $array[] = $case;
//     while ($data = $result->fetch_assoc()) {
//         // printf ("%s (%s)\n", $fila["Name"], $fila["CountryCode"]);
//         // echo 'data : ';
//         // var_dump ($data);
//         $array[] = $data[$index];
//     }
//     echo json_encode($array);
//     // echo "\n array : \n";
//     // var_dump($array);
//     $result->free();
// }else{
//     echo 'Error en la consulta con la base de datos';
// };
$mydb->close();
?>