<!-- Formulario de registro -->
<form>
    <div class="form">
        <label for="familia">Familia</label>
        <input type="text" class="form-control" id="familia">
        <div>
            <select id="selectFamily" class="custom-select my-select" style="display: none;" multiple size="3"></select>
        </div>
    </div>
    <div class="form">
        <label for="nombres">Nombres</label>
        <input type="text" class="form-control" id="nombres">
        <div>
            <select id="selectName" class="custom-select my-select" style="display: none;" multiple size="3"></select>
        </div>
    </div>
    <div class="form">
        <label for="apellido_1">Primer apellido</label>
        <input type="text" class="form-control" id="apellido_1">
    </div>
    <div class="form">
        <label for="apellido_2">Segundo apellido</label>
        <input type="text" class="form-control" id="apellido_2">
    </div>
    <div class="form">
        <label for="correo">Correo electrónico</label>
        <input type="email" class="form-control" id="correo">
    </div>
    <div class="form">
        <label for="userNameReg">Nombre de usuario</label>
        <input type="text" class="form-control" id="userNameReg">
    </div>
    <div class="form">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password_1">
    </div>
    <div class="form">
        <label for="password_2">Repetir Contraseña</label>
        <input type="password" class="form-control" id="password_2">
    </div>
    <button type="submit" class="btn btn-outline-light" id="registroBtn">Registrarse</button>
</form>
