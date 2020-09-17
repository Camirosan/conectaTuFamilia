$(function(){
$(document).ready(function(){
    const user = 'camilo@eduardo.com';
    console.log(user);
    const dataToSend = {
        usuario:user,
    }
    const jsonToSend = JSON.stringify(dataToSend);
    $.ajax({
        type: "POST",
        url: 'ajax/get_family.php',
        data: { data: jsonToSend },
        success: function( dataJSON ) {
            data = JSON.parse(dataJSON);
            console.log(data);
            data.forEach(function(element){
                console.log(element['nombres']);
                $('#nombre').val(element['nombres']);
                $('#apellido1').val(element['apellido_1']);
                $('#apellido2').val(element['apellido_2']);
                $('#edad').val(element['edad']);
                var n = $('tr:last td', $("#lista_familar")).length;
                var tds = '';
                for(var i = 0; i < n; i++){
                tds += 'nuevo';
                }
                tds += '';
                $("#lista_familar").append(tds);
            });
        },
        error: function (textStatus) {
            alert(textStatus);
        }
    });
    var tbody = $('#lista_familar tbody'); 
    var fila_contenido = tbody.find('tr').first().html();
    $('#lista_productos .button_agregar_producto').click(function(){ 
        var fila_nueva = $('<tr></tr>');
        fila_nueva.append(fila_contenido); 
        tbody.append(fila_nueva); 
    }); 
    $('#lista_productos').on('click', '.button_eliminar_producto', function(){
        $(this).parents('tr').eq(0).remove();
    });

});

});