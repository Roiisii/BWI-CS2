<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>        
        <?php include('../libraries/csslibrary.php'); ?>        
        <?php include('../login/s_isLoggedIn.php'); ?>
    </head>
    <body>
        <h1>Wir sind angemeldet!</h1>
        <button type="button" class="btn btn-danger btn-sm pull-right" id="logout" data-hover="tooltip" title="Logout" data-placement="bottom">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
        <?php
        // put your code here
        ?>
        <?php include('../libraries/jslibrary.php'); ?>      
        <script src="../login/l_logOut.js"></script>
    </body>
</html>
