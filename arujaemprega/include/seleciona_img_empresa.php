<?php

//criado por Lincoln *******************************************************************************************************************************************************************************

 //$pdo  = Banco::conectar(); 
 
  
              $consulta_id = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa;" ;
            
              foreach($pdo->query($consulta_id)as $row_id)
              { 
                  
                  
                  
                  
           //variáveis que carrega na index   
                  @$endlogo          = $row_id['logotipo'];
                  @$nomeempresa      = $row_id['nome_fantasia'];
                  @$id_empresa       = $row_id['id_cadastroempresa'];
                  
                  
                  
                    @$numprot = explode('logotipos', $endlogo  , 2);
                
              $count = "ELECT count(*) as vagas FROM bd_emprega_aruja.tb_cadastro_vaga where id_empresa = '$id_empresa'";      
                  
                  
               $enderecoimg = $numprot[1];
               $endecomp = "https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/imagens/empresas/logotipos/$enderecoimg" ;
                  
            echo    '<div class="item img-slider" >' ;
            echo 	'<img alt="" src='.$endecomp.' style="width: 100px; height: 70px;">';
            echo	"<span style='color:#3498db'>$nomeempresa</span><br>" ;
            echo    '</div>' ;
                  
              }
            




 ?>