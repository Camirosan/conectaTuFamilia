<?php require_once('../conn/key.php'); ?>

<?php
    $dato = $_POST;
    $persona_id = $dato['persona_id'];

    mysql_select_db($database_key, $key);

    $query ="DELETE FROM `persona` WHERE `persona`.`id` = '$persona_id'";
    $result = mysql_query($query) or die(mysql_error());

    echo $result;
    

mysql_close($key);
?>