<?php   session_start(); ?>
<link href="../assets/css/login.css" rel="stylesheet">
<script src="../includes/corrige_cpf_cnpj.js" type="text/javascript"></script>
<script src="../includes/valida_cpf_cnpj.js" type="text/javascript"></script>
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
            <h2 class="my-5">Login Empresas</h2>
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
            <input type="text" name='cnpj' id="cnpj" size="14" maxlength="14" class="fadeIn second zero-raduis"
                placeholder="Digite o CNPJ/CPF da empresa." required
                onblur="verifica_cpf_cnpj('cnpj', document.getElementById('cnpj').value)">
            <input type="password" id="password" autocomplete="off" class=" fadeIn second zero-raduis" name="senha"
                placeholder="Digite a senha." required><i onclick="mostrarSenha()" class='fa fa-eye' id="eye"></i><br>
            <br>
            <br>
            <div align="center" class="g-recaptcha my-5" name="g-recaptcha-response"
                data-sitekey="6LeQASYaAAAAAEbWxAehNYw_KPvE4d-XY1rGsWSx"></div><br>
            <br>
            <input type="submit" class="fadeIn fourth zero-raduis" value="acessar">

            <div id="formFooter">
                <a class="underlineHover" href="../pages/cadastroempresa.php">Cadastre-se.</a><br>
                <a class="underlineHover" href="../pages/redefinirsenha.php">Esqueceu a senha?</a>
            </div><br>

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