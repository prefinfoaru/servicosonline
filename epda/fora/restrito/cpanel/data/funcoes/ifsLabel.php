<?php

	include'../../banco/conexao.php';

	$pdo = Banco::conectar();

	$sql = 'SELECT *FROM ged_educ.bd_solicitacao;';

	foreach($pdo->query($sql)as $row){
	
	if ($row['situacao'] == 1){
		
		$row['situacao'] = 'Enviado';	
	}if ($row['situacao'] == 2){
		
		$row['situacao'] = 'Em Análise';	
	}if ($row['situacao'] == 3){
		
		$row['situacao'] = 'Movimentado Rh';	
	}if ($row['situacao'] == 4){
		
		$row['situacao'] = 'Retornado a SE';	
	}if ($row['situacao'] == 5){
		
		$row['situacao'] = 'Aprovado';	
	}if ($row['situacao'] == 6){
		
		$row['situacao'] = 'Negado';	
	}
   

	echo utf8_encode('<td style="text-align: center;">'									. $row['numprotocolo']						 . '</td>');	  
	echo utf8_encode('<td style="text-align: center;">'									. $row['id_cod_inter']					 . '</td>');	
	echo utf8_encode('<td style="text-align: center;">'									. $row['data_intercorrencia']					 . '</td>');	  
	echo utf8_encode('<td style="text-align: center;">'									. $row['situacao']					 . '</td>');
	 				  

	echo '<tr>';	}
?>