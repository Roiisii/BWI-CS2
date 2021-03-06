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
    console.log(_loginData);

    $.ajax({
        type: "POST",
        url: "../login/s_login.php",
        dataType: "json",
        data: _loginData,
        cache: false,
        success: function (data) {
            if (data.meldung == "nOK") {
                $('#login_error').html('Benutzername nicht gefunden oder Passwort falsch...<br>').fadeIn();
            }
            if (data.meldung == "OK") {
                location.href = "../hauptmenue/hauptmenue.php";
            }

        },
        error: function (data) {
            alert("Ein schwerwiegender Fehler ist aufgetreten!");
        }
    });
}