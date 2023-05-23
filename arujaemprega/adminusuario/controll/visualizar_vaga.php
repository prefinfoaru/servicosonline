<?php
include "./data/query/query_visualizarVaga.php";

?>
<div class="main-panel">

	<style>
		.cursor {
			cursor: pointer;
		}

		table,
		td {
			border: solid 2px !important;
			border-color: #F7F7F8 !important;
			text-align: left;
		}
	</style>
	<!-- Navbar -->

	<!-- End Navbar -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
						<?php if($anonimo != "true"){ ?>
							<div class="row">
								<div class="col-md-2 pl-1  ">
									<img src="<?php echo $logotipo; ?>" class="img-responsive" style="width: 100%;height: auto;">
								</div>
								<div class="col-md-4 pl-1  typography-line">
									<h2><small><?php echo $nome_fantasia ?></small></h2>
								</div>
							</div><br>
						<?php } ?>
							<form action="./data/insert/candidatar_se.php" method="post">
								<?php
								if ($vaga_exclusiva_pcd == "Sim") {
									echo "<h4 class='card-title'>" . $titulo . "&nbsp;&nbsp;<i class='fa fa-wheelchair' style='font-size:24px; color:#244E98'></i></h4>";
								} else {
									echo "<h4 class='card-title'>" . $titulo . "</h4>";
								}
								?>
								<hr>
						</div>

						<div class="card-body" style="text-align: left">
							<!-- <form action="?p=curriculo_pdf" method="post" target="_blank"> -->
							<div class="row">

								<?php


								echo '<div class="col-md-4 pl-1">';
								echo '<div class="form-group typography-line">';
								echo '<h6>PROFISSÃO</h6>';
								echo '<p class="text-muted">' . $profissao . '</p>';
								echo '</div>';
								echo '</div>';

								echo '<div class="col-md-4 pl-1">';
								echo '<div class="form-group typography-line">';
								echo '<h6>HIERARQUIA</h6>';
								echo '<p class="text-muted">' . $dadosVaga['hierarquia'] . '</p>';
								echo '</div>';
								echo '</div>';

								echo '<div class="col-md-4 pl-1">';
								echo '<div class="form-group typography-line">';
								echo '<h6>SALÁRIO</h6>';
								echo '<p class="text-muted">' . $salario . '</p>';
								echo '</div>';
								echo '</div>';

								echo '<div class="col-md-4 pl-1">';
								echo '<div class="form-group typography-line">';
								echo '<h6>ESCOLARIDADE</h6>';
								echo '<p class="text-muted">' . $escolaridade . '</p>';
								echo '</div>';
								echo '</div>';

								echo '<div class="col-md-4 pl-1">';
								echo '<div class="form-group typography-line">';
								echo '<h6>QUANTIDADE DE VAGAS</h6>';
								echo '<p class="text-muted">' . $quantidade . '</p>';
								echo '</div>';
								echo '</div>';

								echo '<div class="col-md-4 pl-1">';
								echo '<div class="form-group typography-line">';
								echo '<h6>PERÍODO</h6>';
								echo '<p class="text-muted">' . $periodo . '</p>';
								echo '</div>';
								echo '</div>';

								if($anonimo != "true"){
									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>LOCAL DA VAGA</h6>';
									if ($complemento != '') {
										echo '<p class="text-muted">' . $rua . ', ' . $numero . ' ' . $complemento . ', ' . $bairro . ' / ' . $cidade . ' - ' . $estado . '</p>';
									} else {
										echo '<p class="text-muted">' . $rua . ', ' . $numero . ', ' . $bairro . ' / ' . $cidade . ' - ' . $estado . '</p>';
									}
									echo '</div>';
									echo '</div>';
								}
								if ($vaga_exclusiva_pcd == 'Sim') {

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>Vaga Exclusiva Para PCD&nbsp;&nbsp;<i class="fa fa-wheelchair" style="font-size:18px; color:#244E98"></i></h6>';
									echo '<p class="text-muted">' . $vaga_exclusiva_pcd . '</p>';
									echo '</div>';
									echo '</div>';

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>Deficiência &nbsp;&nbsp;<i class="fa fa-wheelchair" style="font-size:18px; color:#244E98"></i></h6>';
									echo '<p class="text-muted">' . $deficiencia_exc . ' ( ' . $dados_def_exc . ' )</p>';
									echo '</div>';
									echo '</div>';
								}

								if ($vaga_tambem_pcd == 'Sim') {

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>Vaga Também Para PCD &nbsp;&nbsp;<i class="fa fa-wheelchair" style="font-size:14px; color:#244E98"></i></h6>';
									echo '<p class="text-muted">' . $vaga_tambem_pcd . '</p>';
									echo '</div>';
									echo '</div>';

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>Deficiência &nbsp;&nbsp;<i class="fa fa-wheelchair" style="font-size:14px; color:#244E98"></i></h6>';
									echo '<p class="text-muted">' . $deficiencia_tbm . ' ( ' . $dados_def_tbm . ' )</p>';
									echo '</div>';
									echo '</div>';
								}

								?>

							</div>
							<hr>
							<div class="card-header">
								<h5>DESCRIÇÃO DA VAGA</h5>
								<p class="text-muted"><?php echo $descricao ?></p>

							</div>
							<hr>

							<!-- <form action="?p=curriculo_pdf" method="post" target="_blank"> -->
							<div class="row">

								<?php

								if ($tempo_experiencia != '') {

									echo '<div class="col-md-12 pl-1">';
									echo '<div class="card-header">';
									echo '<h4 class="card-title">Dados Adicionais</h4><br>';
									echo '</div>';
									echo '</div>';

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>TEMPO DE EXPERIÊNCIA</h6>';
									echo '<p class="text-muted">' . $tempo_experiencia . '</p>';
									echo '</div>';
									echo '</div>';
								}
								if ($idade != '') {
									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>IDADE MÌNIMA</h6>';
									echo '<p class="text-muted">' . $idade . '</p>';
									echo '</div>';
									echo '</div>';
								}
								if ($habilitacao != '') {
									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>HABILITADO</h6>';
									echo '<p class="text-muted">' . $habilitacao . '</p>';
									echo '</div>';
									echo '</div>';
								}
								if ($tipo_habilitacao != '') {
									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>TIPO DE HABILITAÇÃO</h6>';
									echo '<p class="text-muted">' . $tipo_habilitacao . '</p>';
									echo '</div>';
									echo '</div>';
								}
								if ($veiculo != '') {
									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>VEÍCULO PRÓPRIO</h6>';
									echo '<p class="text-muted">' . $veiculo . '</p>';
									echo '</div>';
									echo '</div>';
								}
								if ($viajar != '') {
									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>DISPOSIÇÃO PARA VIAJAR</h6>';
									echo '<p class="text-muted">' . $viajar . '</p>';
									echo '</div>';
									echo '</div>';
								}
								if ($mudar != '') {
									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>DISPOSIÇÃO PARA MUDAR</h6>';
									echo '<p class="text-muted">' . $mudar . '</p>';
									echo '</div>';
									echo '</div>';
								}

								?>
							</div>


							<!-- <form action="?p=curriculo_pdf" method="post" target="_blank"> -->
							<div class="row">

								<?php

								if (empty($beneficiosver)) {
								} else {

									echo '<div class="col-md-12 pl-1">';
									echo '<div class="card-header">';
									echo '<h4 class="card-title">Benefícios</h4><br>';
									echo '</div>';
									echo '</div>';

									$select_dadosBeneficios	=	"SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga_beneficios where id_vaga = '$id_vaga'";
									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>BENEFICIOS</h6>';
									foreach ($pdo->query($select_dadosBeneficios) as $dadosBeneficios) {
										echo '<p class="text-muted">' . $dadosBeneficios['nome'] . '</p>';
									}
									echo '</div>';
									echo '</div>';
								}

								?>
							</div>

							<!-- <form action="?p=curriculo_pdf" method="post" target="_blank"> -->
							<div class="row">

								<?php

								if (empty($informaticaver)) {
								} else {

									echo '<div class="col-md-12 pl-1">';
									echo '<div class="card-header">';
									echo '<h4 class="card-title">Dados de Informática</h4><br>';
									echo '</div>';
									echo '</div>';

									$select_dadosInformatica	=	"SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga_informatica where id_vaga = '$id_vaga'";
									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>Dados</h6>';
									foreach ($pdo->query($select_dadosInformatica) as $dadosInformatica) {
										echo '<p class="text-muted">' . $dadosInformatica['nome'] . '</p>';
									}
									echo '</div>';
									echo '</div>';

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>Nível</h6>';
									foreach ($pdo->query($select_dadosInformatica) as $dadosInformatica) {
										echo '<p class="text-muted">' . $dadosInformatica['nivel'] . '</p>';
									}
									echo '</div>';
									echo '</div>';

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>Obrigatório</h6>';
									foreach ($pdo->query($select_dadosInformatica) as $dadosInformatica) {
										echo '<p class="text-muted">' . $dadosInformatica['obrigatorio'] . '</p>';
									}
									echo '</div>';
									echo '</div>';
								}

								?>
							</div>

							<!-- <form action="?p=curriculo_pdf" method="post" target="_blank"> -->
							<div class="row">

								<?php

								if (empty($idiomasver)) {
								} else {

									echo '<div class="col-md-12 pl-1">';
									echo '<div class="card-header">';
									echo '<h4 class="card-title">Dados de Idiomas</h4><br>';
									echo '</div>';
									echo '</div>';

									$select_dadosIdiomas	=	"SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga_idiomas where id_vaga = '$id_vaga'";
									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>Idiomas</h6>';
									foreach ($pdo->query($select_dadosIdiomas) as $dadosIdiomas) {
										echo '<p class="text-muted">' . $dadosIdiomas['nome'] . '</p>';
									}
									echo '</div>';
									echo '</div>';

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>Nível</h6>';
									foreach ($pdo->query($select_dadosIdiomas) as $dadosIdiomas) {
										echo '<p class="text-muted">' . $dadosIdiomas['nivel'] . '</p>';
									}
									echo '</div>';
									echo '</div>';

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>Obrigatório</h6>';
									foreach ($pdo->query($select_dadosIdiomas) as $dadosIdiomas) {
										echo '<p class="text-muted">' . $dadosIdiomas['obrigatorio'] . '</p>';
									}
									echo '</div>';
									echo '</div>';
								}

								?>
							</div>

							<!-- <form action="?p=curriculo_pdf" method="post" target="_blank"> -->
							<input type="hidden" name="id_solicitante" value="<?php echo $id_solicitante; ?>"></input>
							<input type="hidden" name="id_vaga" value="<?php echo $id_vaga; ?>"></input>
							<input type="hidden" name="id_empresa" value="<?php echo $id_empresa; ?>"></input>
							<input type="hidden" name="status" value="<?php echo $status; ?>"></input>
							<input type="hidden" name="escolaridade" value="<?php echo $escolaridade; ?>"></input>
							<input type="hidden" name="idade" value="<?php echo $idade == "" ? '' : $idade; ?>"></input>
							<?php

							if (empty(@$cand)) {

								$verfica = "SELECT COUNT(id_vaga) AS result,status_candidatura FROM bd_emprega_aruja.tb_candidatura_vaga where id_solicitante = '$id_solicitante' and id_vaga = '$id_vaga'";
								foreach ($pdo->query($verfica) as $row_verfica) {
									$ver	=	$row_verfica['result'];
									$status_candidatura	=	$row_verfica['status_candidatura'];
								}

								if ($ver == 0) {

									$select_pref	=	"SELECT * FROM bd_emprega_aruja.tb_config_internas where id_config = '1' ";
									foreach ($pdo->query($select_pref) as $row_pref) {
										$cnpj_pref	=	$row_pref['CNPJ'];
									}

									if ($vaga_exclusiva_pcd == "Sim") {

										if ($possui_deficiencia	== "Sim") {

											if ($cnpj == $cnpj_pref  && $hierarquia == "Jovem Aprendiz") {

												//REMOVIDO A PEDIDAO ADÃO ASSISTENCIA SOCIAL 15/03/2023
												// if ($hierarquia == "Jovem Aprendiz" && $cidade_cand == "Arujá") {
												// 	echo '<a data-toggle="modal" data-target="#myModal1"><button type="button" class="btn btn-success btn-fill pull-center cursor" title="Candidatar-se a essa vaga">CANDIDATAR-SE</button></a>';
												// 	echo '&nbsp;&nbsp;&nbsp;&nbsp;';
												// 	include "./includes/modals/modal_nis.php";
												// } else {
													echo '<button type="submit" class="btn btn-success btn-fill pull-center cursor" title="Candidatar-se a essa vaga">CANDIDATAR-SE</button>';
											echo '</form>&nbsp;&nbsp;&nbsp;&nbsp;';
													// echo '<a href="?p=buscar_vagas&?tpbusca=1&?buscar=0&res=nok"><button type="button" class="btn btn-success btn-fill pull-center cursor" title="Candidatar-se a essa vaga">CANDIDATAR-SE</button></a>';
													// echo '&nbsp;&nbsp;&nbsp;&nbsp;';
												// }
											} else {

												echo '<button type="submit" class="btn btn-success btn-fill pull-center cursor" title="Candidatar-se a essa vaga">CANDIDATAR-SE</button>';
												echo '</form>&nbsp;&nbsp;&nbsp;&nbsp;';
											}
										}
									} else {

										if ($cnpj == $cnpj_pref && $hierarquia == "Jovem Aprendiz") {
											// //QUERYS E FOR'S	
											// @$select_aprendiz		=	"SELECT * FROM bd_emprega_aruja.tb_objetivo_profissional where id_solicitante = '$id_solicitante'";	
											// foreach ($pdo->query($select_aprendiz) as $row_aprendiz){
											// 	$hierarquia_cand	=	$row_aprendiz['nivel_hierarquico_minimo'];

											// }
											//OBRIGATÓRIEDADES VAGAS PREFEITURA
											// CASO FOR APRENDIZ
											
											//REMOVIDO A PEDIDAO ADÃO ASSISTENCIA SOCIAL 15/03/2023
											// if ($hierarquia == "Jovem Aprendiz" && $cidade_cand == "Arujá") {
											// 	echo '<a data-toggle="modal" data-target="#myModal1"><button type="button" class="btn btn-success btn-fill pull-center cursor" title="Candidatar-se a essa vaga">CANDIDATAR-SE</button></a>';
											// 	echo '&nbsp;&nbsp;&nbsp;&nbsp;';
											// 	include "./includes/modals/modal_nis.php";
											// } else {
												echo '<button type="submit" class="btn btn-success btn-fill pull-center cursor" title="Candidatar-se a essa vaga">CANDIDATAR-SE</button>';
												echo '</form>&nbsp;&nbsp;&nbsp;&nbsp;';
												// echo '<a href="?p=buscar_vagas&?tpbusca=1&?buscar=0&res=nok"><button type="button" class="btn btn-success btn-fill pull-center cursor" title="Candidatar-se a essa vaga">CANDIDATAR-SE</button></a>';
												// echo '&nbsp;&nbsp;&nbsp;&nbsp;';
											// }
										} else {

											echo '<button type="submit" class="btn btn-success btn-fill pull-center cursor" title="Candidatar-se a essa vaga">CANDIDATAR-SE</button>';
											echo '</form>&nbsp;&nbsp;&nbsp;&nbsp;';
										}
									}
								}
								if($ver > 0 && $status_candidatura == 0){
									echo '<a data-toggle="modal" data-target="#myModalCancelar"> <button type="button" class="btn btn-success btn-fill pull-center cursor" title="Cancelar a candidatura desta essa vaga">CANCELAR CANDIDATURA</button> ';
									include "./includes/modals/modalCancelarCand.php";
								}

								echo '<a href="?p=buscar_vagas&?tpbusca=1&?buscar=0"><button type="button" class="btn btn-warning btn-fill pull-center cursor" title="Voltar para lista de vagas">VOLTAR</button></a>';
							} else {


								$verfica = "SELECT COUNT(id_vaga) AS result,status_candidatura FROM bd_emprega_aruja.tb_candidatura_vaga where id_solicitante = '$id_solicitante' and id_vaga = '$id_vaga'";
								foreach ($pdo->query($verfica) as $row_verfica) {
									$ver	=	$row_verfica['result'];
									$status_candidatura	=	$row_verfica['status_candidatura'];
								}

								if($ver > 0 && $status_candidatura == 0){
									echo '<a data-toggle="modal" data-target="#myModalCancelar"> <button type="button" class="btn btn-success btn-fill pull-center cursor" title="Cancelar a candidatura desta essa vaga">CANCELAR CANDIDATURA</button> ';
									include "./includes/modals/modalCancelarCand.php";
								}

								echo '<a href="?p=listar_vagas"><button type="button" class="btn btn-warning btn-fill pull-center cursor" title="Voltar para lista de candidaturas">VOLTAR</button></a>';
							}
							?>

							<!-- <div class="row">-->
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>