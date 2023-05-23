<?php



if ($buscaravancadabtn	== '$2y$10$ORkfGbchOqQBo.NSY7A5fOl6/19XFqyiTFYWFupMednoUJ7qbEVCC') {

	//CONSULTA PARA TRAZER AS VAGAS QUE FORAM BUSCADAS NA INDEX ARUJÁ EMPREGA.
	$consulta_pesquisaIndex	=	"SELECT a.id_vaga, a.id_empresa, b.id_cadastroempresa, a.titulo, a.profissao, a.cidade, a.data,  a.status, b.nome_fantasia FROM bd_emprega_aruja.tb_cadastro_vaga as a 
		INNER JOIN bd_emprega_aruja.tb_cadastro_empresa as b ON a.id_empresa = b.id_cadastroempresa  where a.status = '1' and (titulo like '%$buscaindex%' or profissao like  '%$buscaindex%')";

	foreach ($pdo->query($consulta_pesquisaIndex) as $row_pesquisaIndex) {
		$id_vaga	=	$row_pesquisaIndex['id_vaga'];

		echo '	<div class="panel-vagas col-md-6">
					<a href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/loginvisu_vaga.php?vaga=' . $id_vaga . '&?ret=home"><h4><b>' . $row_pesquisaIndex['titulo'] . '</b></h4></a>
				
					<span>' . date('d/m/Y'/*h:i:s*/, strtotime($row_pesquisaIndex['data'])) . '</span>
				<hr style="background-color:#F7F7F8 "></div>';
	}
	// <span>' . $row_pesquisaIndex['nome_fantasia'] . ' - ' . $row_pesquisaIndex['cidade'] . '</span><br>
} else {

	//CONSULTA PARA TRAZER AS 12 VAGAS QUE MOSTRA NA INDEX ARUJÁ EMPREGA.
	$consulta_vagas	=	"SELECT a.id_vaga, a.id_empresa, b.id_cadastroempresa, a.titulo, a.cidade, a.data,  a.status, b.nome_fantasia FROM bd_emprega_aruja.tb_cadastro_vaga as a INNER JOIN bd_emprega_aruja.tb_cadastro_empresa as b ON a.id_empresa = b.id_cadastroempresa where a.status = '1' order by data DESC LIMIT 12  ";
	foreach ($pdo->query($consulta_vagas) as $row_vagas) {
		$id_vaga	=	$row_vagas['id_vaga'];
		
		echo '	<div class="panel-vagas col-md-6">
					<a href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/loginvisu_vaga.php?vaga=' . $id_vaga . '&?ret=home"><h4><b>' . mb_convert_case($row_vagas['titulo'], MB_CASE_TITLE, 'UTF-8'). '</b></h4></a>
				
					<span>' . date('d/m/Y'/*h:i:s*/, strtotime($row_vagas['data'])) . '</span>
				<hr style="background-color:#F7F7F8 "></div>';
	}
	// <span>' . $row_vagas['nome_fantasia'] . ' - ' . $row_vagas['cidade'] . '</span><br>
}