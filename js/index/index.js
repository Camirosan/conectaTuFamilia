$(function(){
    // Botón de bienvenida, activa los formularios
    $('#wellcomeBtn').on('click', function(){
        window.location.assign('forms.php');
        $('#wellcomeBtn').submit('forms.php');
        // $('#contenedor_1').toggle();
        // $('#contenedor_2').toggle();
    });
    
});