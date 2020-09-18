<?php require_once('../conn/key.php'); ?>
<script language="javascript" > 
    function (funcion_javascript(valor)
        { 
        alert (valor); 
    } );
</script> 
<?php

$familiar = array();
?>
<script language="javascript"> 
    funcion_javascript(<?php echo "esto es una prueba";?>); 
</script>
<?php
$usuario = $_POST;

mysql_select_db($database_key, $key);
$query = "SELECT `persona_id` FROM `usuario` WHERE `usuario` LIKE '$usuario'";
$result = mysql_query($query, $key) or die(mysql_error());
$persona_id = mysql_result($result, 0);
$query = "SELECT `familias_id` FROM `persona` WHERE `id` LIKE '$persona_id'";
$result = mysql_query($query, $key) or die(mysql_error());
$familias_id = mysql_result($result, 0);

$query = "SELECT * FROM `persona` WHERE `familias_id` LIKE '$familias_id'";
$result = mysql_query($query, $key) or die(mysql_error());

while($row_result = mysql_fetch_assoc($result)) {
    $familiar[] = $row_result;
} 
$json_data = json_encode($familiar);


mysql_close($key);

?>