<?php

//session_start();
//$_SESSION['login'] = 1;

include ("header.php");
include ("../config/db.php");
include ("../utility/DB.class.php");


$template = handleNavigation('section');

function handleNavigation($param) {
    if (isset($_GET[$param])) {
        switch ($_GET[$param]) {
            case 'auftrag':
                return "../auftrag/d_auftrag.php";
            case 'lager':
                return "../lager/d_lager.php";
            case 'order':
                return "../bestellschein/Bestellschein.php";
            case 'article':
                return "main.php";
            case 'user':
                return "../benutzer/d_benutzer_view.php";
            default: return "main.php";
        }
    }
}

?>
<div class="container-fluid">
<div class="row">
        <div class="col-md-2">
            <?php include ("navigation.php"); ?>    
        </div> 
        <div class="col-md-10">
            <div class='row'>
                <?php include ($template); ?>
            </div>
        </div>
    </div>   
</div> 

<?php include ("footer.php") ;?>
