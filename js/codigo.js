$(function(){
    $('#submitBtn').on('click', function (){
        const userName = $('#inputEmail').val();
        const userPswd = $('#inputPassword').val();
        const remember = $('#remember').val();
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
            },
            error: function (textStatus) {
                alert(textStatus);
            }
        });


    });

});
