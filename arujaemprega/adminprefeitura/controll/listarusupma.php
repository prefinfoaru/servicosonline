                     
              <?php //include "../data/for/for_edit_cv.php" 
              
              //conexao com banco ********************************************************************************************************************************************************************************

include  "./data/banco.php";
$pdo = Banco::conectar();

//Querys**************************************************************************************************************************************************************************************

    
//***********************************************************************************************************************************************************************
//Tratam valor recebido **********************************************************************************************************************************************************************

//********************************************************************************************************************************************************************************************

              ?> 


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
                                    <h4 class="card-title">Listar Usuário</h4>
                                    <p class="card-category">Àrea para visualizar usuarios da prefeitura cadastrados
                                        
                                    </p>
                                </div>
                                
                              
                           

                              
                                <div class="card-body">
                                    <div class="card-body table-full-width table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <th>Usuario</th>
                                                <th>CPF</th>
                                                <th>Funcao</th>
                                                <th>Telefone</th>
                                                <th>E-mail</th>
                                                <th>Nível de Acesso</th>
                                            </thead>
                                        <?php
                                            $query_con_cpf = "SELECT * FROM bd_emprega_aruja.tb_cadastrousuario_restrito order by id_cadastrorestrito ASC; ";
                                                foreach($pdo->query($query_con_cpf )as $row)
                                                {
                                                echo    '<tbody>'; 
                                                echo    '<tr>';                           
                                                echo    '<td>'. $row['nome'].'</td>';
                                                echo    '<td>'. $row['cpf'].'</td>';
                                                echo    '<td>'. $row['funcao'].'</td>';
                                                echo    '<td>'. $row['tel'].'</td>';
                                                echo    '<td>'. $row['email'].'</td>';	
                                                echo    '<td>';
                                                 if($row['nivel'] == '1'){
                                                    echo    'Administrador';
                                                }elseif($row['nivel'] == '2'){
                                                    echo    'Atendente';
                                                }else{
                                                    echo    'TI';

                                                }
                                                 
                                                 
                                                echo   '</td>';	
                                                echo    '</tr>';   
                                                echo    '</tbody>';
                                            
                                                }
                                        ?>
                                        
                                            
                                            
                                                
                                        
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              
       
              
              
              