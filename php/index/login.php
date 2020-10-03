<!-- Formulario de inicio de sesión -->
<form>
    <div class="form">
        <label for="userName">Nombre de usuario</label>
        <input type="text" class="form-control" id="userName" required>
    </div>
    <div class="form">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" required>
    </div>
    <button type="submit" class="btn btn-outline-light" id="sesionBtn">Iniciar sesión</button>
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style= "display:none">
        Verifica el usuario y la cnotraseña
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
  </button>
</div>
</form>