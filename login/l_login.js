/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('#login').click(function () {
    login();
});

$('#login_password, #login_username').keypress(function (e) {

    if (e.which == 13) //Return Taste für Loginfunktion
    {
        login();
    }
});

function login() {
    var _id = -1;
    var _userName = $('#login_username').val();
    var _pass = $('#login_password').val();

    var _loginData = {
        id: _id,
        userName: _userName,
        password: _pass
    }

    $.ajax({
        type: "POST",
        url: "./login/s_login.php",
        dataType: "json",
        data: _loginData,
        cache: false,
        success: function (data) {
            if (data.meldung == "nOK") {
                $('#login_error').html('Benutzername nicht gefunden oder Passwort falsch...<br>').fadeIn();
            }
            if (data.meldung == "OK") {
                location.href = "./hauptmenue.php";
            }

        },
        error: function (data) {
            alert("Ein schwerwiegender Fehler ist aufgetreten!");
        }
    });
}