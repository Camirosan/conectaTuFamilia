<!-- Formulario de registro -->
<form>
    <div class="form">
        <label for="familia">Familia</label>
        <input type="text" class="form-control" id="familia" required>
        <div>
            <select id="selectFamily" class="custom-select my-select" style="display: none;" multiple size="3"></select>
        </div>
    </div>
    <div class="form">
        <label for="nombres">Nombres</label>
        <input type="text" class="form-control" id="nombres" required>
        <div>
            <select id="selectName" class="custom-select my-select" style="display: none;" multiple size="3"></select>
        </div>
    </div>
    <div class="form">
        <label for="apellido_1">Primer apellido</label>
        <input type="text" class="form-control" id="apellido_1" required>
    </div>
    <div class="form">
        <label for="apellido_2">Segundo apellido</label>
        <input type="text" class="form-control" id="apellido_2" required>
    </div>
    <div class="form">
        <label for="correo">Correo electrónico</label>
        <input type="email" class="form-control" id="correo" required>
    </div>
    <div  id="validEmail" style="display:none">
        <h6>Ingrese un e-mail válido</h6>
    </div>
    <div class="form">
        <label for="userNameReg">Nombre de usuario</label>
        <input type="text" class="form-control" id="userNameReg" required>
    </div>
    <div class="form">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password_1" required>
    </div>
    <div id="pswd_info">
        <h4>La contraseña debe cumplir con los siguientes requisitos:</h4>
        <ul>
            <li id="letter" class="invalid">Al menos <strong>una minúscula</strong></li>
            <li id="capital" class="invalid">Al menos <strong>una mayúscula</strong></li>
            <li id="number" class="invalid">Al menos <strong>un número</strong></li>
            <li id="length" class="invalid">Al menos <strong>8 caracteres de largo</strong></li>
        </ul>
	</div>
    <div class="form">
        <label for="password_2">Repetir Contraseña</label>
        <input type="password" class="form-control" id="password_2" required>
    </div>
    <div  id="validpwd2" style="display:none">
        <h6>Las contraseñas deben coincidir</h6>
    </div>
    <!-- <button type="submit" class="btn btn-outline-light" id="registroBtn">Registrarse</button> -->
    <button  class="btn btn-outline-light" id="registroBtn">Registrarse</button>
</form>
