$(function(){
    function calltabla ($familia){
        const dataToSend = {
            familia:$familia
        };
        const jsonToSend = JSON.stringify(dataToSend);
        $.ajax({
            type: "POST",
            url: "php/familia/tabla.php",
            data: {data:jsonToSend},
            success: function (dataHTML) {
                $('#tabla').html(dataHTML);
            }
        });
    };
    $(document).ready(function(){
        $userName = $("#userName").val();
        console.log("Nombre de usuario\n");
        console.log($userName)
        const dataToSend = {
            user:$userName
        };
        const jsonToSend = JSON.stringify(dataToSend);
        $.ajax({
            type: "POST",
            url: "php/scripts/familia/familia.php",
            data: {data:jsonToSend},
            success: function (getdata){
                console.log(getdata);
                getdata = getdata.slice(1, -1);
                // getdata = getdata.replace(/"/g,'');
                arraydata = getdata.split('][');
                familias = arraydata[0];
                familias = familias.replace(/"/g,'');
                familias = familias.split(',');
                miembros = arraydata[1];
                miembros = miembros.replace(/"/g,'');
                miembros = miembros.split(',');
                console.log(familias);
                console.log(miembros);
                for (let index = 0; index < arraydata.length; index++) {
                    if(index == 0){
                        $("#miembros").val(miembros[index]);
                    }
                    $("#selectFamilia").append('<option class="option">' + familias[index] + "</option>");                 
                }
                calltabla(familias[0]);
            },
            error:  function(textStatus){
                console.log(textStatus);
            }
        });
    });
    $("#selectFamilia").on("change", function(){
        console.log('pasando a familia');
        console.log($(this).val());
        $familia = $(this).val()
        const dataToSend = {
            familia:$familia
        };
        const jsonToSend = JSON.stringify(dataToSend);
        $.ajax({
            type: "POST",
            url: "php/scripts/familia/miembros.php",
            data: {data:jsonToSend},
            success: function (getdata){
                console.log(getdata);
                miembros = getdata.replace(/"/g,'');
                $("#miembros").val(miembros);
            },
            error:  function(textStatus){
                console.log(textStatus);
            }
        });
        calltabla($familia);
        // $("#nombres").val($(this).val()[0]);
    })
});