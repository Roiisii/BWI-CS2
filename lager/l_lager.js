$(document).ready(function () {
    getArticles();
});

var regalCounter = 1;

var _choosedRegal = {
    regalNr: 1
};

var _clickedFach = {
    fach: -1,
    id: -1
};

$('#regalChangeRight').click(function () {
    if (regalCounter < 9) {
        regalCounter++;
    } else {
        regalCounter = 1;
    }
    $('#reagalCounter').html("0" + regalCounter + "/09");
    _choosedRegal.regalNr = regalCounter;
    resetArticles();
    getArticles();
});

$('#regalChangeLeft').click(function () {
    if (regalCounter > 1) {
        regalCounter--;
    } else {
        regalCounter = 9;
    }
    $('#reagalCounter').html("0" + regalCounter + "/09");
    _choosedRegal.regalNr = regalCounter;
    resetArticles();
    getArticles();
});

$('.lager_fach_button').click(function () {    
    console.log("new Item for " + regalCounter + (this).id);
    _clickedFach.fach = regalCounter + (this).id;
    
    
    $(this).has("h3").each(function () {
        var _deletePlatz = {platz: regalCounter + (this).id};
        $.ajax({
            type: "POST",
            url: "../lager/s_deleteLager.php",
            dataType: "json",
            data: _deletePlatz,
            cache: false,
            success: function (data) {
                //getArticles();
                location.reload();
            },
            error: function (data) {
                alert("Ein schwerwiegender Fehler ist aufgetreten! - lager_fach_button.click()");
            }
        });
    });
    
    loadUnplacedArticles();
    
});

function getArticles() {
    console.log(_choosedRegal);
    $.ajax({
        type: "POST",
        url: "../lager/s_getLager.php",
        dataType: "json",
        data: _choosedRegal,
        cache: false,
        success: function (data) {
            loadArticles(data.DBValues);
        },
        error: function (data) {
            alert("Ein schwerwiegender Fehler ist aufgetreten! Bitte Seite aktualisieren - getArticles()");
        }
    });
}

function loadArticles(articles) {
    
    for (var i = 0; i < articles.length; i++) {
        //alert(articles[i]);
        //console.log($('#' + articles[i][1].substr(1, 2)));
        $('#' + articles[i][1].substr(1, 2)).removeAttr("data-toggle").removeAttr("data-target").html(displayedArticle(articles[i][0]));
    }
}
;

function displayedArticle(titel) {
    var articleHTML = "<h3>" + titel + "";
    articleHTML += '<br><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></h3>';
    return articleHTML;
}

function resetArticles() {
    $('.lager_container').find(':button').each(function () {
        $(this).attr("data-toggle", "modal").attr("data-target", "#Artikel").html('<span class="glyphicon glyphicon-plus lager_glyph" aria-hidden="true"></span>');
    })
}

function loadUnplacedArticles() {
    $.ajax({
        type: "POST",
        url: "../lager/s_getUnplacedArticles.php",
        dataType: "json",
        //data: _deletePlatz,
        cache: false,
        success: function (data) {
            console.log(data);
            var eintraege = "";
            for (var i = 0; i < data.DBValues.length; i++) {
                eintraege += '<h4><input type="radio" name="artikel" value="'+ data.DBValues[i][1]+'"> '+data.DBValues[i][0]+'<h4>';
            }
            $('#placeArticles').html(eintraege);
        },
        error: function (data) {
            alert("Ein schwerwiegender Fehler ist aufgetreten! - loadUnplacedArticles()");
        }
    });
}

$('#btn_save').click(function(){
    
    _clickedFach.id = $('input[name=artikel]:checked', '#placeArticles').val();        
    
    $.ajax({
            type: "POST",
            url: "../lager/s_storeLager.php",
            dataType: "json",
            data: _clickedFach,
            cache: false,
            success: function (data) {
                getArticles();
                $('#Artikel').modal('toggle');
            },
            error: function (data) {
                alert("Ein schwerwiegender Fehler ist aufgetreten! - btn_save.click()");
            }
        });
});