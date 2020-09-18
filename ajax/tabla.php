<?php require_once('../conn/key.php'); ?>

<?php

$familiar = array();
$usuario = utf8_encode($_POST['data']); 

mysql_select_db($database_key, $key);
$query = "SELECT `persona_id` FROM `usuario` WHERE `usuario` LIKE '$usuario'";
$result = mysql_query($query, $key) or die(mysql_error());
$persona_id = mysql_result($result, 0);
$query = "SELECT `familias_id` FROM `persona` WHERE `id` LIKE '$persona_id'";
$result = mysql_query($query, $key) or die(mysql_error());
$familias_id = mysql_result($result, 0);

$query = "SELECT * FROM `persona` WHERE `familias_id` LIKE '$familias_id'";
$result = mysql_query($query, $key) or die(mysql_error());



mysql_close($key);

?>
<script src="js/tabla.js"></script>
<table id="lista_familar" class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido 1</th>
            <th scope="col">Apellido 2</th>
            <th scope="col">Edad</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
            </tr>
        </thead>
            <tbody>
                <?php
                    while($row_result = mysql_fetch_assoc($result)) {
                        
                        $datos =    $row_result['id']."||".
                                    $row_result['nombres']."||".
                                    $row_result['apellido_1']."||".
                                    $row_result['apellido_2']."||".
                                    $row_result['edad']."||".
                                    $row_result['familias_id'];
                        ?>
                <tr>
                    <td>
                        <?php echo $row_result['nombres'] ?>
                    </td>
                    <td>
                        <?php echo $row_result['apellido_1'] ?>
                    </td>
                    <td>
                        <?php echo $row_result['apellido_2'] ?>
                    </td>
                    <td>
                        <?php echo $row_result['edad'] ?>
                    </td>
                    <td>  
                        <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdit" id="test" onclick="agregaform('<?php echo $datos ?>')">
                            Editar
                        </button>
                    </td>
                    <td>  
                        <button class="btn btn-danger glyphicon glyphicon-remove" data-toggle="modal" data-target="#modalErase" onclick="preguntarSiNo('<?php echo $row_result['id'] ?>')">
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