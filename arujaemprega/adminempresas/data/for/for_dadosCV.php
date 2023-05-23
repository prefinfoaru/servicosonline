<?php 

//********************* DADOS EXTRA *******************************************************************************//

foreach($pdo->query($select_dados_extra)as $dados_extra){
		
		$possui_deficiencia 		= 		$dados_extra ['possui_deficiencia']		;
		$resumo				 		= 		$dados_extra ['resumo']					;
		$end_foto				 	= 		$dados_extra ['end_foto']				;
		$deficiencia				= 		$dados_extra ['deficiencia']			;
		$dados_deficiencia			= 		$dados_extra ['dados_deficiencia']		;
		$facebook					= 		$dados_extra ['facebook']				;
		$linkedin					= 		$dados_extra ['linkedin']				;
		$twitter					= 		$dados_extra ['twitter']				;
		$googleplus					= 		$dados_extra ['googleplus']				;
		$youtube					= 		$dados_extra ['youtube']				;
		$instagram					= 		$dados_extra ['instagram']				;
		$blog						= 		$dados_extra ['blog']					;
			
}

foreach($pdo->query($select_nis)as $row_nis){	
		$nis	=	$row_nis['NIS'];
}
?>