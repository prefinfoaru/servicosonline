<?php   session_start(); ?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
       
        <link rel="stylesheet" href="css/login.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>  
      
    </head>
  

    <script>

setTimeout(function() {
   $('#timemsg').fadeOut('slow');
}, 3000);

</script>




<body>
    <div id="login">
        
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="valida/login.php" method="post">
                            <div id="timemsg">
                            <?php
                                if (isset($_SESSION['msg'])) {
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                                ?>
                            </div>
                            <h3 class="text-center text-info">Acessar</h3>
                          
                            <div class="form-group">
                                <label for="username" class="text-info">Usuário:</label><br>
                                <input type="text" required name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="password" required name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                            <div  class="g-recaptcha"  name="g-recaptcha-response" data-sitekey="6LeQASYaAAAAAEbWxAehNYw_KPvE4d-XY1rGsWSx" required></div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Acessar">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>