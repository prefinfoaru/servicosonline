<?php
 $pdo  = Banco::conectar(); 
    
             
    
              $URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              $numprot = explode('tpbusca=', $URL_ATUAL, 2);
              $tipo = $numprot[1];
    
              $buscaget = explode('buscar=', $URL_ATUAL, 2);
              $busca = $buscaget[1];
             //busca se valor e diferete de falso ou vazio para carregar a lista *****************************************************************************************//    
              
        
    
              $consulta_id = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa;" ;
              foreach($pdo->query($consulta_id)as $row_id){ 
              
                  $endlogo          = $row_id['area_de_atuacao'];
                  $nomeempresa      = $row_id['logotipo'];
                  $id_empresa       = $row_id['id_cadastroempresa'];
                  
              }
            




 ?>