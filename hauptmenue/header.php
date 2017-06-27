<html>
    <head>
        <meta charset="UTF-8">
        <title></title>   
        <?php include('../libraries/csslibrary.php'); ?>        
        <?php include('../login/s_isLoggedIn.php'); ?>
        <script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
    </head>
    <body>
        <div class="container-fluid">  
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-6"><h1>Boosted Logistics OS</h1></div>
                <div class="col-md-2"><button type="button" id="btn_logout" class="btn btn-primary btn-sm">Logout</button></div>
                <script>
                    $('#btn_logout').click(function(){
                       location.href = "../login/s_logOut.php";
                    });
                </script>
                
            </div>   
       </div> 

