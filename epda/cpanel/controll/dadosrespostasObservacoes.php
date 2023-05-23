<?php
// pega os proximos Valores dos GET
$URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('protocolo=', $URL_ATUAL, 2);
$ProtocoloRequerimento = $numprot[1];
include "banco.php";
?>

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
                       
    
    
    <div class="form-group" align="center"><br>
     <h4>Perguntas Pendentes do Requerimento com nº de Protocolo : <b style="color: indianred"><?php echo 'epda'. $ProtocoloRequerimento; ?></b></h4><hr>
        <h7>Utilize a caixa abaixo para responder o questionamento.</h7><br><br><br>
   <form action="./consulta/uploadrespdados.php" method="post" >
    <textarea class="form-control" rows="10" cols="10" id="resp" name="resp" placeholder="Digite aqui ..." style="width: 80%" required></textarea>
       <input type="hidden" name="prot" value="<?php echo $ProtocoloRequerimento ?>">
  
    </div>
    

   
     <div class="form-group" align="center">
           <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Enviar</button>
         </form>
        
        
    <a href="<?php $end = 'http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/cpanel/index.php?p=dadosObservacoes&?protocolo='.$ProtocoloRequerimento; echo $end; ?>" onclick="javascript:window.open('', '_self', '').close()"><button class="btn btn-warning" type="button">Voltar</button></a>
        </div>
        
        </button>
                          
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
              
                      
                      
					
                 <br>
                  
                 
                  <?php 
              
              
              
                        
               //   include "include/MenuLateralDireita.php";
                  include "include/footer.php";
                            
                  
              
              
                              
                  ?>  </div><!-- /col-lg-9 END SECTION MIDDLE -->