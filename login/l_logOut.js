$('#logout').click(function () {
    $.ajax({
        type: "POST",
        url: "./login/s_logOut.php",
        cache: false,
        success: function (data) {
            location.href = "./index.php";
        },
        error: function (data) {
            alert("Ein schwerwiegender Fehler ist aufgetreten!");
        }
    });

});