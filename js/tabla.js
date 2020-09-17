function agregaform(datos){
    data = datos.split('||');
    $('#idpersona').val(data[0]);
    $('#familyNameu').val(data[2] + " " + data[3]);
    $('#inputLastNameu').val(data[2]);
    $('#inputLastName2u').val(data[3]);
    $('#inputNamesu').val(data[1]);
    $('#inputAgeu').val(data[4]);
}

function preguntarSiNo(id){
    persona_id = id;
    const dataToSend = {
        persona_id:id
    }
    const jsonToSend = JSON.stringify(dataToSend);
    $('#borrarbtn').click(function(){
        $.ajax({
            type: "POST",
            url: "ajax/borrarPersona.php",
            data: dataToSend,
            success: function (dataJSON) {
                if (dataJSON == 1) {
                    alert ('dato borrado');
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
            }
        });
    });
};

