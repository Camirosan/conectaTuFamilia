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

    <title>Conecta Tu Familia</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/login.js"></script>
  </head>
  <body>
    <form class="form-signin">
        
      <h1 class="h3 mb-3 font-weight-normal">Inicie Seción</h1>
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
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input
        type="password"
        id="inputPassword"
        class="form-control"
        placeholder="Contraseña"
        required=""
      />
      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me" id="remember" /> Remember me
        </label>
      </div> -->
      <button class="btn btn-lg btn-primary btn-block" type="button" id="submitBtn">
        Entrar
      </button>
      <p class="mt-5 mb-3 text-muted">Si no tiene una cuenta, Registrese <a href="registro.php">aquí</a></p>
      <p class="mt-5 mb-3 text-muted">Copyright © 2020</p>
    </form>
  </body>
</html>