<?php require_once('../conn/key.php'); ?>

<?php

$options = array();

$json = utf8_encode($_POST['data']);
$data = json_decode($json);
$familia = $data->familia;

mysql_select_db($database_key, $key);
$query = "SELECT * FROM `familias` WHERE `familia` LIKE '$familia'";
$result = mysql_query($query, $key) or die(mysql_error());
// echo 'familias_id : ', $result, "\n";
// $row_result = mysql_fetch_assoc($result);
try {
    $familias_id = mysql_result($result, 0);
} catch (mysqli_sql_exception $e) {
    $familias_id = 0;
}
if ($familias_id == 0) {
    mysql_close($key);
}else{
    mysql_select_db($database_key, $key);
    $query = "SELECT * FROM persona WHERE familias_id = '$familias_id'";
    $result = mysql_query($query, $key) or die(mysql_error());
    
    while($row_result = mysql_fetch_assoc($result)) {
        // echo 'resultado consulta : ', "\n";
        // echo $row_result2['nombres'];
        // echo "\n";
        $options[] = $row_result['nombres'];
    } 
    
    $json_nombres = json_encode($options);
    echo $json_nombres;
    mysql_close($key);
}

?>