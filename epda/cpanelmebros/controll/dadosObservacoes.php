<?php
// pega os proximos Valores dos GET
$URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('protocolo=', $URL_ATUAL, 2);
$ProtocoloRequerimento = $numprot[1];
include "conexao.php";
$pdo  = Banco::conectar();
$sqlConsulta = "SELECT A.tp_observacoes, A.descricao, A.tp_envio, A.protocolo, A.statusobs, A.data_obs, B.protocolo, B.tb_resposta, A.anexo, A.resp   FROM bd_epda.tb_observacoes  as A INNER JOIN
bd_epda.tb_respostas as B ON A.protocolo = B.protocolo where A.protocolo =  '$ProtocoloRequerimento';" ; 


?>

<i class="fas fa-chalkboard-teacher"></i><i class="fas fa-chalkboard-teacher"></i> <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
               <!--   	<div class="row mtbox">
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<span class="li_vallet"></span>
					  			<h3>933</h3>
                  			</div>
					  			<p>933 Solicitações Feitas</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_cloud"></span>
					  			<h3>+48</h3>
                  			</div>
					  			<p>48 Anal.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                            
                  			<div class="box1">
					  			<span class="li_stack"></span>
					  			<h3>23</h3>
                  			</div>
					  			<p>You have 23 unread messages in your inbox.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_news"></span>
					  			<h3>+10</h3>
                  			</div>
					  			<p>More than 10 news were added in your reader.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_data"></span>
					  			<h3>OK!</h3>
                  			</div>
					  			<p>Your server is working perfectly. Relax & enjoy.</p>
                  		</div>
                  	
                  	</div> /row mt -->	
                  <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4>-<i class="fa fa-angle-right"></i> Observações do Requerimento Nº: <b style="color: #BD595A"><?php echo $ProtocoloRequerimento ?></b> enviada pelo presidente do EPDA</h4>
	                  	  	  <hr>
                              <thead>
                              <tr><h4 style="color: #BD595A">Lista de Observações</h4>
                                  <th><i class=""></i>data Obs:</th>
                                  <th><i class=""></i>Tipo de Obs:</th>
                                  <th ><i class=""></i>Pergunta</th>
                                  <th ><i class=""></i>Resposta</th>
                                  <th><i class=""></i>Tipo de Envio</th>
                                  <th><i class=""></i>Status</th>
                                 
                                 
                               
                              </thead>
                              <tbody>
                                  <tr>
                                      <?php
                           foreach ($pdo->query($sqlConsulta) as $row_obs) {
                               
                               $data_dep_ano		= substr($row_obs['data_obs'] , -10,4)  ;
		                       $data_dep_mes1	    =   substr($row_obs['data_obs'] , 5,2)  ;
		                       $data_dep_dia		= substr($row_obs['data_obs'] , 8,2);
                               $datamod =  $data_dep_dia."/".$data_dep_mes1."/".$data_dep_ano ;
                           
                               
                              echo '<td>'									.$datamod					 . '</td>';      
                              echo '<td>'									.$row_obs['tp_observacoes'] 					 . '</td>';      
                              echo '<td>'									.$row_obs['descricao'] 					 . '</td>';      
                              echo '<td>'									.$row_obs['tb_resposta'] 					 . '</td>';      
                              echo '<td>'									.$row_obs['tp_envio'] 					 . '</td>';      
                          
                               
                               
                               
                               //condição que muda a cor da palavra no status e e mostra o botões de ações anexo e Resposta
                               
                               if ($row_obs['anexo'] == 0 and $row_obs['resp'] == 0 ) {
                               echo '<td style="color: green">'									.'Aguardando' 					 . '</td>';   
                               
                               
                               }
                               
                            //condição que muda a cor da palavra no status e e mostra somente botões de ações anexo 
                                  if ($row_obs['anexo'] == 0 and $row_obs['resp'] == 1 ) {
                               echo '<td style="color: green">'									.'Aguardando' 					 . '</td>';   
                               
                               
                               }
                               
                               //condição que muda a cor da palavra no status e e mostra somente botões de ações resposta 
                                  if ($row_obs['anexo'] == 1 and $row_obs['resp'] == 0 ) {
                               echo '<td style="color: green">'									.'Aguardando' 					 . '</td>';   
                              
                               }
                               
                                if ($row_obs['anexo'] == 1 and $row_obs['resp'] == 1 ) {
                                  echo '<td style="color: red">'									.'Fechado'					 . '</td>';
                                  echo '<td style="color: red">'									."Todos os dados solicitados por essas Observação ja foram enviados"					 . '</td>';
                             
                                }
                                                
                             echo '<tr>'; 
                           }  
                                  
                           ?>
                            </tr>
                                  
                              </tbody>
                          </table>
                           <div class="form-group" align="center">
     
    <?php include "./consulta/uploadrespdadospend.php" ?><br><br><br>
          <a href="<?php $end = 'http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/cpanelmebros/index.php?p=dadosRequerimento&?protocolo='.$ProtocoloRequerimento; echo $end; ?>" onclick="javascript:window.open('', '_self', '').close()"><button class="btn btn-warning" type="button">Voltar</button></a>
    </div>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
                      
                      
                      
                      
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                 
                  <?php 
                          
                 include "include/MenuLateralDireita2.php";
                  include "include/footer.php";
                            
                  
                  ?>