<?php
// pega os proximos Valores dos GET
$URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('protocolo=', $URL_ATUAL, 2);
$ProtocoloRequerimento = $numprot[1];
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
                  
          
                  <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4>-<i class="fa fa-angle-right"></i> Dados do Requerimento Nº: <b style="color: #BD595A"><?php echo $ProtocoloRequerimento ?></b></h4>
	                  	  	  <hr>
                              <thead>
                              <tr><h4 style="color: #BD595A">Lista de Questionamentos da Mesa</h4>
                                  <th><i class="fa fa-user"></i> Nome do Mebro</th>
                                  <th><i class="fa fa-user"></i> Data</th>
                                  <th class="col-md-9" ><i class="fa fa-eye"></i> Questionamento</th>
                                  <th class="col-md-9" ><i class="fa fa-eye"></i> Ação</th>
                                  
                                 
                               
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
                              echo '<td>'									. 
                                      
                                  //    '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                  '
                                  <a href =?p=dadosrespobs&?protocolo='.$row["protocolo"].' ><button class="btn btn-danger btn-xs"  title="Negar Questionamento"><i class="fa fa-times"></i></button></a>
                                  <a href =?p=montagemata&?protocolo='.$row["protocolo"].' ><button class="btn btn-success btn-xs"  title="Questionamento Aceito"><i class="fa fa-check"></i></button></a>'
                                  . '</td>';
                               
                               
                               
                               
                                  echo '<tr style="text-align:justify">'; 
                              
                             
                           }  
                           ?>
                          
                              </tr>
                                  
                              </tbody>
                          </table>
                          
                          
                   
                          <div class="form-group" align="center">
        
        
        
        
    <a href="<?php $end = 'http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/cpaneladmin/index.php?p=home'; echo $end; ?>" onclick="javascript:window.open('', '_self', '').close()"><button class="btn btn-warning" type="button">Voltar</button></a>
        </div>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
                      
                      
                     
                      
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                 
                  <?php 
                         
                // include "include/MenuLateralDireita2.php";
                //  include "include/footer.php";
                            
                  
                  ?>
                  
                  