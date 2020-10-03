$(function(){
    
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
                        alert('Verifique su usuario y contraseña')
                    }
                },
                error:  function(textStatus){
                    alert (textStatus);
                }
            });
        }
    });
});