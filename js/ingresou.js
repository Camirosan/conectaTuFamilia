$(function(){
    var registro = {
        name: 0,
        lstName: 0,
        lstName2: 0
    };
    $(document).ready(function() {
        //Validación de nombre
        $('input[type=textu]').keyup(function() {
            $('#familyNameu').val($('#inputLastNameu').val() + " " + $('#inputLastName2u').val());
            if ('#inputNamesu'.length > 3){
                registro.name = 1;
            }
            if ('#inputLastNameu'.length > 3){
                registro.lstName = 1;
            }
            if ('#inputLastName2u'.length > 3){
                registro.lstName2 = 1;
            }
        });
        $( "#inputNamesu" ).focus(function() {
            //Buscar datos en base de datos
            const family = $('#familyNameu').val().trim();
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
                            $("#multipleu").find('option').remove();
                            data.forEach( function(e) {
                                $("#multipleu").append("<option>" + e + "</option>");
                            });
                            $("#multipleu").prop( 'size', data.length );
                            $("#multipleu").show();
                        }
                    },
                    error: function (textStatus) {
                        alert(textStatus);
                    }
                });
            $( "#multipleu" ).click( function() {
                $('#inputNamesu').val( $(this).val() );
                registro.name = 1;
                $('#multipleu').hide();
            });
        });
    });
    $('#submitBtnu').on('click',
    function(){
        const userName = $('#inputNamesu').val();
        const userLastName = $('#inputLastNameu').val();
        const userLastName2 = $('#inputLastName2u').val();
        const userId = $('#idpersona').val();
        const userAge = $('#inputAgeu').val();
        const family = $('#familyNameu').val();
        var enabBtn = 3;
        if (enabBtn == 3) {
            const dataToSend = {
                id:userId,
                nombres:userName,
                apelido1:userLastName,
                apelido2:userLastName2,
                edad:userAge,
                familia:family
            }
            const jsonToSend = JSON.stringify(dataToSend);
            $.ajax({
                type: "POST",
                url: "ajax/update_persona.php",
                data: { data: jsonToSend },
                success: function (dataJSON) {
                    // console.log(dataJSON);
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