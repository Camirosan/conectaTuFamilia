$(function(){
    function callback($getdata) {
        // console.log('======');
        // console.log($getdata);
        console.log('======'); 
        $getdata = $getdata.slice(1, -1);
        $getdata = $getdata.replace(/"/g,'');
        $arraydata = $getdata.split(',');
        console.log($arraydata);
        setList($arraydata);
    };

    function setList($list) {
        // console.log("en setList ", $list[0])
        switch($list[0]){
            case "0":
                $("#selectFamily").find('option').remove();
                $(".option").each(function(){
                    $(this).remove();
                });
                for (let index = 1; index < $list.length; index++) {
                    // console.log($list[index]); 
                    $("#selectFamily").append('<option class="option">' + $list[index] + "</option>");                  
                }
                $("#selectFamily").show();
                break;
            case "1":
                $("#selectName").find('option').remove();
                $(".option").each(function(){
                    $(this).remove();
                });
                for (let index = 1; index < $list.length; index++) {
                    // console.log($list[index]); 
                    $("#selectName").append('<option class="option">' + $list[index] + "</option>");                  
                }
                $("#selectName").show();
                break;
        };
    };

    function selectCase($case, callback, $searchBy) {
        const dataToSend = {
            case:$case,
            searchBy:$searchBy,
        };
        const jsonToSend = JSON.stringify(dataToSend);
        $consulta = $.ajax({
            type: "POST",
            url: "php/scripts/registro.php",
            data: {data:jsonToSend},
            success: function (getdata){
                callback(getdata);
            },
            error:  function(textStatus){
                callback(textStatus);
            }
        });
    };
    
    $('#familia').focus(function(){
        $("#selectName").hide();
        $result = selectCase(0, callback, 0);
        // console.log('resultado : ' + $result);        
    });
    $('#nombres').focus(function(){
        console.log('En nombres');
        $("#selectFamily").hide();
        if ($("#familia").val().trim().length > 0) {
            $familia = $("#familia").val();
            $result = selectCase(1, callback, $familia);
        };     
    });
    $("#selectFamily").click(function(){
        $("#familia").val($(this).val());
        $("#selectFamily").hide();
    });
    $("#selectName").click(function(){
        $("#nombres").val($(this).val());
        $("#selectName").hide();
    });

});