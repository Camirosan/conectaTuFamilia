$(function(){
    var registro = {
        name: 0,
        lstName: 0,
        lstName2: 0
    };
    $(document).ready(function() {
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
        $( "#inputNames" ).focus(function() {
            //Buscar datos en base de datos
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
        const userName = $('#inputNames').val();
        const userLastName = $('#inputLastName').val();
        const userLastName2 = $('#inputLastName2').val();
        const userAge = $('#inputAge').val();
        const user = 0;
        const family = $('#familyName').val();
        var enabBtn = 0;
        $.each( registro, function( key, value ) {
            enabBtn = enabBtn + value;
        });
        console.log('valor de chequeo', enabBtn)
        if (enabBtn == 3) {
            const dataToSend = {
                nombres:userName,
                apelido1:userLastName,
                apelido2:userLastName2,
                edad:userAge,
                usuario:user,
                familia:family
            }
            const jsonToSend = JSON.stringify(dataToSend);
            console.log('JSON : ', jsonToSend)
            $.ajax({
                type: "POST",
                url: "ajax/add_persona.php",
                data: { data: jsonToSend },
                success: function (dataJSON) {
                    if (dataJSON == 1) {
                        alert ('Datos actualizados con exito');
                        $.ajax({
                            type: "POST",
                            url: "ajax/tabla.php",
                            data: {data:localStorage.getItem("id_name")},
                            success: function (dataHTML) {
                                $('#tabla').html(dataHTML);
                                
                            }
                        });
                    }else{
                        alert ('Upss!... Algo falló');
                    }
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