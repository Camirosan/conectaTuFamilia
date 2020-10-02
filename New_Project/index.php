<!DOCTYPE html>
<html lang="es">
<head>
    <title>Conecta Tu Familia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/index/styles.css">  
</head>
<body>
    <!-- Contenedor bienvenida -->
    <div class="contenedor_1" id="contenedor_1">
        <div  id="imagenCentral">
        </div>
        <div id="titulo">
            <h1>Conecta tu familia</h1>
            <button type="button" class="btn btn-outline-light" id="wellcomeBtn">Bienvenido</button>

        </div>
    </div>
    <!-- Contenedor de registros -->
    <div class="contenedor_2" id="contenedor_2" style="display:none">
    <!-- Lista de TABs para formularios -->
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item">
                <button type="button" class="btn btn-outline-light active" id="loginTab" data-toggle="tab" href="#loginForm" role="tab" aria-controls="home" aria-selected="true">Inicia Sesión</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-light" id="registerTab" data-toggle="tab" href="#registerForm" role="tab" aria-controls="home" aria-selected="true">Registrate</button>
            </li>
        </ul>
        <!-- Formularios  -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="loginForm" role="tabpanel" aria-labelledby="home-tab">
                <?php include "php/index/login.php"; ?>
            </div>
            <div class="tab-pane fade" id="registerForm" role="tabpanel" aria-labelledby="profile-tab">
                <?php include "php/index/registro.php"; ?>
            </div>
        </div>
    </div>
    <!-- scrips jQuery, Bottstrap -->
    <script src="js/jquery/jquery-3.5.1.min.js" ></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/index/index.js"></script>
    <script src="js\index\registro.js"></script>
</body>
</html>