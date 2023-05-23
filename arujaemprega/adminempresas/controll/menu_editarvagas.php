<?php

include "./data/conexao.php";
$idempresa = $_SESSION['iduser'];

$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $numid = explode('id=', $URL_ATUAL, 2);
    $id = $numid[1];

echo $idempresa;


?>






<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Editar Vaga: <?php echo   $id;?></a>
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
                        <?php     
                                $Atualiza = "SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga where id_vaga = '$id' and id_empresa = '$idempresa';";
                                $resultado_atualiza = mysqli_query($conn,$Atualiza);
                                $numero = mysqli_num_rows($resultado_atualiza);

                                if($numero == '1'){ ?>


                        <div class="card-header">
                            <h4 class="card-title">Alterar Informações da Vaga</h4>
                            <p class="card-category">Área de acesso à empresa

                                </h5>
                        </div>

                        <div class="card-body all-icons">
                            <div class="row">


                                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                    <a href="?p=dadosEditarVaga&?id=<?php echo $id;?>">
                                        <div class="font-icon-detail">
                                            <i class="fa fa-bars"></i>
                                            <h5>Dados Gerais da Vaga</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                <a href="?p=editarAdicionaisVaga&?id=<?php echo $id;?>">
                                    <div class="font-icon-detail">
                                        <i class="fa fa-plus"></i>
                                        <h5>Alterar Adicionais da Vaga</h5>
                                </a>
                            </div>
                        </div>
                        <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                            <a href="?p=editarBeneficiosVaga&?id=<?php echo $id;?>">
                                <div class="font-icon-detail">
                                    <i class="fa fa-user-plus"></i>
                                    <h5>Alterar Benefícios da Vaga </h5>
                            </a>
                        </div>
                    </div>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                        <a href="?p=editarIdiomasVaga&?id=<?php echo $id;?>">
                            <div class="font-icon-detail">
                                <i class="fa fa-comment"></i>
                                <h5>Alterar Idiomas da Vaga</h5>
                        </a>
                    </div>
                </div>
                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                    <a href="?p=editarInformaticaVaga&?id=<?php echo $id;?>">
                        <div class="font-icon-detail">
                            <i class="fa fa-laptop"></i>
                            <h5>Alterar Dados de Informática da Vaga</h5>
                    </a>
                </div>
            </div>
            <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                <a href="?p=visualizar_vaga&id=<?php echo $id;?>">
                    <div class="font-icon-detail">
                        <i class="fa fa-eye"></i>
                        <h5>Visualizar Vaga</h5>
                </a>
            </div>
        </div>




    </div>
</div>
<?php }else{?>

<script>
alert('Acesso não autorizado');
window.location.href =
    "https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=listarvagas";
</script>

<?php } ?>
</div>
</div>
</div>
</div>
</div>