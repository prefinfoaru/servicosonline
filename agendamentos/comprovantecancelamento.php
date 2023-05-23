<?php	

	include_once("conexao.php");
	
	$id = addslashes($_GET['pdf']);
	$result_transacoes = "SELECT * FROM agendamentos WHERE id = '$id'";
	$resultado_trasacoes = mysqli_query($conn, $result_transacoes);
	
   
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		//Tratando a data

		$html .="Nome: ".utf8_encode($row_transacoes['nome'])."<br>";
		$html .="CPF: ".$row_transacoes['cpf']."<br>" ;
		$html .="Unidade : ".utf8_encode($row_transacoes['unidade_agenda'])."<br>" ;
		if(utf8_encode($row_transacoes['unidade_agenda'])=="Atendimento de comunique-se de processo físico"){$html .="Processo : ".$row_transacoes['processo_agenda']."<br>" ;}
		$html .="Data do Agendamento: ".$row_transacoes['data_agenda']=implode('/', array_reverse(explode('-', $row_transacoes['data_agenda'])))	."<br>" ;
		$html .="Hora do Agendamento: ".$row_transacoes['horario_agenda']."<br>" ;	
		$nome=utf8_encode($row_transacoes['nome']);
		$hoje=date('d-m-Y H:i');
		$atualiza_status= utf8_decode("UPDATE agendamentos
		SET status_agenda = '1',compareceu_agenda='Não',comentario_agenda='Cancelado efetuado por  em $nome em $hoje '
		WHERE id = '$id' ");	
		$executa=mysqli_query($conn, $atualiza_status);
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
				<h1 style="text-align: center;">Comprovante de Cancelamento</h1>
				<div class="col-sm-3 col-sm-offset-6">
					<h2>O atendimento abaixo foi cancelado</h2><hr>
					<div class="dados"> 
						'. $html.'
					</div>
					<hr>
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