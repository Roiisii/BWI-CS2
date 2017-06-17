$(document).ready(function () {
  //sizeContent();
  //$(window).resize(sizeContent);
});


function sizeContent() {
  var newHeight = $("html").height() + "px";
  $(".wrapper").css("min-height", newHeight); 
}