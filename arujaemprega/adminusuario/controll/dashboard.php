<?php
 include "./includes/topo_dashboard.php"; 
 include "./data/conexao.php";


$usu = $_SESSION['id'];

include "./data/query/querys_dashboard.php";
?>



<div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="100">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">Dashboard</a>
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
                                    <h4 class="card-title">Status de Vagas</h4>
                                   
                                        
                                    
                                </div>
                                <div class="card-body all-icons">
                                    <div class="row">
										
                                        <div class="font-icon-list col-lg-4 col-md-4 col-sm-4 col-6">
                                            
                                            <div class="font-icon-detail">
                                            <i class="fa fa-spinner" style="color: #5499C7 "></i>
                                               <h5 style="color: #5499C7 ">&nbsp;&nbsp;&nbsp;&nbsp;Em Andamento<br><br> &nbsp;&nbsp;<?php echo $qnt_aguardando; ?> </h5> 
                                          
                                            </div>
                                        </div>
										<div class="font-icon-list col-lg-4 col-md-4 col-sm-4 col-6">
                                           
                                            <div class="font-icon-detail">
                                            <i class="fa fa-check-square-o" style="color: #56BB6E"></i>
                                               <h5 style="color: #56BB6E">&nbsp;Vagas Aprovadas <br><br>&nbsp; <?php echo $qnt_aprovados; ?> </h5>
                                            
                                            </div>
                                        </div>
										
										
										
                                        <div class="font-icon-list col-lg-4 col-md-4 col-sm-4 col-6">
                                           
                                            <div class="font-icon-detail">
                                            <i class="fa fa-close" style="color: #E4525F"><br></i>
                                               <h5 style="color: #E4525F">&nbsp;&nbsp;Vagas Reprovadas <br><br>&nbsp;&nbsp;<?php echo $qnt_negado; ?> </h5>
                                      
                                            </div>
                                        </div>
										
										
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

       