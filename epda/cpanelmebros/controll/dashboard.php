<i class="fas fa-chalkboard-teacher"></i><i class="fas fa-chalkboard-teacher"></i> <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
                  
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
	                  	  	  <h4><i class="fa fa-angle-right"></i> Requerimentos em Votação</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Protocolo</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Assunto</th>
                                  <th><i class="fa fa-bookmark"></i> Data </th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th><i class=" fa fa-edit"></i> Evolução</th>                                  
                                  <th><i class="fa fa-cog fa-spin"></i> Ações</th>
                               
                              </thead>
                              <tbody>
                                  <tr>
                            <?php
                                  include "conexao.php";
                                  $pdo  = Banco::conectar();   
                                      
                                      
                                if ($idJurado == 'J_1')       {                                      
                                  $sql  = "SELECT * FROM bd_epda.tb_requerimento where J_1 = '0'"; }
                                      
                                if ($idJurado == 'J_2')       {                                      
                                  $sql  = "SELECT * FROM bd_epda.tb_requerimento where J_2 = '0'"; }
                                if ($idJurado == 'J_3')       {                                      
                                  $sql  = "SELECT * FROM bd_epda.tb_requerimento where J_3 = '0'"; }
                                if ($idJurado == 'J_4')       {                                      
                                  $sql  = "SELECT * FROM bd_epda.tb_requerimento where J_4 = '0'"; }
                                if ($idJurado =='J_5')       {                                      
                                  $sql  = "SELECT * FROM bd_epda.tb_requerimento where J_5 = '0'"; }
                                if ($idJurado == 'J_6')       {                                      
                                  $sql  = "SELECT * FROM bd_epda.tb_requerimento where J_6 = '0'"; }      
                                  
                                 foreach ($pdo->query($sql) as $row) {
			                     $data_dep_ano		= substr($row['dt_cadastro'] , -10,4)  ;
		                         $data_dep_mes1	= substr($row['dt_cadastro'] , 5,2)  ;
		                         $data_dep_dia		= substr($row['dt_cadastro'] , 8,2);
                                 
                                      
                               $jurado_1 = $row['J_1'];
                               $jurado_2 = $row['J_2'];
                               $jurado_3 = $row['J_3'];
                               $jurado_4 = $row['J_4'];
                               $jurado_5 = $row['J_5'];
                               $jurado_6 = $row['J_6'];
                               $valorTotal = 6 ;
                               $valor1ps   = $jurado_1 + $jurado_2 + $jurado_3 + $jurado_4 + $jurado_5 + $jurado_6 ;       
                                
                                $porcprgs = $valor1ps / $valorTotal ;
                                $procetresults = $porcprgs * 100 ;
                                $procetresultss = substr($procetresults, 0	, 4);
                                $p = round($procetresultss, 1).'%' ;     
                                     
                                     
                                     
			                      echo '<td>'									. $row['protocolo'] 					 . '</td>';
			                      echo '<td>'									. $row['assunto'] 					     . '</td>';
			                      echo '<td>'									. $data_dep_dia."/".$data_dep_mes1."/".$data_dep_ano 					 . '</td>';
                                  echo '<td>'									. utf8_decode($row['status'])					 . '</td>';
			                     
                                     echo '<td>'									. "<div class='progress'>
                                         <div class='progress-bar progress-bar-success active' role='progressbar'
                                         aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:$p'>
                                           $p
                                         </div>
                                            </div>	"				 . '</td>';
			                  
			                    
                                     echo '<td>'									. 
                                      
                                  //    '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                '<a href =?p=dadosRequerimento&?protocolo='.$row["protocolo"].' ><button class="btn btn-primary btn-xs"  title="Acessar os Dados"><i class="fa fa-folder-open"></i></button></a>
                                    <a href =?p=dadosrespostasmesa&?protocolo='.$row["protocolo"].' ><button class="btn btn-defaut btn-xs"  title="Visualizar Observações"><i class="fa fa-eye"></i></button></a>
                                      <a href =?p=dadosrespostasmesadef&?protocolo='.$row["protocolo"].' ><button class="btn btn-success btn-xs"  title="Montar ATA"><i class="fa fa-check"></i></button></a>'
                                         
                                         . '</td>';
			

			
		
                                 

                                        echo '<tr>';
		
                                
                                  }
                                  ?>      
                                  
                                  
                                  
                                
                          
                              </tr>
                                  
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
					
               
                  <br>
                  
                  <?php 
                  
             //     include "include/MenuLateralDireita.php";
                  include "include/footer.php";
                            
                  
                  ?>   </div><!-- /col-lg-9 END SECTION MIDDLE -->