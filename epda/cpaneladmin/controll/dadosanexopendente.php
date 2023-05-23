<?php
// pega os proximos Valores dos GET
$URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('protocolo=', $URL_ATUAL, 2);
$ProtocoloRequerimento = $numprot[1];
include "conexao.php";
$pdo  = Banco::conectar();
$sqlConsulta = "SELECT * FROM bd_epda.tb_observacoes where protocolo = '$ProtocoloRequerimento';" ; 


?>

<i class="fas fa-chalkboard-teacher"></i><i class="fas fa-chalkboard-teacher"></i> <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
          
                  <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                       
    
    
    <div class="form-group" align="center"><br>
     <h4>Anexar Arquivos Pendentes do Requerimento com nº de Protocolo : <b style="color: indianred"><?php echo "epda".$ProtocoloRequerimento; ?></b></h4><hr>
        
        
        <div style="width: 80% ; background-color:#AEF7D8">
        <strong style="color: red">Observação:</strong><br> <i>Clique no botão escolher arquivos ou arraste um ou mair arquivos, verifique se a quantidade de arquivos selecionado e igual ao qual indicou, logo após clique em anexar. Logo abaixo na verificação de envio mostrarar se os arquivos foram carregandos e enviados com sucesso, após esse procedimento continue com o preenchimento do formulário.</i><br><br><br>
      </div>
        <hr>
        <form enctype="multipart/form-data" method="POST" action="">
        <div class="col-sm-10">          
        <input type="file" class="form-control" name="arquivo[]" multiple="multiple"  >
      </div>
    </div>
    
    
 <div class="form-group" align="center">
			
			
		
							<button type="submit" class="btn btn-success" >Anexar</button>
 </div
							
        </form>
			<br>
    <hr>
     <label class="control-label col-sm-12" for="pwd" style="color: #DF3A3C; text-align: center">Verificação de envio de arquivo:</label><br><br>
     
     <div class="form-group" align="center">
     
    <?php include "./consulta/uploadrespdadospend.php" ?><br><br><br>
          <a href="<?php $end = 'http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/cpanel/index.php?p=dadosObservacoes&?protocolo='.$ProtocoloRequerimento; echo $end; ?>" onclick="javascript:window.open('', '_self', '').close()"><button class="btn btn-warning" type="button">Voltar</button></a>
    </div>
     <hr>
 
        </button> 
                          
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
                      
                      
                      
                      
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                 
                  <?php 
                          
                  include "include/MenuLateralDireita.php";
                  include "include/footer.php";
                            
                  
                  ?>