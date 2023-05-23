<?php
//conta a quantidade de vagas disponivel com status ativo != 2 ou != 3

 $sql_cont_vagas_disp =  "SELECT count(*) as vagas_disponiveis FROM bd_emprega_aruja.tb_cadastro_vaga where status != '2' or status != '3'" ;
    
//quantidade de empresa cadastrada no sistema 
    
$sql_cont_empresa_cad = "SELECT count(*) as cad_empresa FROM bd_emprega_aruja.tb_cadastro_empresa" ;


 foreach($pdo->query($sql_cont_vagas_disp)as $row_vagas)
 {
     
     @$vagas_disp = $row_vagas['vagas_disponiveis'] ;
 }


foreach($pdo->query($sql_cont_empresa_cad)as $row_empresa)
 {
     
   @$vagas_empre = $row_empresa['cad_empresa'] ;
 }

?>