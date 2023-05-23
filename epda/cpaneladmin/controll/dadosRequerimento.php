<?php
// pega os proximos Valores dos GET
$URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('protocolo=', $URL_ATUAL, 2);
$ProtocoloRequerimento = $numprot[1];
include "conexao.php";
$pdo  = Banco::conectar();
$sqlConsultaRequerimento = "SELECT * FROM bd_epda.tb_requerimento where protocolo = '$ProtocoloRequerimento';" ; 
$sqldeferido = "SELECT count(*) as ind FROM bd_epda.tb_respdefmebros where resp = '2' and protocolo='$ProtocoloRequerimento' ;" ;
$sqlIndeferido    = "SELECT count(*) as def FROM bd_epda.tb_respdefmebros where resp = '1' and protocolo='$ProtocoloRequerimento'"; 
$sqlresp = "SELECT * FROM bd_epda.tb_respostas where protocolo= '$ProtocoloRequerimento'";
$sqlConsultaRequerimentomembros = "SELECT * FROM bd_epda.tb_cadastro_de_usuarios where nivel = '2'" ; 
$sqlConsultaRequerimentomembros2 = "SELECT A.membro, B.Njurado, B.nome, A.data  FROM bd_epda.tb_respdefmebros as A
INNER JOIN bd_epda.tb_cadastro_de_usuarios as B ON A.membro = b.Njurado where protocolo ='$ProtocoloRequerimento'" ; 

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
	                  	  	  <h4>-<i class="fa fa-angle-right"></i> Dados do Requerimento Nº: <b style="color: #BD595A"><?php echo $ProtocoloRequerimento ?></b></h4>
	                  	  	  <hr>
                              <thead>
                              <tr><h4 style="color: #BD595A">Dados Pessoais</h4>
                                  <th><i class="fa fa-user"></i> Nome</th>
                                  <th class="hidden-phone"><i class=""></i>RG</th>
                                  <th><i class=""></i>CPF</th>
                                 
                               
                              </thead>
                              <tbody>
                                  <tr><?php
                            
                              foreach ($pdo->query($sqldeferido) as $row2) {
                                  
                                  
                                  $def = $row2['ind'];
                              }
                                  
                           foreach ($pdo->query($sqlIndeferido) as $row3) {
                                                                    
                                  $idef = $row3['def'];;                               
                              }
                           foreach ($pdo->query($sqlresp) as $row4) {
                                                                    
                                $row4['data'];
                               $data_dep_ano		= substr($row4['data'] , -10,4)  ;
		                       $data_dep_mes1	= substr($row4['data'] , 5,2)  ;
		                       $data_dep_dia		= substr($row4['data'] , 8,2);
                               $datamod4 =  $data_dep_dia."/".$data_dep_mes1."/".$data_dep_ano ;
                               
                                  $resp = $row4['tb_resposta'];
                              }
    
                           foreach ($pdo->query($sqlConsultaRequerimento) as $row) {
                               
                               $data_dep_ano		= substr($row['dt_cadastro'] , -10,4)  ;
		                       $data_dep_mes1	= substr($row['dt_cadastro'] , 5,2)  ;
		                       $data_dep_dia		= substr($row['dt_cadastro'] , 8,2);
                               $datamod =  $data_dep_dia."/".$data_dep_mes1."/".$data_dep_ano ;
                               $jurado_1 = $row['J_1'];
                               $jurado_2 = $row['J_2'];
                               $jurado_3 = $row['J_3'];
                               $jurado_4 = $row['J_4'];
                               $jurado_5 = $row['J_5'];
                               $jurado_6 = $row['J_6'];
                               $obsreque = $row['obsJug'];
                               $valorTotal = 6 ;
                               $valor1ps   = $jurado_1 + $jurado_2 + $jurado_3 + $jurado_4 + $jurado_5 + $jurado_6 ;  
                               $restante = $valorTotal - $valor1ps ;
                               
                              echo '<td>'									. $row['solicitante'] 					 . '</td>';      
                              echo '<td>'									. $row['rg'] 					 . '</td>';      
                              echo '<td>'									. $row['cpf'] 					 . '</td>';      
                                  
                           ?>
                          
                              </tr>
                                  
                              </tbody>
                          </table>
                          
                          
                           <table class="table table-striped table-advance table-hover">
	                  	  	
	                  	  	  <hr>
                              <thead>
                              <tr><h4 style="color: #BD595A">Endereço</h4>
                                  <th><i class=" fa fa-edit"></i>CEP</th>  
                                  <th><i class="fa fa-bullhorn"></i>Rua</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Número</th>
                                  <th><i class="fa fa-bookmark"></i>Complemento</th>
                                  <th><i class=" fa fa-edit"></i>Bairro</th>
                               
                               
                              </thead>
                              <tbody>
                                  <tr>
                           
                                  <?php
                              echo '<td>'									. $row['cep'] 					 . '</td>';      
                              echo '<td>'									. $row['rua'] 					 . '</td>';      
                              echo '<td>'									. $row['numero'] 					 . '</td>';   
                              echo '<td>'									. $row['complemento'] 					 . '</td>';   
                              echo '<td>'									. $row['bairro'] 					 . '</td>';   
                                      
                                      ?>
                                  
                                  
                                
                          
                              </tr>
                                  
                              </tbody>
                          </table>
                          
                           <table class="table table-striped table-advance table-hover">
	                  	  	
	                  	  	  <hr>
                              <thead>
                              <tr><h4 style="color: #BD595A">Contato:</h4>
                                  <th><i class=" fa fa-edit"></i>Tel Fixo</th>  
                                  <th><i class="fa fa-bullhorn"></i>Celular</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>E-mail</th>
                                 
                               
                                </tr>
                              </thead>
                              <tbody>
                                  <tr>
                           
                                  <?php
                              echo '<td>'									. $row['tel_fixo'] 					 . '</td>';      
                              echo '<td>'									. $row['tel_cel'] 					 . '</td>';      
                              echo '<td>'									. $row['email'] 					 . '</td>';   
                              
                                      
                                      ?>
                                  
                                  
                                
                          
                              </tr>
                                  
                              </tbody>
                          </table>
                          
                           <table class="table table-striped table-advance table-hover">
	                  	  	
	                  	  	  <hr>
                              <thead>
                              <tr><h4 style="color: #BD595A">Dados da Requisição:</h4>
                                  <th><i class=" fa fa-edit"></i>Data do Evio</th> 
                                  <th><i class=" fa fa-edit"></i>Assunto</th>  
                                  <th><i class="fa fa-bullhorn"></i>Descrição</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>para fins</th>
                                 
                                  </tr>
                               
                              </thead>
                               
                             
                               
                              <tbody>
                                  <tr>
                           
                                  <?php
                              echo '<td>'									. $datamod  					 . '</td>';      
                              echo '<td>'									. $row['assunto'] 					 . '</td>';      
                              echo '<td>'									. $row['descricacao'] 					 . '</td>';   
                              echo '<td>'									. $row['fins'] 					 . '</td>';  
                              
                                      ?>
                                  
                                  
                                
                          
                              </tr>
                                  
                              </tbody>
                          </table>
                          
                          <table class="table table-striped table-advance table-hover">
	                  	  	
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <h4 style="color: #BD595A">Evolução do Requerimento:</h4>
                                  
                                  <th><i class=" fa fa-edit"></i>Mesa Jugadora <?php echo "Composta com " .$valorTotal. " membros" ?></th>  
                                  <th><i class="fa fa-bullhorn"></i>Observação</th>
                                                             
                                  </tr>
                               
                              </thead>
                               
                                 <thead>
                              <tr>
                                
                                  <?php
                                          
                                          
                                          
                                          if ($valor1ps != 1){
                                  echo '<td>'									. $valor1ps." avaliações"." - "					 . "sendo :".$def." deferidos e ".$idef."  indeferidos".'</td>';   
                                          }
                               else {
                                   
                                   echo '<td>'									. $valor1ps." avaliação"					 . "sendo :".$def."deferidos e ".$idef."indeferidos". '</td>'; 
                               }
                               
                               
                                 if ($obsreque == 0){
                                  echo '<td>'									. " Sem observações"					 . '</td>';   
                                          }
                               else {
                                   
                                   echo '<td style="color: #BD595A">'." existem Observações"." /   ".'<a href =?p=dadosObservacoes&?protocolo='.$row["protocolo"].'  <button class="btn btn-default btn-xs"  title="Acessar as Observações"><i class="fa fa-eye"></i>  Vizualizar</button>'. '</td>'; 
                                   
                                   
                               }
                                  ?>
                                 
                               
                                 
                                                             
                                  </tr>
                               
                              </thead>
                               
                              <tbody>
                                  <tr>
                      
                                  
                                  
                                  
                                
                          
                              </tr>
                                  
                              </tbody>
                          </table>
                          
                          
                             <table class="table table-striped table-advance table-hover">
	                  	  	
	                  	  	  <hr>
                              <thead>
                              <tr><h4 style="color: #BD595A">Questionamentos/Observações Respostas:</h4>
                                  <th><i class=" fa fa-edit"></i>Data</th> 
                                  <th><i class="fa fa-bullhorn"></i>Resposta</th>
                                 
                                 
                                  </tr>
                               
                              </thead>
                               
                             
                               
                              <tbody>
                                  <tr>
                           
                                  <?php
                               
                               if (isset($datamod4)){
                                  
                              echo '<td>'									.$datamod4 					 . '</td>';      
                                                           
                              echo '<td>'									. utf8_decode($resp) 			 . '</td>';  
                              
                               }
                               
                             
                                   
                                      ?>
                                  
                                  
                                
                          
                              </tr>
                                  
                              </tbody>
                          </table>
                          
                          
                                
                          
                              </tr>
                                  
                              </tbody>
                          </table>
                          
                          
                          
                           <table class="table table-borde table-advance table-hover">
	                  	  	
	                  	  	  <hr>
                              <thead>
                              <tr><h4 style="color: #BD595A">Membros da Mesa Jugadora:</h4>
                                 
                               
                                  </tr>
                               
                              </thead>
                               
                             
                               
                              <tbody>
                                  <tr>
                           
                                  <?php
                             foreach ($pdo->query($sqlConsultaRequerimentomembros) as $row_nome) {
                                    
                              echo '<td  style="color: orange">'									. $row_nome['nome'] 					 . '</td>';    
                              
                               
                             }
                            
                          
                              
                                      ?>
                                  
                                  
                                
                          
                              </tr>
                                  
                              </tbody>
                          </table>
                          
                          
                          
                           <table class="table table-borde table-advance table-hover">
	                  	  	
	                  	  	  <hr>
                              <thead>
                              <tr><h4 style="color: #BD595A">Acompanhamento dos Votos :</h4>
                                 <th>Nome: </th> 
                                  <th>Data: </th> 
                               
                                  </tr>
                               
                              </thead>
                               
                             
                               
                              <tbody>
                                  <tr>
                           
                                  <?php
                             foreach ($pdo->query($sqlConsultaRequerimentomembros2) as $row_res) {
                                    
                              echo '<td>'									. $row_res['nome'] 					 . '</td>';    
                              echo '<td>'									. $row_res['data'] 					 . '</td>';    
                              
                                   echo '<tr>';
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
                         echo '<tr>'; 
                              
                           }   
                  include "include/MenuLateralDireita2.php";
                  include "include/footer.php";
                            
                  
                  ?>
                  
                  