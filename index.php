<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>        
        <?php include('./libraries/csslibrary.php'); ?>        
    </head>
    <body>
        <div class="container">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h1>Wilkommen!</h1>
                <h3>Bitte anmelden:</h3>
                <div>
                    <input type="text" class="form-control" id="login_username" placeholder="Benutzername">
                    <input type="password" class="form-control" id="login_password" placeholder="Passwort">
                    <button type="button" class="btn btn-primary Width100 MarTop10" id="login">
                        <span class="glyphicon glyphicon-arrow-right"></span>
                    </button>
                    <div class="alert alert-danger MarTop10" role="alert" style="display: none;" id="login_error"></div>
                </div>
            </div>                
            <div class="col-md-1"></div>
        </div>

        <?php
        // put your code here
        ?>        
        <?php include('./libraries/jslibrary.php'); ?>
        <script src="./login/l_login.js"></script>
    </body>
</html>

