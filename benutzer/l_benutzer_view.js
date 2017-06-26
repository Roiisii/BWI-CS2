$(document).ready(function () {
    createUserTable();
});

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
                userTable += "<tr><td>"+data.DBValues[i][0]+"</td><td>"+data.DBValues[i][1]+"</td><td>"+data.DBValues[i][2]+"</td><td>"+data.DBValues[i][3]+"</td>"
                userTable += '<td><button type="button" class="btn btn-link btn-xs" onClick="EditRow(this)" data-toggle="modal" data-target="#benutzer_bearbeiten" value="'+ data.DBValues[i][0] +'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td></tr>';
            }
            $("#UserTable").html(userTable);
        },
        error: function (data) {
            alert("Ein schwerwiegender Fehler ist aufgetreten! - createUserTable()");
        }
    });
};

function EditRow(obj){
    
};