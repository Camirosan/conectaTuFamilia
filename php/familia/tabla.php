<?php
include '../conn/key.php';
$json = utf8_encode($_POST['data']);
$data = json_decode($json);
$familia = $data->familia; 

$query = "SELECT * FROM `perfiles` WHERE `id` IN (
    SELECT `rel_per_fam`.`id_perfil` FROM `rel_per_fam` WHERE `id_familia` IN (
    SELECT `familias`.`id` FROM `familias` WHERE `familias`.`familia` = '$familia' ))";


$mydb = connect_db();
if ($result = $mydb->query($query)) {
}else{
    echo 'Error en la consulta con la base de datos';
};
$mydb->close();

?>
<script src="js/familia/tabla.js"></script>
<table id="lista_familar" class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido 1</th>
            <th scope="col">Apellido 2</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
            </tr>
        </thead>
            <tbody>
                <?php
                    while($data = $result->fetch_assoc()) {
                        
                        $datos =    $data['id']."||".
                                    $data['nombre']."||".
                                    $data['apellido_1']."||".
                                    $data['apellido_2'];
                        // echo ("datos <br><br><br>");
                        // echo($datos);
                        ?>
                <tr>
                    <td class="table-td">
                        <?php echo $data['nombre'] ?>
                    </td>
                    <td class="table-td">
                        <?php echo $data['apellido_1'] ?>
                    </td>
                    <td class="table-td">
                        <?php echo $data['apellido_2'] ?>
                    </td>
                    <td>  
                        <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdit" id="test" onclick="agregaform('<?php echo $datos ?>')">
                            Editar
                        </button>
                    </td>
                    <td>  
                        <button class="btn btn-danger glyphicon glyphicon-remove" data-toggle="modal" data-target="#modalErase" onclick="preguntarSiNo('<?php echo $data['id'] ?>')">
                            Eliminar
                        </button>
                    </td>
                </tr>
                <?php
                    }
                    ?>
            </tbody>
            <tfoot> 
                <tr> 
                   <td colspan="3">  </td>
                   <td> 
                        
                        <div>
                        <button type="button" id="btnRegistro" class="btn btn-primary"  data-toggle="modal" data-target="#modalRegist" >
                            Registrar
                        </button>
                        </div>
                        <div>
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
                            <a href="index.php" class="btn btn-danger">Cerrar Sesión</a>
                        </div>
                        
                   </td> 
               </tr> 
            </tfoot> 
    </table>