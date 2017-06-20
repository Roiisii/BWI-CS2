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
        <div class="container col-md-2">    
            <div class="row">
                <nav class="nav-sidebar">
                    <ul class="nav">
                        <li class="nav-divider"></li>
                        <li><a href="javascript:;"><i class="glyphicon glyphicon-heart"></i> Artikel</a></li>
                        <li><a href="javascript:;"><i class="glyphicon glyphicon-inbox"></i> Lagerorte</a></li>
                        <li><a href="javascript:;"><i class="glyphicon glyphicon-file"></i> Bestellscheine</a></li>
                        <li><a href="javascript:;"><i class="glyphicon glyphicon-user"></i> Benutzerverwaltung</i></a></li>
                    </ul> 
                </nav>
            </div>
        </div>
        <?php
        // put your code here
        ?>
        <?php include('../libraries/jslibrary.php'); ?>      
        <script src="../login/l_logOut.js"></script>
    </body>
</html>
