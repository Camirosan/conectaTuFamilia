<?php

// $json = utf8_encode($_POST['data']); 
// $usuario = json_decode($json);
// $usuario = $_POST['userName'];
// $usuario = 'camilo@eduardo.com'

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="Edit Family" />
    <meta name="author" content="Camilo Rojas" />
    <!-- Cambiar icono -->
    <link rel="icon" href="img/plugin.png" />

    <title>Conecta Tu Familia - Familia</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    

    <!-- Custom styles for this template -->
    <link href="css/familia.css" rel="stylesheet"/>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/familia.js"></script>
    <script src="js/get_user.js"></script>
    <!-- <script src="js/register.js"></script> -->
    
  </head>
  <body>
        
    <div class="container">
      <h1 class="h3 mb-3 font-weight-normal">Familia </h1>
      <div id="tabla">
      <!-- Aquí va la tabla -->
      </div>
    </div>

<!-- Modal Edicion familiar-->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <script src="js/ingresou.js"></script>
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Editar</h4>
      </div>
      <div class="modal-body">
        <!-- --------------------------- -->
        <input type="text" hidden="" id="idpersona" name="">
        <label for="familyNameu" class="sr-only" >Familia</label>
      <input
        type="textu"
        id="familyNameu"
        class="form-control"
        placeholder="Familia"
        minlength="3"
        required=""
        disabled=true
      />
	  <label for="inputLastNameu" class="sr-only">Primer apellido</label>
      <input
        type="textu"
        id="inputLastNameu"
        class="form-control"
		placeholder="Primer apellido"
		minlength="3"
        required=""
      />
	  <label for="inputLastName2u" class="sr-only">Segundo apellido</label>
      <input
        type="textu"
        id="inputLastName2u"
        class="form-control"
		placeholder="Segundo apellido"
		minlength="3"
        required=""
      />
      <label for="inputNamesu" class="sr-only">Nombres</label>
      <input
        type="textu"
        id="inputNamesu"
        class="form-control"
		placeholder="Nombres"
		minlength="3"
        required=""
      />
      <select id="multipleu" style="display: none;" size="10"/>
	  <label for="inputAgeu" class="sr-only">Edad</label>
      <input
        type="numberu"
        id="inputAgeu"
        class="form-control"
        placeholder="Edad"
		required=""
		value = "0"
      />
        <!-- --------------------------- -->
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button> -->
        <button type="button" id="submitBtnu" class="btn btn-warning" data-dismiss="modal">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Registro familiar-->
<div class="modal fade" id="modalRegist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<script src="js/ingreso.js"></script>
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Registro de un Familiar</h4>
      </div>
      <div class="modal-body">
        <!-- --------------------------- -->
        <label for="familyName" class="sr-only" >Familia</label>
      <input
        type="text"
        id="familyName"
        class="form-control"
        placeholder="Familia"
        minlength="3"
        required=""
        disabled=true
      />
	  <label for="inputLastName" class="sr-only">Primer apellido</label>
      <input
        type="text"
        id="inputLastName"
        class="form-control"
		placeholder="Primer apellido"
		minlength="3"
        required=""
      />
	  <label for="inputLastName2" class="sr-only">Segundo apellido</label>
      <input
        type="text"
        id="inputLastName2"
        class="form-control"
		placeholder="Segundo apellido"
		minlength="3"
        required=""
      />
      <label for="inputNames" class="sr-only">Nombres</label>
      <input
        type="text"
        id="inputNames"
        class="form-control"
		placeholder="Nombres"
		minlength="3"
        required=""
      />
      <select id="multiple" style="display: none;" size="10"/>
	  <label for="inputAge" class="sr-only">Edad</label>
      <input
        type="number"
        id="inputAge"
        class="form-control"
        placeholder="Edad"
		required=""
		value = "0"
      />
        <!-- --------------------------- -->
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <button type="button" id="submitBtn" class="btn btn-primary" data-dismiss="modal">Registrar</button>
      </div>
    </div>
  </div>
</div>
      
<!-- Modal borrar familiar -->
<div class="modal fade" id="modalErase" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Advertencia</h5>
      </div>
      <div class="modal-body">
        <p>Esta a punto de borrar a un familiar. ¿Desea continuar?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="borrarbtn" class="btn btn-danger" data-dismiss="modal">Borrar</button>
      </div>
    </div>
  </div>
</div>

<!-- <button type="button" id="#btnRegistro" class="btn btn-primary"  data-toggle="modal" data-target="#modalRegist" >
    Registrar
</button>
<p class="mt-5 mb-3 text-muted">Copyright © 2020</p> -->
  </body>
  <!-- <p class="mt-5 mb-3 text-muted">Copyright © 2020</p> -->
</html>