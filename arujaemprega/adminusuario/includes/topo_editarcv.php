<?php //include "../data/for/for_edit_cv.php" 
              
              //conexao com banco ********************************************************************************************************************************************************************************
$id = $_SESSION['id'];

include  "./data/conexao.php";
include  "./data/banco.php";
$pdo = Banco::conectar();


//Querys**************************************************************************************************************************************************************************************

$query_con_cpf = "SELECT * FROM bd_emprega_aruja.tb_cadastro_solicitante where id_solicitante = '$id'";
$query_img = "SELECT * FROM bd_emprega_aruja.tb_dados_extras where id_solicitante = '$id'";

foreach($pdo->query($query_con_cpf )as $row)
{
							
$nome       		=	 $row['nome']					;	
$email      		=	 $row['email']					;	
$id         		=	 $row['id_solicitante']			;	
$nasc       		=	 $row['dtnasc']					;	
$estado     		=	 $row['estado']					;	
$tel        		=	 $row['telefone']    			;
$cel        		=	 $row['celular']    			;
$civil      		=	 $row['estado_civil']   		;
$rua        		=	 $row['rua']    				;
$bairro     		=	 $row['bairro']    				;
$numero     		=	 $row['numero']    				;
$complemento		=	 $row['complemento']    		;
$cep        		=	 $row['cep']   		 			;
$cidade        		=	 $row['cidade']    				;
$habilitado     	=	 $row['habilitado']    			;
$tipo_habilitacao   =	 $row['tipo_habilitacao']    	;
$veiculo_proprio   	=	 $row['veiculo_proprio']    	;
$viajar     		=	 $row['disponibilidade_viajar'] ;
$mudar     			=	 $row['disponibilidade_mudar']  ;
}

/**** trata Data *******************************************************************************************************************************************************************************/

$datadep_t			=	 $nasc	;
$data_dep_ano		=	 substr($datadep_t , -10,4)  ;
$data_dep_mes1		=	 substr($datadep_t , 5,2)  ;
$data_dep_dia		=	 substr($datadep_t , 8,2);
$datadep			=	 $data_dep_dia."/".$data_dep_mes1."/".$data_dep_ano; // data tartada

foreach($pdo->query($query_img)as $rowimg)
{
							
$img     = $rowimg['end_foto'];	
$imgtrat = explode('../.', $img, 2);   
$tratado = $imgtrat[1];
$res = $rowimg["resumo"];


}

?>