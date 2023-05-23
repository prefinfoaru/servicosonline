<?php   

session_start(); 
?>
<link href="../assets2/css/login.css" rel="stylesheet">

<style>
#eye {
    cursor: pointer;
    left: 380px;
    top: 115px;
    font-size: 17px;
    position: absolute;
    color: #3498db;

}
</style>
<script>
setTimeout(function() {
    $('#timemsg').fadeOut('slow');
}, 3000);
</script>



<br><br>
<div class="wrapper fadeInDown zero-raduis">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <!-- <img src="https://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
            <h2 class="my-5">Acesso Restrito</h2>
        </div>
        <div id="timemsg">
            <?php // mensagem de erro que pega por sessão no processsamento pelo c_dados.
            if(isset($_SESSION['msg']))
            {
            echo     $_SESSION['msg']   ;
            unset   ($_SESSION['msg'])  ;
            }
          ?>
        </div>
        <!-- Login Form -->
        <form method="POST" action="../data/valida/validalogin.php">
            <input type="text" id="email" class="fadeIn second zero-raduis" name="usuario"
                placeholder="Digite o nome de usúario." required>
            <input type="password" autocomplete="off" id="password" class=" fadeIn second zero-raduis" name="senha"
                placeholder="Digite a senha." required><i onclick="mostrarSenha()" class='fa fa-eye' id="eye"></i><br>
            <br>
            <br>
            <div align="center" class="g-recaptcha my-5" name="g-recaptcha-response"
                data-sitekey="6LeQASYaAAAAAEbWxAehNYw_KPvE4d-XY1rGsWSx"></div><br>

            <br>


            <input type="submit" class="fadeIn fourth zero-raduis">

        </form>


    </div>
</div>
<br><br>
<script>
function mostrarSenha() {
    var tipo = document.getElementById("password");
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}
</script>