<?php	

	include_once("conexao.php");
	
	$cpf = addslashes($_GET['pdf']);
	$hoje = date('Y-m-d');
	$result_transacoes = "SELECT * FROM agendamentos WHERE cpf = '$cpf' AND status_agenda ='0' AND data_agenda>$hoje ORDER BY data_agenda DESC ";
	$resultado_trasacoes = mysqli_query($conn, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){

			$html .="Nome: ".utf8_encode($row_transacoes['nome'])."<br>";
			$html .="CPF: ".$row_transacoes['cpf']."<br>" ;
			$html .="Unidade : ".utf8_encode($row_transacoes['unidade_agenda'])."<br>" ;
			$html .="Data do Agendamento: ".$row_transacoes['data_agenda']=implode('/', array_reverse(explode('-', $row_transacoes['data_agenda'])))	."<br>" ;
			$html .="Hora do Agendamento: ".$row_transacoes['horario_agenda']."<br><hr>" ;	
	
	}
	
	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/pdf.css">
			<div class="container-fluid">
				<div class="col-sm-3 col-sm-offset-6">
					<img src="logo.png" class="pdf">
				</div>
				<h1 style="text-align: center;">Comprovante de Agendamento</h1>
				<div class="col-sm-3 col-sm-offset-6">
					<h2>Informações do Atendimento</h2><hr>
					<div class="dados"> 
						'. $html .'
					</div>
				</div>
						
			</div>
		');
	//Limpando antes de renderizar
	ob_clean();

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"agendamento.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>