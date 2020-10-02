$(function(){
    // Botón de bienvenida, activa los formularios
    $('#wellcomeBtn').on('click', function(){
        $('#contenedor_1').toggle();
        $('#contenedor_2').toggle();
    });
    // Acción click en el botón de inicio de sesión
    $('#sesionBtn').on('click', function(){
        if(($('#userName').val() != "") && ($('#password').val() != "")){
            const userName = $('#userName').val();
            const password = $('#password').val();
            const dataToSend = {
                user:userName,
                pwd:password,
            };
            const jsonToSend = JSON.stringify(dataToSend);
            $.ajax({
                type: "POST",
                url: "php/scripts/login.php",
                data: {data:jsonToSend},
                success: function (getdata){
                    console.log(getdata);
                    // alert (getdata);
                    if(getdata == 1){
                        window.location.assign('familia.php');
                        $('#sesion').submit('familia.php');
                    }else{
                        alert ('El usuario y la contraseña no coinciden')
                    }
                },
                error:  function(textStatus){
                    alert (textStatus);
                }
            });
        }else{
            alert('Ingresa tu usuario y contraseña')
        }
    });
    // Acción de click en el botón de registro
});