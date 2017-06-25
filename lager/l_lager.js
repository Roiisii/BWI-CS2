$(document).ready(function () {
  getArticles();
});

var regalCounter = 1;

var _choosedRegal = {
    regalNr : 1
};


$('#regalChangeRight').click(function(){
   if(regalCounter < 9){
       regalCounter++;       
   } 
   else{
       regalCounter = 1;
   }
   $('#reagalCounter').html("0"+regalCounter+"/09");
   _choosedRegal.regalNr = regalCounter;
   resetArticles();
   getArticles();
});

$('#regalChangeLeft').click(function(){
   if(regalCounter > 1){
       regalCounter--;       
   } 
   else{
       regalCounter = 9;
   }
   $('#reagalCounter').html("0"+regalCounter+"/09");
   _choosedRegal.regalNr = regalCounter;
   resetArticles();
   getArticles();
});

$('.lager_fach_button').click(function(){
   console.log((this).id); 
   alert("new Item for "+regalCounter+(this).id);
});

function getArticles(){    
    console.log(_choosedRegal);
    $.ajax({
        type: "POST",
        url: "../lager/s_getLager.php",
        dataType: "json",
        data: _choosedRegal,
        cache: false,
        success: function (data) {            
            console.log(data);
            loadArticles(data.DBValues);
        },
        error: function (data) {
            alert("Ein schwerwiegender Fehler ist aufgetreten!");
        }
    });
}

function loadArticles(articles){
    
    for (var i = 0; i < articles.length; i++) {
        //alert(articles[i]);
        console.log($('#'+articles[i][1].substr(1,2)));
        $('#'+articles[i][1].substr(1,2)).html(displayedArticle(articles[i][0]));
    }
};

function displayedArticle(titel){
    var articleHTML = "<h3>"+titel+"";
    articleHTML += '<br><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></h3>';
    return articleHTML;
}

function resetArticles(){
    $('.lager_container').find(':button').each(function(){
        $(this).html('<span class="glyphicon glyphicon-plus lager_glyph" aria-hidden="true"></span>');
    })
}