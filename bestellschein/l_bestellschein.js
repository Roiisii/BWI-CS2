$(document).ready(function() {
    console.log( "ready!" );
});


//Wenn mit ID gearbeitet wird dann das:
/*$('#details').click(function () {
    alert("Click!");
});*/

//Hier mit onClick:
function detail(){
    //alert("test");
    $('#exampleText2').val('Dieser Wert wurde mit JS hinzugefügt, nach einem Klick!');
}