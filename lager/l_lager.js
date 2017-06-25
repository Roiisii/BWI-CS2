$(document).ready(function () {
  //sizeContent();
  //$(window).resize(sizeContent);
});

var regalCounter = 1;


$('#regalChangeRight').click(function(){
   if(regalCounter < 9){
       regalCounter++;       
   } 
   else{
       regalCounter = 1;
   }
   $('#reagalCounter').html("0"+regalCounter+"/09");
});

$('#regalChangeLeft').click(function(){
   if(regalCounter > 1){
       regalCounter--;       
   } 
   else{
       regalCounter = 9;
   }
   $('#reagalCounter').html("0"+regalCounter+"/09");
});

$('.lager_fach_button').click(function(){
   console.log((this).id); 
   alert("new Item for "+regalCounter+(this).id);
});