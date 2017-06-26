$(document).ready(function () {
    createUserTable();
});

//0 = Neu
//1 = Edit
var userMode = 0;
var pwHashed = "";

var userData = {
    id: "",
    bname: "",
    vname: "",
    nname: "",
    email: "",
    pw: "",
    pwHash: "",
    mode: -1
}

function createUserTable() {
    var userTable = "<tr><th>ID</th><th>Vorname</th><th>Nachname</th><th>Username</th><th></th></tr>";
    $.ajax({
        type: "POST",
        url: "../benutzer/s_getBenutzerView.php",
        dataType: "json",
        cache: false,
        success: function (data) {
            console.log(data);
            for (var i = 0; i < data.DBValues.length; i++) {
                userTable += "<tr><td>" + data.DBValues[i][0] + "</td><td>" + data.DBValues[i][1] + "</td><td>" + data.DBValues[i][2] + "</td><td>" + data.DBValues[i][3] + "</td>"
                userTable += '<td><button type="button" class="btn btn-link btn-xs" onClick="EditRow(this)" data-toggle="modal" data-target="#benutzer_bearbeiten" value="' + data.DBValues[i][0] + '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td></tr>';
            }
            $("#UserTable").html(userTable);
        },
        error: function (data) {
            alert("Ein schwerwiegender Fehler ist aufgetreten! - createUserTable()");
        }
    });
}
;

function EditRow(obj) {
    userMode = 1;

    editUser = {
        id: obj.value
    };

    $.ajax({
        type: "POST",
        url: "../benutzer/s_getSpecificBenutzer.php",
        data: editUser,
        dataType: "json",
        cache: false,
        success: function (data) {
            console.log(data);
            pwHased = data.DBValues[0][4];
            $('#bname').val(data.DBValues[0][3]);
            $('#vorname').val(data.DBValues[0][1]);
            $('#nachname').val(data.DBValues[0][2]);
            $('#email').val(data.DBValues[0][0]);

        },
        error: function (data) {
            alert("Ein schwerwiegender Fehler ist aufgetreten! - EditRow()");
        }
    });
}
;

$('#btn_save').click(function () {
    var errMsg = validUserData();

    if (errMsg != "") {
        $('#UserEdit_error').html(errMsg).fadeIn();
    } else {
        userData.id = editUser.id;
        userData.bname = $('#bname').val();
        userData.vname = $('#vorname').val();
        userData.nname = $('#nachname').val();
        userData.email = $('#email').val();
        userData.pw = $('#passwort').val();
        userData.pwHash = pwHased;
        userData.mode = userMode;

        console.log(userData);

        $.ajax({
            type: "POST",
            url: "../benutzer/s_saveBenutzer.php",
            data: userData,
            dataType: "json",
            cache: false,
            success: function (data) {
                console.log(data);
                if (data.meldung != "ok") {
                    $('#UserEdit_error').html(data.meldung + "<br>").fadeIn();
                } else {
                    $('#benutzer_bearbeiten').modal('toggle');
                    $('#UserEdit_error').toggle();
                    clearAllTextboxes();
                    createUserTable();
                }
            },
            error: function (data) {
                alert("Ein schwerwiegender Fehler ist aufgetreten! - btn_save.click()");
            }
        });

    }
});

$('#userAdd').click(function(){
    userMode = 0;
    clearAllTextboxes();
})

function validUserData() {
    var returnMessage = "";

    if ($('#bname').val() == "") {
        returnMessage += "&mdash; Benutzername darf nicht leer sein!<br>";
    }
    if ($('#vorname').val() == "") {
        returnMessage += "&mdash; Vorname darf nicht leer sein!<br>";
    }
    if ($('#nachname').val() == "") {
        returnMessage += "&mdash; Nachname darf nicht leer sein!<br>";
    }
    if ($('#email').val() == "") {
        returnMessage += "&mdash; E-Mail darf nicht leer sein!<br>";
    }
    if ($('#passwort').val() == "") {
        returnMessage += "&mdash; Bitte für Änderungen Passwort eingeben!<br>";
    }
    if ($('#passwort').val() != $('#passwortwh').val()) {
        returnMessage += "&mdash; Passwörter stimmen nicht überein!<br>";
    }

    return returnMessage;
}
;

function clearAllTextboxes(){
    $('#benutzer_bearbeiten input:text').val("");
}