<?php	
    include_once("../conexao.php");
    session_start();
	if(!isset($_SESSION["login"])){
		header ("Location: index.php?msg=2");
	}?>
	
	
	<?php	
		$html = '<table class="table table-striped">';	
		$html .= '<thead>';
		$html .= '<tr>';
		$html .= '<th scope="col">Nome</th>';
		$html .= '<th>CPF</th>';
		$html .= '<th>Unidade</th>';
		$html .= '<th>Processo</th>';
		$html .= '<th>Data</th>';
		$html .= '<th>Horario</th>';
		$html .= '<th>Compareceu</th>';
		$html .= '<th>Comentário</th>';
		$html .= '</tr>';
		$html .= '</thead>';
		$html .= '<tbody>';

		$data = addslashes($_POST['data']);
	//Tratando a data
	$data=implode('-', array_reverse(explode('/', $data)));
	$unidade= $_SESSION["login"];
	$result_transacoes = "SELECT * FROM agendamentos where data_agenda='$data' AND status_agenda <>'1' ORDER BY horario_agenda ASC";
	$resultado_trasacoes = mysqli_query($conn, $result_transacoes);

	
    
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr><td>'.utf8_encode($row_transacoes['nome']) . "</td>";
		$html .= '<td>'.$row_transacoes['cpf'] . "</td>";
		$html .= '<td>'.utf8_encode($row_transacoes['unidade_agenda']) . "</td>";
		if(!empty($row_transacoes['processo_agenda']) )
		{
			$html .= '<td>'.$row_transacoes['processo_agenda'] . "</td>";
		}
		else
		{
			$html .= '<td></td>';
		}
		$html .= '<td>'.$row_transacoes['data_agenda']= $row_transacoes['data_agenda']=implode('/', array_reverse(explode('-', $data))). "</td>";
		$html .= '<td>'.$row_transacoes['horario_agenda'] . "</td>";		
		$html .= '<td>'.utf8_encode($row_transacoes['compareceu_agenda']) . "</td>";
		$html .= '<td>'.utf8_encode($row_transacoes['comentario_agenda']) . "</td></tr>";
	}

	$html .= '</tbody>';
	$html .= '</table>';

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("../dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
		// Dmudar orientação do PDF
		$dompdf->set_paper('A4','landscape');
		// Carrega seu HTML
		$dompdf->load_html('	
				<link href="css/bootstrap.css" rel="stylesheet">
				<link rel="stylesheet" href="../css/pdf.css">
				<div class="container-fluid">
					<div class="col-sm-3 col-sm-offset-6">
						<img src="../logo.png" class="pdf">
					</div>
					<div class="col-sm-3 col-sm-offset-6">
						<h2 style="text-align: center;">Relatorio de Agendamentos</h2>
					</div>
					'. $html .'
				</div>
			');

	
		//Limpando antes de renderizar
	ob_clean();
	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Relatorio_de_Agendamentos.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>