<script src="./assets/js/sweetalert.js" type="text/javascript"></script>
<link href="./assets/css/sweetalert.css" rel="stylesheet">
<?php

$usu = $_SESSION['iduser'];



$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $del = explode('del=', $URL_ATUAL, 2);
        if(isset($del[1])){
        
            $del    =   $del[1];
            
            }else{
            
                $del = "";
            
            }



         if ($del == 1  ){ ?>

<script>
swal.fire({
    icon: 'error',
    title: 'Não foi possível deletar a conta!',

    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=configuracoes">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }   ?>
?>
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Menu Configurações</a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>

        </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Acesso para Alteração de senha e dados cadastrados</h4>
                            <p class="card-category">Área de acesso à empresa

                            </p>
                        </div>

                        <div class="card-body all-icons">
                            <div class="row">
                                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                    <a href="?p=altersenha">
                                        <div class="font-icon-detail">
                                            <i class="nc-icon nc-lock-circle-open"></i>
                                            <p>Alterar Senha</p>

                                        </div>
                                </div>
                                </a>
                                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                    <a href="?p=alterdados">
                                        <div class="font-icon-detail">
                                            <i class="nc-icon nc-single-02"></i>
                                            <p>Alterar dados </p>

                                        </div>

                                </div>
                                </a>
                                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                    <a data-toggle="modal" data-target="#ModalExcluirConta">
                                        <div class="font-icon-detail">
                                            <i class="fa fa-times" style="color:red"></i>

                                            <p>Excluir Perfil</p>

                                        </div>
                                </div>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./includes/modal_excluirconta.php" ?>