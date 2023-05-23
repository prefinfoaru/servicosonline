<?php
 $pdo  = Banco::conectar(); 
    
             
    
              $URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              $numprot = explode('tpbusca=', $URL_ATUAL, 2);
              $tipo = $numprot[1];
    
              $buscaget = explode('buscar=', $URL_ATUAL, 2);
              $busca = $buscaget[1];
             //busca se valor e diferete de falso ou vazio para carregar a lista *****************************************************************************************//    
              
              @$palavra = $_POST["palavra"];
              @$especificacaoselec = $_POST['esp'];
              @$cidade = $_POST['cidade'];
    
              $consulta_id = "SELECT * FROM bd_emprega_aruja.tb_dados_profissionais where id_solicitante = $_SESSION[id]" ;
              foreach($pdo->query($consulta_id)as $row_id){ 
              $busca = $row_id['area_de_atuacao'];
              // echo $busca;
                }
              /** preenchimento dos campos de pesquisas**********************************************************************************************************/
              $cidades = "SELECT distinct(cidade) as city FROM bd_emprega_aruja.tb_cadastro_vaga ;";
              $especificacao = "SELECT * FROM bd_emprega_aruja.tb_pre_profissao order by profissao;";
              //buscar base de dados para preenchimento da lista de vagas com base  na area de atuação inclução de condições para pesquisas             
             
              // 1º condição busca todos os dados relacinando a area de referencia do candidato
    
              if (@$palavra =='' && @$especificacaoselec == '' && @$cidade == '') {
              
                if ($tipo == 1 &&  $busca == 0 ) {
                    $where = "where profissao = '$busca' and status = '1' " ;};
                
                if ($tipo == 2 && $busca == 0  ) {
                    $where = "where  status = '1' " ;
                }
              }


             // 2º condição busca todos os dados relacinando que somente tenha como busca a palavra chave 
              if (@$palavra !='' && @$especificacaoselec == '' && @$cidade == '') {
              
                if ($tipo == 1 &&  $busca == 0 ) {
                    
                    $where = "where  (descricao like '%$palavra%' or titulo  like '%$palavra%') and status = '1' " ;
                }

                if ($tipo == 2 &&  $busca == 0 ) {
                    
                    $where = "where  (descricao like '%$palavra%' or titulo  like '%$palavra%') and status = '1' " ;
                } 
              } 

              

              // 3º condição busca todos os dados relacinando que somente tenha como busca a especificação
              if (@$palavra =='' && @$especificacaoselec != '' && @$cidade == '') {
              
                if ($tipo == 1 &&  $busca == 0 ) {
                    
                    $where = "where profissao = '$especificacaoselec' and status = '1' " ;
                }
                if ($tipo == 2 &&  $busca == 0 ) {
                    
                    $where = "where profissao = '$especificacaoselec' and status = '1' " ;
                }
              }    
              
                 
               // 4º condição busca todos os dados relacinando que somente tenha como busca a especificação na cidade
              if (@$palavra =='' && @$especificacaoselec == '' && @$cidade != '') {
              
                if ($tipo == 1 &&  $busca == 0 ) {
                    
                    $where = "where cidade = '$cidade' and status = '1' " ;
                }
                if ($tipo == 2 &&  $busca == 0 ) {
                    
                    $where = "where cidade = '$cidade' and status = '1' " ;
                }
              }    
                 
               // 5º condição busca todos os dados relacinando que somente tenha como busca a especificaçãos palavra chave e profissão
              if (@$palavra !='' && @$especificacaoselec != '' && @$cidade == '') {
              
                if ($tipo == 1 &&  $busca == 0 ) {
                    
                    $where = "where (descricao like '%$palavra%' or titulo  like '%$palavra%') and profissao = '$especificacaoselec' and status = '1' " ;
                }
                if ($tipo == 2 &&  $busca == 0 ) {
                    
                    $where = "where (descricao like '%$palavra%' or titulo  like '%$palavra%') and profissao = '$especificacaoselec' and status = '1' " ;
                }
              
              }   
                  // 6º condição busca todos os dados relacinando que somente tenha como busca a especificação palavra chave, profissao e cidade
              if (@$palavra !='' && @$especificacaoselec != '' && @$cidade != '') {
              
                if ($tipo == 1 &&  $busca == 0 ) {
                    
                    $where = "where (descricao like '%$palavra%' or titulo  like '%$palavra%') and profissao = '$especificacaoselec' and cidade = '$cidade' and status = '1' " ;
                }
                if ($tipo == 2 &&  $busca == 0 ) {
                    
                    $where = "where (descricao like '%$palavra%' or titulo  like '%$palavra%') and profissao = '$especificacaoselec' and cidade = '$cidade' and status = '1' " ;
                }
              }  
    
                  // 7º condição busca todos os dados relacinando que somente tenha como busca a especificação palavra chave e cidade
              if (@$palavra !='' && @$especificacaoselec == '' && @$cidade != '') {
              
                if ($tipo == 1 &&  $busca == 0 ) {
                    
                    $where = "where (descricao like '%$palavra%' or titulo  like '%$palavra%') and cidade = '$cidade' and status = '1' " ;
                }
                if ($tipo == 2 &&  $busca == 0 ) {
                    
                    $where = "where (descricao like '%$palavra%' or titulo  like '%$palavra%') and cidade = '$cidade' and status = '1' " ;
                }
              
              } 
              
    
    
                  // 8º condição busca todos os dados relacinando que somente tenha como busca a especificação profissao e cidade
              if (@$palavra =='' && @$especificacaoselec != '' && @$cidade != '') {
              
              if ($tipo == 1 &&  $busca == 0 ) {
                
                  $where = "where  profissao = '$especificacaoselec' and cidade = '$cidade' and status = '1'" ;
              }
              if ($tipo == 2 &&  $busca == 0 ) {
                
                $where = "where  profissao = '$especificacaoselec' and cidade = '$cidade' and status = '1'" ;
              }
              
              } 
                 
              @$sql  = "SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga $where";
    
              $exec = $pdo->query($sql);



              
             
?>