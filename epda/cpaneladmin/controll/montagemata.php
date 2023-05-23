<script src='https://cdn.tiny.cloud/1/c261mpaa4s4sg8q69had3dltgd2lu4k0bhnoi6oxgglt2kxd/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script>
  <script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>
<?php
session_start();

 $usuario_login = $_SESSION['nome'];
 $nivel = $_SESSION['nivel'];
 $idJurado = $_SESSION['Njurado'];
 
   //$sql2 = 'SELECT count(*) FROM atualizaiptu.cadastro where email_retorno is null ';
    if ($usuario_login == "") {
	   
	header("Location:http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/");	
		
	   
   } 
// pega os proximos Valores dos GET
$URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('protocolo=', $URL_ATUAL, 2);
$ProtocoloRequerimento = $numprot[1];
$data = $data = date("Y-m-d");
$data_dep_ano		= substr($data , -10,4)  ;
$data_dep_mes1	= substr($data , 5,2)  ;
$data_dep_dia		= substr($data , 8,2);
$datamont =  $data_dep_dia."/".$data_dep_mes1."/".$data_dep_ano ;

include "banco.php";
include "conexao.php";
$pdo  = Banco::conectar();
$sqlConsultaRequerimento = "SELECT A.nome, A.Njurado, B.membro, B.data, b.Observacao, B.protocolo
FROM bd_epda.tb_cadastro_de_usuarios AS A
INNER JOIN bd_epda.tb_obsmesa AS B ON A.Njurado = B.membro where B.protocolo = '$ProtocoloRequerimento'" ;


?>

<i class="fas fa-chalkboard-teacher"></i><i class="fas fa-chalkboard-teacher"></i> <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
                  
          
    
   	<!-- INLINE FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12" >
          			<div class="form-panel">
                  	 <h4>Montagem de Atá Referente ao Requerimento: <b style="color: indianred"><?php echo 'epda'. $ProtocoloRequerimento; ?></b></h4><hr>
                    
                      <form class="form-inline" role="form" action="./consulta/motaAtaSQL.php" method="post">
                          <div class="form-group"  >
                              <label>ATA nº: </label>
                              <input type="text" class="form-control"   placeholder="<?php echo $ProtocoloRequerimento ?>" disabled>
                          </div>
                          <div class="form-group">
                              <label>Data: </label>
                              <input type="text" class="form-control"  placeholder="<?php echo $datamont ?>"  disabled>
                          </div>
                          <div class="form-group">
                              <label>Portaria : </label>
                              <input type="text" class="form-control"   placeholder="<?php echo "36.347/2017" ?>" disabled>
                          </div>
                          <div class="form-group">
                              <label>Interessado : </label>
                              <input type="text" class="form-control"  placeholder="<?php echo "PMA" ?>"  disabled>
                          </div>
                           <div class="form-group">
                              <label>Apresentador : </label>
                              <input type="text" class="form-control"  placeholder="<?php echo "Juvenal F. Penteado" ?>"  disabled>
                          </div>
                         
                             <div class="row mt">
                            <div class="col-md-12">
                     
                          <table class="table table-advance table-hover">
	                  	  	
	                  	  	  <hr>
                              <thead>
                              <tr><h4 style="color: #BD595A">Lista de Questionamentos da Mesa</h4>
                                  <th><i class="fa fa-user"></i> Nome do Mebro</th>
                                  <th><i class="fa fa-user"></i> Data</th>
                                  <th class="col-md-9" ><i class="fa fa-eye"></i> Questionamento</th>
                                  
                                 
                               
                              </thead>
                              <tbody>
                                  <tr><?php
                           foreach ($pdo->query($sqlConsultaRequerimento) as $row) {
                               
                               $data_dep_ano		= substr($row['data'] , -10,4)  ;
		                       $data_dep_mes1	= substr($row['data'] , 5,2)  ;
		                       $data_dep_dia		= substr($row['data'] , 8,2);
                               
                               $datamod =  $data_dep_dia."/".$data_dep_mes1."/".$data_dep_ano ;
                            
                               
                              echo '<td>'									. $row['nome'] 					 . '</td>';      
                              echo '<td>'									. $datamod 					 . '</td>';      
                              echo '<td>'									. utf8_decode($row['Observacao']) 					 . '</td>';      
                                  echo '<tr style="text-align:justify">'; 
                              
                           }  
                           ?>
                          
                              </tr>
                                  
                              </tbody>
                          </table>
                          
                          
                   
           
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

          			</div><!-- /form-panel -->
    
                        
          		</div><!-- /col-lg-12 -->
                    
  
          			<div class="form-panel">
                  <h4 style="color: #BD595A">Parecer Final para Montagem da ATA </h4>
                      <h7>Preencha os campos abaixo.</h7><br><br><br>
                     
                          <div class="form-group">
                              <label>Tipo de Processo: </label>
                              <input type="text" class="form-control" name="tp_proc" required   >
                          </div>
                          <div class="form-group">
                              <label>Assunto: </label>
                              <input type="text" class="form-control" name="assunto" required  >
                          </div>
                          <div class="form-group">
                              <label>Parecer: </label>
                             <textarea class="form-control" rows="18" id="mytextarea" name="descricao"  ></textarea>
                         
                           
                          <br>
                             <div class="form-group" align="center">
                          
                             <input type="hidden" name="ata" value="<?php echo $ProtocoloRequerimento ?>">        
                             <input type="hidden" name="portaria" value="<?php echo "36.347/2017" ?>">      
                             <input type="hidden" name="interessado" value="Prefeitura Municipal de Arujá">      
                             <input type="hidden" name="apresentador" value="Juvenal F. Penteado">      
                             <input type="hidden" name="user" value="<?php echo $usuario_login ?>">      
                             <input type="hidden" name="idjurado" value="<?php echo $idJurado ?>">      
                                  
                                
                          
                          <button type="Submit"  name="Cadastrar" class="btn btn-success" >Gerar Ata</button>
                                 
                          <a href="http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/cpaneladmin/index.php?p=home" onclick="javascript:window.open('', '_self', '').close()"><button class="btn btn-warning" type="button">Voltar</button></a>
                    
          			</div></div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          	</div><!-- /row -->		
    </div>
   

   
     <div class="form-group" align="center">
          
    
         
        
    
        </div>
        
        </button>
                          
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
                </form> 
                      
                      <?php 
              
              
              
                        
               //   include "include/MenuLateralDireita.php";
                  include "include/footer.php";
                            
                  
              
              
                              
                  ?>  
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                 
                