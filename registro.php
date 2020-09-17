<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="LogIn Form" />
    <meta name="author" content="Camilo Rojas" />
    <!-- Cambiar icono -->
    <link rel="icon" href="img/plugin.png" />

    <title>Conecta Tu Familia - Registro</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/registro.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/register.js"></script>
  </head>
  <body>
    <form class="form-signin">
        
      <h1 class="h3 mb-3 font-weight-normal">Llene el formulario para crear una cuenta</h1>
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
      <label for="inputEmail" class="sr-only">Correo electrónico</label>
      <input
        type="email"
        id="inputEmail"
        name="inputEmail"
        class="form-control"
        placeholder="Correo electrónico"
        required=""
        autofocus=""
	  />
	  <div id="email_info">
			<h7>Ingrese un email válido</h7>
	  </div>
      
	  <label for="inputPassword" class="sr-only">Contraseña</label>
      <input
        type="password"
        id="inputPassword"
        class="form-control"
        placeholder="Contraseña"
        required=""
	  />
	  <div id="pswd_info">
			<h4>La contraseña debe cumplir con los siguientes requisitos:</h4>
			<ul>
				<li id="letter" class="invalid">Al menos <strong>una minúscula</strong></li>
				<li id="capital" class="invalid">Al menos <strong>una mayúscula</strong></li>
				<li id="number" class="invalid">Al menos <strong>un número</strong></li>
				<li id="length" class="invalid">Al menos <strong>8 caracteres de largo</strong></li>
			</ul>
	  </div>
	  <!-- <label for="inputPassword" class="sr-only">Repita su contraseña</label>
      <input
        type="password"
        id="inputPassword2"
        class="form-control"
        placeholder="Repita su contraseña"
        required=""
      /> -->
      <button class="btn btn-lg btn-primary btn-block" type="button" id="submitBtn" >
        Registrarse
      </button>
      <p class="mt-5 mb-3 text-muted">Copyright © 2020</p>
    </form>
  </body>
</html>