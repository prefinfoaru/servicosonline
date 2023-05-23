<script src="./assets/js/sweetalert.js" type="text/javascript"></script>
<link href="./assets/css/sweetalert.css" rel="stylesheet">
<style>
.cursor {
    cursor: pointer;
}
</style>

<?php 
        $usu = $_SESSION['id'];
       
        $URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $numprot = explode('res=', $URL_ATUAL, 2);
        $del = explode('del=', $URL_ATUAL, 2);
        if(isset($numprot[1])){
        
        $res    =   $numprot[1];
        
        }else{
        
            $res = "";
        
        }
        if(isset($del[1])){
        
            $del    =   $del[1];
            
            }else{
            
                $del = "";
            
            }

        if ($res == 1  ){ ?>

<script>
swal.fire({
    title: 'Dados atualizados com Sucesso!',
    icon: "success",
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=config_usu">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }  
        
        if ($res  == 2 ){?>

<script>
swal.fire({
    icon: 'error',
    title: 'Não foi possivel atualizar os dados!',
    text: 'Por favor, tente novamente.',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=config_usu">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }  if ($res  == 3 ){?>


<script>
swal.fire({
    icon: 'error',
    title: 'Formato de arquivo não aceito!',
    text: 'Por favor, tente novamente.',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=config_usu">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>



<?php } if ($del == 1  ){ ?>

<script>
swal.fire({
    icon: 'error',
    title: 'Não foi possível deletar a conta!',
    text: 'Por favor, tente novamente.',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=config_usu">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }   ?>

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
                            <h4 class="card-title">Acesso as Configurações </h4>
                            <p class="card-category">Àrea para acesso as configurações da sua conta

                            </p>
                        </div>

                        <div class="card-body all-icons">
                            <div class="row">
                                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                    <a href="?p=dadosaltersenhausunorm">
                                        <div class="font-icon-detail">
                                            <i class="nc-icon nc-lock-circle-open"></i>
                                            <p>Alterar Senha</p>

                                        </div>
                                </div>
                                </a>

                                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                    <a href="?p=dadoscadusuario">
                                        <div class="font-icon-detail">
                                            <i class="nc-icon nc-settings-tool-66"></i>

                                            <p>Altera Dados Cadastrais</p>

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
    <?php include "./includes/modals/modal_excluirconta.php" ?>