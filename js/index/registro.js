$(function(){

    var registro = {
        pswdCrtr: 0,
        pswdmin: 0,
        pswdmay: 0,
        pswdnum: 0,
        pswd2: 0,
        mail: 0,
        name: 0,
        user: 0,
        lstName: 0,
        lstName2: 0
    }; 

    function callback($getdata) {
        // console.log('======');
        // console.log($getdata);
        // console.log('======'); 
        $getdata = $getdata.slice(1, -1);
        $getdata = $getdata.replace(/"/g,'');
        $arraydata = $getdata.split(',');
        // console.log($arraydata);
        // alert('alerta', $arraydata)
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
    // Evento Focus
    $('#familia').focus(function(){
        $("#selectName").hide();
        $result = selectCase(0, callback, 0);
        // console.log('resultado : ' + $result);        
    });
    $('#nombres').focus(function(){
        // console.log('En nombres');
        $("#selectFamily").hide();
        if ($("#familia").val().trim().length > 0) {
            $familia = $("#familia").val();
            $result = selectCase(1, callback, $familia);
        };     
    });
    $("#apellido_1").focus(function(){
        $("#selectFamily").hide();
        $("#selectName").hide();
    });
    $("#apellido_2").focus(function(){
        $("#selectFamily").hide();
        $("#selectName").hide();
    });
    $("#userNameReg").focus(function(){
        $("#selectFamily").hide();
        $("#selectName").hide();
    });
    $("#correo").focus(function(){
        $("#selectFamily").hide();
        $("#selectName").hide();
    });
    $("#password_1").focus(function(){
        $("#selectFamily").hide();
        $("#selectName").hide();
        $("#pswd_info").show();
    });
    $("#password_2").focus(function(){
        $("#selectFamily").hide();
        $("#selectName").hide();
        console.log('en la validacion de pwd2')
        if($("#password_1").val() == $("#password_2").val()){
            $("#validpwd2").hide();
            registro.pswd2 = 1;
        } else {
            $("#validpwd2").show();
            registro.pswd2 = 0;
        };
    });
    // Evento blur
    // $("#familia").blur(function(){
    //     if($("#familia").val() != ""){
    //         $("#selectFamily").hide();
    //     }
    // });
    $("#password_1").blur(function(){
        $("#pswd_info").hide();
    });
    // Evento keyup
    $('#familia').keyup(function(){
        if ($("#familia").val().trim().length > 0) {
            registro.familia = 1;
        }else{
            registro.familia = 0;
        };
    });
    $('#nombres').keyup(function(){
        // console.log('En nombres');
        // $("#selectFamily").hide();
        if ($("#nombres").val().trim().length > 0) {
            registro.nombres = 1;
        }else{
            registro.combres = 0;
        };     
    });
    $('#apellido_1').keyup(function(){
        if ($("#apellido_1").val().trim().length > 0) {
            registro.lastName = 1;
        }else{
            registro.lastName = 0;
        };
    });
    $('#apellido_2').keyup(function(){
        if ($("#apellido_2").val().trim().length > 0) {
            registro.lastName2 = 1;
        }else{
            registro.lastName2 = 0;
        };
    });
    $("#correo").keyup(function(){
        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if(regex.test($("#correo").val().trim())){
            $("#validEmail").hide();
            registro.mail = 1;
        } else {
            $("#validEmail").show();
            registro.mail = 0;
        };
    });
    $('#userNameReg').keyup(function(){
        if ($("#userNameReg").val().trim().length > 0) {
            registro.user = 1;
        }else{
            registro.user = 0;
        };
    });
    // Validación de contraseña
    $("#password_1").keyup(function(){
        var userPassword = $(this).val();
        //Validación de cantidad de caracteres
        if ( userPassword.length < 8 ) {
            $('#length').removeClass('valid').addClass('invalid');
            registro.pswdCrtr = 0;
        } else {
            $('#length').removeClass('invalid').addClass('valid');
            registro.pswdCrtr = 1;
        };
        //Validación de miúscula
        if ( userPassword.match(/[a-z]/) ) {
            $('#letter').removeClass('invalid').addClass('valid');
            registro.pswdmin = 1;
        } else {
            $('#letter').removeClass('valid').addClass('invalid');
            registro.pswdmin = 0;
        };
        //Validación de mayúscula
        if ( userPassword.match(/[A-Z]/) ) {
            $('#capital').removeClass('invalid').addClass('valid');
            registro.pswdmay = 1;
        } else {
            $('#capital').removeClass('valid').addClass('invalid');
            registro.pswdmay = 0;
        };
        //Validación de número
        if ( userPassword.match(/\d/) ) {
            $('#number').removeClass('invalid').addClass('valid');
            registro.pswdnum = 1;
        } else {
            $('#number').removeClass('valid').addClass('invalid');
            registro.pswdnum = 0;
        };
    });
    $("#password_2").keyup(function(){
        console.log('en la validacion de pwd2')
        if($("#password_1").val() == $("#password_2").val()){
            $("#validpwd2").hide();
            registro.pswd2 = 1;
        } else {
            $("#validpwd2").show();
            registro.pswd2 = 0;
        };
    });
    // Evento click
    $("#selectFamily").click(function(){
        $familia = $(this).val()[0];
        // console.log('familia = ', $familia);
        $("#familia").val($familia);
        $("#selectFamily").hide();
        $apellidos = $familia.split(' ');
        console.log($apellidos);
        $("#apellido_1").val($apellidos[0]);
        $("#apellido_2").val($apellidos[1]);
        registro.familia = 1;
        registro.lastName = 1;
        registro.lastName2 = 1;
    });
    $("#selectName").click(function(){
        $("#nombres").val($(this).val()[0]);
        $("#selectName").hide();
        registro.nombres = 1;
    });
    
    
    
    
    
    // $(document).ready(function(){
    $("#registroBtn").on('click', function(){
        var enableBtn = 0;
        $.each(registro, function(key, value){
            enableBtn += value;
        });
        enableBtn = 10;
        if(enableBtn == 10){
            const dataToSend = {
                familia: $("#familia").val(),
                nombres: $("#nombres").val(),
                apellido1: $("#apellido_1").val(),
                apellido2: $("#apellido_2").val(),
                email: $("#correo").val(),
                usuario: $("#userNameReg").val(),
                password: $("#password_1").val()
            };
            const jsonToSend = JSON.stringify(dataToSend);
            $consulta = $.ajax({
                type: "POST",
                url: "php/scripts/regNewUser.php",
                data: {data:jsonToSend},
                success: function (getdata){
                    console.log(getdata);
                    // callback(getdata);
                    // alert('alerta good = ', getdata)
                },
                error:  function(textStatus){
                    console.log(getdata);
                    // alert('alerta bad = ', textStatus)
                    // callback(textStatus);
                }
            });
            // $result = selectCase(2, callback, searchBy);
            // alert('alerta = ', $result);
        };
        
    });
});