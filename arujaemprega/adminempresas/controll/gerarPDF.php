
<?php	
include "./includes/topo_gerarPDF.php";

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("./dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html('
	<link rel="stylesheet" href="./assets/css/style_curriculo_pdf.css">
	
						
	<div class="group">
		<div id="DivIMG">
			<img class="avatar border-gray" src="'.$tratado.'" alt="...">
		</div>
		
		<div id="DivDadosTopo" class="dadostopo">
			<h2 class="title">'.$nome.'</h2>
			'.$usual.'
			<label>Data de Nascimento:</label>
			<span>'.$dtnasc.' &nbsp;&nbsp;</span>
			<label>Sexo:</label>
			<span>'.$sexo.'</span><br>
			<label>Endereço:</label>
			<span>'.$rua.'&nbsp;&nbsp;</span> 
			<label>N°:</label>
			<span>'.$numero.'</span><br>
			<label>Bairro:</label>
			<span>'.$bairro.'&nbsp;&nbsp;</span>
			<label> Cidade: </label>
			<span>'.$cidade.'</span>
			<label>&nbsp;&nbsp;Estado: </label>
			<span> '.$estado_dados_sol.'</span><br>
			<label>Telefone:</label>
			<span>'.$telefone.'&nbsp;&nbsp;</span>
			<label>Celular:</label>
			<span>'.$celular.'&nbsp;&nbsp;</span>
			<label>Email:</label>
			<span>'.$email.'</span><br><br>
			
		</div>
	</div>
	
	<div id="DivRodape">
			<h4>Objetivo</h4>
			<hr>
			<span>'.$objetivos.'</span><br>
			<h4>Formação</h4>
			<hr>
			'.$formacao.'
			<h4>Idiomas</h4>
			<hr>
			'.$idiomas.'<br>
			<h4>Informática</h4>
			<hr>
			'.$informatica.'<br>
			<h4>Experiências Profissionais</h4>
			<hr>
			'.$ex_profissional.'<br>
			<h4>Resumo</h4>
			<hr>
			<span>'.$resumo.'</span>
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