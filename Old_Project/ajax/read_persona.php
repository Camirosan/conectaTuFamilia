<?php require_once('../conn/key.php'); ?>
<?php

$json = utf8_encode($_POST['data']);
$data = json_decode($json);

$userName = $data->userName;

mysql_select_db($database_key, $key);
$query = "SELECT * FROM `usuario` WHERE `usuario` LIKE '$userName'";
$result = mysql_query($query, $key) or die(mysql_error());
$resultjson = mysql_fetch_assoc($result);

$jsonToPrint = json_encode($resultjson);

$dataResult = json_decode($jsonToPrint);


if ($data->password == $dataResult->password) {
     session_start();
     $_SESSION['id_name'] = $userName;
     echo 0;
} else {
     echo 1;
};
mysql_close($key);

?>