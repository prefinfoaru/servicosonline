  <?php 
  include "./data/banco.php";
  $pdo = Banco::conectar();
  
  ?>
  
  <style>
    .cursor{
        cursor: pointer;
    }
  </style>
  <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="100">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">Menu Administração</a>
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
                                    <h4 class="card-title">Relatórios</h4>
                                    <p class="card-category">Àrea para gerar relatórios de cadastros entre outros dados.
                                        
                                    </p>
                                </div>
                                
                                <div class="card-body all-icons">
                                    <div class="row">
                                         
                                        <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                        <a data-toggle="modal" data-target="#ModalCadEmpresa"> 
                                            <div class="font-icon-detail cursor">
                                               
                                            <i class="nc-icon nc-paper-2 " style="color: blue;"></i>
                                                <p>Relatório de Empresas Cadastradas</p>
                                           
                                            </div>
                                        </a>
                                        </div>
                                        
                                        <!-- <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                        <a data-toggle="modal" data-target="#ModalCadUsuario">          
                                            <div class="font-icon-detail cursor" style="color: blue;">
                                            <i class="nc-icon nc-paper-2"></i>
                                                <p>Relatório de Usuários Cadastrados</p>
                                                
                                            </div>
                                        </a>    
                                        </div> -->

                                        <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                        <a data-toggle="modal" data-target="#ModalCadUsuarioArea">          
                                            <div class="font-icon-detail cursor" style="color: blue;">
                                            <i class="nc-icon nc-paper-2"></i>
                                                <p>Relatório de Usuários por Área de Atuação</p>
                                                
                                            </div>
                                        </a>    
                                        </div>

                                        <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                        <a data-toggle="modal" data-target="#ModalCandidatos">            
                                            <div class="font-icon-detail cursor" style="color: blue;">
                                            <i class="nc-icon nc-paper-2"></i>
                                                <p>Relatório de Candidatos</p>
                                                
                                            </div>
                                        </a>    
                                        </div>

                                        <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                        <a data-toggle="modal" data-target="#ModalSalaEntrevista">           
                                            <div class="font-icon-detail cursor" style="color: blue;">
                                            <i class="nc-icon nc-paper-2"></i>
                                                <p>Relatório de Solicitações de Sala</p>
                                        
                                            </div>
                                        </a>    
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php include "./include/modal_relatorioEmpresa.php" ?>
<?php include "./include/modal_relatorioUsuario.php" ?>
<?php include "./include/modal_relatorioUsuarioArea.php" ?>
<?php include "./include/modal_relatoriosalaentrevista.php" ?>
<?php include "./include/modal_relatorioCandidatos.php" ?>