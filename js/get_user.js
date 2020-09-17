$(function(){
        var name = localStorage.getItem("id_name");
        console.log('id_name : ', name);
        $.ajax({
            type: "POST",
            url: "familia.php",
            data: {data:name},
            success: function (dataJSON) {
                console.log(dataJSON);
                console.log(dataJSON);
                if (dataJSON == 1) {
                    $('#tabla').load('familia.php');
                }else{
                }
            }
        });
    // });
});