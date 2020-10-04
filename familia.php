<!DOCTYPE html>
<html lang="en">
<head>
    <title>Conecta Tu Familia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/familia/styles.css">
</head>
<body>
    <?php
        session_start();
        $user = $_SESSION['user'];
    ?>
    <div class="encabezado">
        <div class="contenedor">
            <div><input class="label-text" id="userName" value="<?php echo $user ?>" disabled="disable"></input></div>
            <div><h3>Conectate con tu </h3></div>
            
        </div>
        <div class="contenedor">
            <div><h1 class="h3 mb-3 font-weight-normal">Familia </h1></div>
            <div>
                <select id="selectFamilia"></select>
            </div>
        </div>
        <div class="contenedor">
            <h3>
            <input class="label-text" id="miembros" disabled="disable"></input>Miembros en esta familia </h3>
        </div>
        
    <div>
    <div id="tabla">
        <!-- Aquí va la tabla -->
    </div>
    <!-- Scripts -->
    <script src="js/jquery/jquery-3.5.1.min.js" ></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/familia/familia.js"></script>
</body>
</html>