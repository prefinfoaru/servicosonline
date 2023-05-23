<?php
        $URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $numprot = explode('res=', $URL_ATUAL, 2);
        if(isset($numprot[1])){
        
        $res    =   $numprot[1];
        
        }else{
        
            $res = "";
        
        }
             
?>



<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="./include/valida_cpf_cnpj.js" type="text/javascript"></script>
<script src="./include/corrige_cpf_cnpj.js" type="text/javascript"></script>

<script src="./assets/js/sweetalert.js" type="text/javascript"></script>
<link href="./assets/css/sweetalert.css" rel="stylesheet">

<?php
        if ($res == 1  ){ ?>

<script>
swal.fire({
    title: 'Cadastrado com Sucesso!!',
    icon: "success",
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=criarusupre">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }  
        
        if ($res  == 2 ){?>

<script>
swal.fire({
    icon: 'error',
    title: 'Não foi possivel cadastrar!',
    text: 'Por favor, tente novamente.',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=criarusupre">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  } ?>










<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Menu Administração</a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>

        </div>
    </nav>

    <!-- Navbar -->



    <script>
    function mascara(o, f) {
        v_obj = o
        v_fun = f
        setTimeout("execmascara()", 1)
    }

    function execmascara() {
        v_obj.value = v_fun(v_obj.value)
    }

    function mtel(v) {
        v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
        v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }

    function id(el) {
        return document.getElementById(el);
    }
    window.onload = function() {
        id('telefone').onkeyup = function() {
            mascara(this, mtel);
        }
    }
    </script>

    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Cadastrar usuário </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="#">
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>CPF</label>
                                            <input type="text" name='cpf' id="cpf" size="11" maxlength="11"
                                                class="form-control mb-2 mr-sm-2" placeholder="Apenas números." required
                                                onblur="verifica_cpf_cnpj('cpf', document.getElementById('cpf').value);">

                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input type="text" class="form-control" placeholder="Digite o usuario"
                                                name="usuario" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Telefone/Celular</label>
                                            <input name="tele" placeholder="Digite um número de telefone."
                                                class="form-control" id="telefone" maxlength="15" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Função</label>
                                            <input type="text" class="form-control" placeholder="Digite a função"
                                                name="funcao" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Nível de Acesso</label>
                                            <div class="form-group" name="nivel" required="">

                                                <select class="form-control" name="nivel">
                                                    <option>Escolha o nivel de acesso</option>
                                                    <option value="1">Administrador</option>
                                                    <option value="2">Atendente</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control" placeholder="Digite o e-mail"
                                                name="email">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Senha</label>
                                            <input type="password" id="password" class="form-control"
                                                placeholder="Digite a senha" name="senha" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Confirmar senha</label>
                                            <input type="password" id="confirm_password" class="form-control"
                                                placeholder="Confirme a senha" required>
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" name="button"
                                    class="btn btn-info btn-fill pull-right">Cadastrar</button>
                                <div class="clearfix"></div>



                                <?php include "./include/valida-senha.php "; ?>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php   include('data/insert/cadusuariopma.php');?>