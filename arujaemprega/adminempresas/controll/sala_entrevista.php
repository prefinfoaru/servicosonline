

<?php

include "./data/conexao.php";
include "./data/banco.php";
$idempresa = $_SESSION['iduser'];

include "./data/query/querys_salaEntrevista.php";

?>


<div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="100">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">Solicitações de Reservas</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
                                    <h4 class="card-title">Status das Solicitações</h4>
                                   
                                        
                                    
                                </div>
                                <div class="card-body all-icons">
                                    <div class="row">
										
										
										<div class="font-icon-list col-lg-4 col-md-4 col-sm-4 col-6">
                                            <a href="?p=listareserva_aprovado&id=<?php echo $idempresa; ?>" >   
                                            <div class="font-icon-detail">
                                            <i class="fa fa-check-square-o" style="color: #56BB6E"></i>
                                               <h5 style="color: #56BB6E">&nbsp;Aprovados <br><br>&nbsp; <?php echo $qnt_aprovados; ?> </h5>
                                            </a>
                                            </div>
                                        </div>
										
										<div class="font-icon-list col-lg-4 col-md-4 col-sm-4 col-6">
                                            <a href="?p=listareserva_aguardando&id=<?php echo $idempresa; ?>" >   
                                            <div class="font-icon-detail">
                                            <i class="fa fa-spinner"></i>
                                               <h5>&nbsp;&nbsp;&nbsp;&nbsp;Aguardando <br><br> &nbsp;&nbsp;<?php echo $qnt_aguardando; ?> </h5> 
                                            </a>
                                            </div>
                                        </div>
										
                                        <div class="font-icon-list col-lg-4 col-md-4 col-sm-4 col-6">
                                            <a href="?p=listareserva_negado&id=<?php echo $idempresa; ?>" >   
                                            <div class="font-icon-detail">
                                            <i class="fa fa-close" style="color: #E4525F"><br></i>
                                               <h5 style="color: #E4525F">&nbsp;&nbsp;Negados <br><br>&nbsp;&nbsp;<?php echo $qnt_negado; ?> </h5>
                                            </a>
                                            </div>
                                        </div>
										
										
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

       