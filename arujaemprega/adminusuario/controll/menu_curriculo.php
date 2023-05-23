
<?php include "./includes/topo_dashboard.php"; ?>
<div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg" color-on-scroll="100">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">Menu de Curriculo</a>
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
                                    <h4 class="card-title">Acesso ao Currículo Cadastrado </h4>
                                    <p class="card-category">Àrea para acesso ao currículo cadastrado no Arujá Emprega
                                        
                                    </p>
                                </div>
                                
                                <div class="card-body all-icons">
                                    <div class="row">
                                          <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                                <a href="?p=editar_cv&idcpfcon=<?php echo $_SESSION['id'] ?>">   
                                            <div class="font-icon-detail">
                                                <i class="nc-icon nc-settings-tool-66"></i>
                                                <p>Editar Currículo</p>
                                               
                                            </div>
                                        </div>
                                        </a>
                                        <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                          <a href="?p=visualizar_cv">   
                                              <div class="font-icon-detail">
                                                <i class="nc-icon nc-zoom-split"></i>
                                         
                                                <p>Visualizar Currículo</p>
                                              
                                            </div>
                                        </div>
                                        </a>  
                                        <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                          <a href="?p=baixar_pdf&id=<?php echo $_SESSION['usuario'] ?>" target="_blank">   
                                              <div class="font-icon-detail">
                                                <i class="nc-icon nc-cloud-download-93"></i>
                                         
                                                <p>Baixar Currículo Em PDF</p>
                                                
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