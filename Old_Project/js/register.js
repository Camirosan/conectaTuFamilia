$(function(){
    var registro = {
        pswdCrtr: 0,
        pswdmin: 0,
        pswdmay: 0,
        pswdnum: 0,
        mail: 0,
        name: 0,
        lstName: 0,
        lstName2: 0
    };
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    $(document).ready(function() {
        //Validación de contraseña
        $('input[type=password]').keyup(function() {
            var userPassword = $(this).val();
            //Validación de cantidad de caracteres
            if ( userPassword.length < 8 ) {
                $('#length').removeClass('valid').addClass('invalid');
                registro.pswdCrtr = 0;
            } else {
                $('#length').removeClass('invalid').addClass('valid');
                registro.pswdCrtr = 1;
            }
            //Validación de miúscula
            if ( userPassword.match(/[a-z]/) ) {
                $('#letter').removeClass('invalid').addClass('valid');
                registro.pswdmin = 1;
            } else {
                $('#letter').removeClass('valid').addClass('invalid');
                registro.pswdmin = 0;
            }
            //Validación de mayúscula
            if ( userPassword.match(/[A-Z]/) ) {
                $('#capital').removeClass('invalid').addClass('valid');
                registro.pswdmay = 1;
            } else {
                $('#capital').removeClass('valid').addClass('invalid');
                registro.pswdmay = 0;
            }
            //Validación de número
            if ( userPassword.match(/\d/) ) {
                $('#number').removeClass('invalid').addClass('valid');
                registro.pswdnum = 1;
            } else {
                $('#number').removeClass('valid').addClass('invalid');
                registro.pswdnum = 0;
            }
        }).focus(function() {
            $('#pswd_info').show();
        }).blur(function() {
            $('#pswd_info').hide();
        });
        //Validación de email
        $('input[type=email]').keyup(function() {

            if (regex.test($('#inputEmail').val().trim())) {
               // alert('Correo validado');
                registro.pswdmail = 1;
                // const userEmail = $('#inputEmail').val();
                $('#email_info').hide();
            } else {
                registro.pswdmail = 0;
                $('#email_info').show();
            }
        }).focus(function() {
            $('#email_info').show();
        }).blur(function() {
            $('#email_info').hide();
        });
        //Validación de nombre
        $('input[type=text]').keyup(function() {
            $('#familyName').val($('#inputLastName').val() + " " + $('#inputLastName2').val());
            if ('#inputNames'.length > 3){
                registro.name = 1;
            }
            if ('#inputLastName'.length > 3){
                registro.lstName = 1;
            }
            if ('#inputLastName2'.length > 3){
                registro.lstName2 = 1;
            }
        });
        $( "#inputNames" ).focus(function(){
            const family = $('#familyName').val().trim();
            console.log('Family Name : ', family);
            const dataToSend = {
                familia:family,
            }
            const jsonToSend = JSON.stringify(dataToSend);
            $.ajax({
                    type: "POST",
                    url: 'ajax/get_matches.php',
                    data: { data: jsonToSend },
                    success: function( dataJSON ) {
                        console-console.log(dataJSON);
                        console.log(dataJSON.length);
                        if (dataJSON.length <= 100) {
                            data = JSON.parse(dataJSON);
                            console-console.log(data);
                            console.log(data.length);
                            $("#multiple").find('option').remove();
                            data.forEach( function(e) {
                                $("#multiple").append("<option>" + e + "</option>");
                            });
                            $("#multiple").prop( 'size', data.length );
                            $("#multiple").show();
                        }
                    },
                    error: function (textStatus) {
                        alert(textStatus);
                    }
                });
            $( "#multiple" ).click( function() {
                $('#inputNames').val( $(this).val() );
                registro.name = 1;
                $('#multiple').hide();
            });
        });
        
        
    });
    $('#submitBtn').on('click',
    function(){
        const userEmail = $('#inputEmail').val();
        const userName = $('#inputNames').val();
        const userLastName = $('#inputLastName').val();
        const userLastName2 = $('#inputLastName2').val();
        const userAge = $('#inputAge').val();
        const userPassword = $('#inputPassword').val();
        const user = 1;
        const family = $('#familyName').val();
        console.log(userPassword);
        var enabBtn = 0;
        $.each( registro, function( key, value ) {
            enabBtn = enabBtn + value;
            
        });
        console.log('valor de chequeo', enabBtn)
        if (enabBtn == 8) {
            const dataToSend = {
                userName: userEmail,
                password: userPassword,
                nombres:userName,
                apelido1:userLastName,
                apelido2:userLastName2,
                edad:userAge,
                usuario:user,
                familia:family,
            }
    
            const jsonToSend = JSON.stringify(dataToSend);
            console.log('JSON : ', jsonToSend)
            $.ajax({
                type: "POST",
                url: "ajax/add_persona.php",
                data: { data: jsonToSend },
                success: function (dataJSON) {
                    console.log(dataJSON);
                    $.ajax({
                        type: "POST",
                        url: "ajax/tabla.php",
                        data: {data:localStorage.getItem("id_name")},
                        success: function (dataHTML) {
                            $('#tabla').html(dataHTML);
                            
                        }
                    });
                },
                error: function (textStatus) {
                    alert(textStatus);
                }
            });
        }   else {
            alert('Revisar la informacion suministrada')
        }
    })
});