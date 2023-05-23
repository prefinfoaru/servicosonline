       <meta charset="iso-8859-1">
       <?php header('Content-Type: text/html; charset=UTF-8');
		session_start();

		/**  A FUN��O BUSCA DENTRO DO BANCO SE A FERIADO REFERENTE A DATA ESTIPULADA, CASO TENHA 
		FERIADO O SISTEMA RETORNA UM VALOR PARA VARIAVEL DATA, CASO N�O TENHA FERIADO, A VARIAVEL 
		E PRENCHIDA PELO VALOR INFORMADO PELO USU�RIO,  COM VALOR ESTIPULADO  E FEITO UM CALCULO 
		PARA SABER QUAL DIA DA SEMANA E AQUELA DATA E ASSIM E SOMADO VALORES PARA VERIFICAR OS DIAS 
		UT�IS CONFORME A DATA INFORMADA**/

		/* AUTHOR : lINCOLN lACERDA DE cARVALHO*/
		/* DATA: 06/11/2018 ****************** */

		/* includes *********************************************************************************************** */
		include("../inserir/variaveis.php");
		include("../../banco/banco.php");
		/* **********************************************************************************************************/

		/** Verifica se a Data e Domingo *********************************/
		$data = DateTime::createFromFormat('d/m/Y', $dataint);
		//	$data->add(new DateInterval('P1D')); // 2 dias
		//	$datasomada = $data->format('d/m/Y');

		$diasExtenso 				 = array("Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado");
		$date 						 = DateTime::createFromFormat('d/m/Y', $dataint);
		$numeroSemana 		         = $data->format('w');
		$diadasemanaExtenso	         = $diasExtenso[$data->format('w')];

		/**     if ($numeroSemana == 0) {
    
        echo $_SESSION['msg4'] = " teste final domingo";
		header("Location: ../../index.php?p=solicitar");
		exit() ;}

      /* fim *****************************************************************************************************/
		/*busca se tem feriado  *************************** */
		$sql = "SELECT *FROM bd_sol_hr.tb_feriados where data_ini= '$dataint';";
		$resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
		while ($aux = mysqli_fetch_assoc($resultado)) {
			echo "-----------------------------------------<br />";
			echo "Data feriado:" . $aux["data_ini"] . " " . $diadasemanaExtenso . "<br />";
		}

		/** *********************************************************************************************************/

		include "../inserir/inseridadossolicitacao.php";

		?>