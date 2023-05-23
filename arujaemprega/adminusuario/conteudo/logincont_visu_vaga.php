<?php  

	$id_vaga = $_GET['vaga'];
	session_start(); 

?>
<link href="../assets/css/login.css" rel="stylesheet">
<script src="../includes/corrige_cpf_cnpj.js" type="text/javascript"></script>
<script src="../includes/valida_cpf_cnpj.js" type="text/javascript"></script>

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
            <h2 class="my-5">Acesso Usuário cadastrado</h2><br>
            <h7 class="my-5"><i style="color: #E87072">para vizualização da vaga e necessario estar logado</i></h7>
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
        <form method="POST" action="../data/valida/validalogin_visu_vaga.php">
            <input type="text" name='cpf' id="cpf" size="11" maxlength="11" class="fadeIn second zero-raduis"
                placeholder="Digite o seu cpf." required
                onblur="verifica_cpf_cnpj('cpf', document.getElementById('cpf').value);">

            <input type="password" id="password" class=" fadeIn second zero-raduis" name="senha"
                placeholder="Digite a senha." required><br>
            <br>
            <br>
            <div align="center" class="g-recaptcha my-5" name="g-recaptcha-response"
                data-sitekey="6LeQASYaAAAAAEbWxAehNYw_KPvE4d-XY1rGsWSx"></div><br>

            <br>


            <input type="hidden" name="id_vaga" value="<?php echo $id_vaga; ?>" />
            <input type="submit" class="fadeIn fourth zero-raduis">

            <div id="formFooter">
                <a class="underlineHover" href="../pages/redefinirsenha.php">Esqueceu a senha ?</a>
            </div><br>
        </form>


    </div>
</div>
<br><br>