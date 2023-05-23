
<?php	

$data_lista1		=	$_POST['data1'];
$data_lista2	=	$_POST['data2'];
date('d/m/Y', strtotime($data_lista1));
date('d/m/Y', strtotime($data_lista2));

include "./includes/topo_gerar_listaAprovados.php";

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("./dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html('
	<link rel="stylesheet" href="./assets/css/style_listaAprovados.css">
	
	<div class="group">
		<div id="DivIMG">
			<img class="avatar border-gray" src="'.$tratado.'" alt="...">
		</div>
		
		<div id="DivDadosTopo" class="dadostopo"><br>
			<h2 class="title">'.$nome_fantasia.'</h2>
		</div>
	</div>
	
	<div id="DivConteudo">
		<p style="color: red">Lista de Aprovados Para Entrevista: </p>
	
		<table class="Bordas">
			<tr class="Bordas">
				<th class="Bordas">Nome do Candidato	</th>
				<th class="Bordas">CPF					</th>
				<th class="Bordas">Data da Entrevista	</th>
				<th class="Bordas">Hora da Entrevista	</th>
			</tr>
			'.$table.'
		</table>
	</div>'
	
					   
	);


	ob_get_clean();
	//Renderizar o html
	 $dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"currículo.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);


?>