<meta charset="iso-8859-1">
		<?php header('Content-Type: text/html; charset=UTF-8');
		session_start();

		/**  A FUNÇÃO BUSCA DENTRO DO BANCO SE A FERIADO REFERENTE A DATA ESTIPULADA, CASO TENHA 
		FERIADO O SISTEMA RETORNA UM VALOR PARA VARIAVEL DATA, CASO NÃO TENHA FERIADO, A VARIAVEL 
		E PRENCHIDA PELO VALOR INFORMADO PELO USUÁRIO,  COM VALOR ESTIPULADO  E FEITO UM CALCULO 
		PARA SABER QUAL DIA DA SEMANA E AQUELA DATA E ASSIM E SOMADO VALORES PARA VERIFICAR OS DIAS 
		UTÉIS CONFORME A DATA INFORMADA**/

		/* AUTHOR : lINCOLN lACERDA DE cARVALHO*/
		/* DATA: 06/11/2018 ****************** */

		/* includes *********************************************************************************************** */
		include ("../inserir/variaveis.php");
		include ("../../banco/banco.php"); 
		/* **********************************************************************************************************/
        /* condições que verifica se e preciso Calcular Data ********************************************************/
     if ($tipo != 23){ 


         /* fim *****************************************************************************************************/
		/*Busnca data final do Feriados no banco de dados estipulada pelo administrador *************************** */
		$sql="SELECT *FROM ged_educ.bd_feriados where data_ini= '$dataint';";
		$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
		// Obtendo os dados por meio de um loop while
		while ($datarecebida = mysqli_fetch_array($resultado)){
		$dataferiado = $datarecebida["data_final"];}
		mysqli_close($conn);
		/** *********************************************************************************************************/

		/** verifica se a data informada e um feriado etipulado pelo administrador *********************************/
		if ( $dataferiado == 'null' || $dataferiado == ''){
		$data = $dataint ;}
		else {	
		$data = $dataferiado;}

		$data = DateTime::createFromFormat('d/m/Y', $data);
		$data->add(new DateInterval('P1D')); // 2 dias
		$datasomada = $data->format('d/m/Y');

		$diasExtenso 				 = array("Domindo","segunda","Terça","Quarta","Quinta","Sexta","Sábado");
		$date 						 = DateTime::createFromFormat('d/m/Y', $data);
		// $feriados 					 = array('01/01','31/12','25/12','01/05','25/04');
		$numeroSemana 		         = $data->format('w');
		$diadasemanaExtenso	         = $diasExtenso[$data->format('w')];


		/***pegando o dia seguinte a data  domingo*******************************************************************************************************************************/

		if ($numeroSemana == '0') {

		$data2 = DateTime::createFromFormat('d/m/Y', $datasomada);
		$data2->add(new DateInterval('P2D')); // 2 dias
		$dataentrega2 = $data2->format('d/m/Y');
		 /**Trata as datas retirando / e coloando - alem de inverter a data para formatado americano****************************************************************************************************/
		$dataentrega5m = explode('/', $dataentrega2);
		$dtentraga = ("$dataentrega5m[2]-$dataentrega5m[1]-$dataentrega5m[0]");
		/* Tranforma a data em segundos ***************************************************************************************************************************************************************/
		$dataint3  = strtotime($dataint2);
		$dtentraga = strtotime($dtentraga);
		$dthj	   = strtotime($data_calc);	

		$dataentrega5m ;
		$qtdias         = $dataint3 - $dthj;
		$qtdentredatas	= $dataint3 - $dtentraga;

		/* Tranforma segundos em dia *****************************************************************************************************************************************************************/	
	    $total     = floor($qtdias/(60 * 60 * 24));
		$total2	   = floor($qtdentredatas/(60 * 60 * 24));	

		if($total < 0){

		     $total1 = $total * -1  +1;
	         $total2 = $total2 * -1  ;}
		else {

	    $total1 +1;
	 	$total2 ;}
		
		if ($total1 > $total2 ) {
				
		$_SESSION['msg4'] = " * Data Expirada confome Lei tal tal, todas as solicitações tem até 2 dias úteis para envio contanto do dia seguinte da intercorrência, conforme informado sua intercorrência foi dia ".$dataint." e  sua Solicitação tinha que ser enviada até o dia ".$dataentrega2."";
		header("Location: ../../index.php?p=solicitar");
		exit() ;}
		
		};
       /***********************************************************************************************************************************************************************************************/
        /*********************** Sabado****************************************************************************************************************************************************************** */
		if ($numeroSemana == '6') {

		$data3 = DateTime::createFromFormat('d/m/Y', $datasomada);
		$data3->add(new DateInterval('P3D')); // 3 dias
		$dataentrega3 = $data3->format('d/m/Y');
         /**Trata as datas retirando / e coloando - alem de inverter a data para formatado americano****************************************************************************************************/
		$dataentrega5m = explode('/', $dataentrega3);
		$dtentraga = ("$dataentrega5m[2]-$dataentrega5m[1]-$dataentrega5m[0]");
		/* Tranforma a data em segundos ***************************************************************************************************************************************************************/
		$dataint3  = strtotime($dataint2);
		$dtentraga = strtotime($dtentraga);
		$dthj	   = strtotime($data_calc);	

		$dataentrega5m ;
		$qtdias         = $dataint3 - $dthj;
		$qtdentredatas	= $dataint3 - $dtentraga;

		/* Tranforma segundos em dia *****************************************************************************************************************************************************************/	
	    $total     = floor($qtdias/(60 * 60 * 24));
		$total2	   = floor($qtdentredatas/(60 * 60 * 24));	

		if($total < 0){

		     $total1 = $total * -1  +1;
	         $total2 = $total2 * -1  ;}
		else {

	    $total1 +1;
	 	$total2 ;}
		
		if ($total1 > $total2 ) {
				
		$_SESSION['msg4'] = " * Data Experada confome Lei tal tal, todas as solicitação tem até 2 dias uteis para envio contanto do dia seguinte da intercorrência, consforme informado sua intercorrência foi dia ".$dataint." e  sua Solicitação tinha que ser enviada até o dia ".$dataentrega3."";
		header("Location: ../../index.php?p=solicitar");
		exit() ;}
		
		};
       /***********************************************************************************************************************************************************************************************/

		
       /*********************** segunda - terça e quarta ************************************************************************************************************************************************** */
		if ($numeroSemana == '1' || $numeroSemana == '2' || $numeroSemana == '3' || $numeroSemana == '4' ) {

		$data4 = DateTime::createFromFormat('d/m/Y', $datasomada);
		$data4->add(new DateInterval('P1D')); // 1 dias
		$dataentrega4 = $data4->format('d/m/Y');
		 /**Trata as datas retirando / e coloando - alem de inverter a data para formatado americano****************************************************************************************************/
		$dataentrega5m = explode('/', $dataentrega4);
		$dtentraga = ("$dataentrega5m[2]-$dataentrega5m[1]-$dataentrega5m[0]");
		/* Tranforma a data em segundos ***************************************************************************************************************************************************************/
		$dataint3  = strtotime($dataint2);
		$dtentraga = strtotime($dtentraga);
		$dthj	   = strtotime($data_calc);	

		$dataentrega5m ;
		$qtdias         = $dataint3 - $dthj;
		$qtdentredatas	= $dataint3 - $dtentraga;

		/* Tranforma segundos em dia *****************************************************************************************************************************************************************/	
	    $total     = floor($qtdias/(60 * 60 * 24));
		$total2	   = floor($qtdentredatas/(60 * 60 * 24));	

		if($total < 0){

		     $total1 = $total * -1  +1;
	         $total2 = $total2 * -1  ;}
		else {

	    $total1 +1;
	 	$total2 ;}
		
		if ($total1 > $total2 ) {
				
		$_SESSION['msg4'] = " * Data Experada confome Lei tal tal, todas as solicitação tem até 2 dias uteis para envio contanto do dia seguinte da intercorrência, consforme informado sua intercorrência foi dia ".$dataint." e  sua Solicitação tinha que ser enviada até o dia ".$dataentrega4."";
		header("Location: ../../index.php?p=solicitar");
		exit() ;}
		
		};
       /***********************************************************************************************************************************************************************************************/

       /*********************** Sexta******************************************************************************************************************************************************** */
		if ($numeroSemana == '5') {

		$data3 = DateTime::createFromFormat('d/m/Y', $datasomada);
		$data3->add(new DateInterval('P4D')); // 3 dias
		$dataentrega5 = $data3->format('d/m/Y');
        /**Trata as datas retirando / e coloando - alem de inverter a data para formatado americano****************************************************************************************************/
		$dataentrega5m = explode('/', $dataentrega5);
		$dtentraga = ("$dataentrega5m[2]-$dataentrega5m[1]-$dataentrega5m[0]");
		/* Tranforma a data em segundos ***************************************************************************************************************************************************************/
		$dataint3  = strtotime($dataint2);
		$dtentraga = strtotime($dtentraga);
		$dthj	   = strtotime($data_calc);	

	    $dataentrega5m ;
	    $qtdias         = $dataint3 - $dthj;
		$qtdentredatas	= $dataint3 - $dtentraga;

		/* Tranforma segundos em dia *****************************************************************************************************************************************************************/	
	    $total     = floor($qtdias/(60 * 60 * 24));
		$total2	   = floor($qtdentredatas/(60 * 60 * 24));	

		if($total < 0){

		     $total1 = $total * -1  +1;
	         $total2 = $total2 * -1  ;}
		else {

	  echo  $total1 +1;
	 	$total2 ;}
		
		if ($total1 > $total2 ) {
				
		$_SESSION['msg4'] = " * Dataa Experada confome Lei tal tal, todas as solicitação tem até 2 dias uteis para envio contanto do dia seguinte da intercorrência, consforme informado sua intercorrência foi dia ".$dataint." e  sua Solicitação tinha que ser enviada até o dia ".$dataentrega5."";
		header("Location: ../../index.php?p=solicitar");
		exit() ;}
			
			
		
		};
       /***********************************************************************************************************************************************************************************************/ 
					} else 
	 { include "../inserir/inseridadossolicitacao.php" ;};
 
		?> 
