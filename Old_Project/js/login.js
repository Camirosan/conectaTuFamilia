$(function(){
    localStorage.removeItem("id_name");
    var acceso = 0;

    $('#submitBtn').on('click', function (){
        const userName = $('#inputEmail').val();
        const userPswd = $('#inputPassword').val();
        const dataToSend = {
            userName: userName,
            password: userPswd,
        }

        const jsonToSend = JSON.stringify(dataToSend);

        $.ajax({
            type: "POST",
            url: "ajax/read_persona.php",
            data: { data: jsonToSend },
            success: function (dataJSON) {
                console.log(dataJSON);
                if (dataJSON == 0) {
                    localStorage.setItem("id_name",userName);
                    window.location.assign('familia.php');
                    $('#inputEmail').submit('familia.php');
                }else{
                    alert ('Usuario y/o contraseña incorrectos');
                }
            },
            error: function (textStatus) {
                alert(textStatus);
            }
            
        });
    });    

});
