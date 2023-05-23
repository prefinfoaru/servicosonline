<?php   session_start(); ?>
<link href="../assets/css/login.css" rel="stylesheet">
<script src="../includes/corrige_cpf_cnpj.js" type="text/javascript"></script>
<script src="../includes/valida_cpf_cnpj.js" type="text/javascript"></script>

<script>
setTimeout(function() {
    $('#timemsg').fadeOut('slow');
}, 3000);
</script>


<br><br>
<br><br>
<div class="wrapper fadeInDown zero-raduis">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <!-- <img src="https://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
            <h2 class="my-5">Redefinição de Senha</h2>
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
        <form method="POST" action="../data/valida/redefinicaosenha.php">
            <input type="text" name='cpf' id="cpf" size="14" maxlength="14" class="fadeIn second zero-raduis"
                placeholder="Digite o seu cpf/cnpj." required
                onblur="validarDados('cpf', document.getElementById('cpf').value);">
            <input type="email" class=" fadeIn second zero-raduis" name="email" placeholder="Digite o email."
                required><br>
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
<br><br>