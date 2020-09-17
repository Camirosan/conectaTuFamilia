$(function(){
    $(document).ready(function(){
        $.ajax({
            type: "POST",
            url: "ajax/tabla.php",
            data: {data:localStorage.getItem("id_name")},
            success: function (dataHTML) {
                $('#tabla').html(dataHTML);
                
            }
        });
    });

    
});