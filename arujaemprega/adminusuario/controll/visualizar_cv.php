<?php

include "./data/query/query_visualizarCV.php";


$img = $end_foto;
$imgtrat = explode('../.', $img, 2);
@$tratado = $imgtrat[1];

?>

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="main-panel">
	<style>
		.cursor {
			cursor: pointer;
		}
	</style>
	<!-- Navbar -->

	<!-- End Navbar -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header text-center">
							<h4 class="card-title">Visualizar Currículo</h4>
							<hr>
						</div>

						<div class="card-header">
							<h4 class="card-title">Formação Acadêmica</h4><br>
						</div>

						<div class="card-body" style="text-align: left">
							<form action="?p=curriculo_pdf" method="post" target="_blank">
								<div class="row">

									<?php

									foreach ($pdo->query($select_formacao_acadmc) as $formacao_acadmc) {

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>NOME DA INSTITUIÇÃO</h6>';
										echo '<p class="text-muted">' . $formacao_acadmc['nome_instituicao'] . '</p>';
										echo '</div>';
										echo '</div>';

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>PAÍS</h6>';
										echo '<p class="text-muted">' . $formacao_acadmc['pais'] . '</p>';
										echo '</div>';
										echo '</div>';

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>ESTADO</h6>';
										echo '<p class="text-muted">' . $formacao_acadmc['estado'] . '</p>';
										echo '</div>';
										echo '</div>';

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>CURSO</h6>';
										echo '<p class="text-muted">' . $formacao_acadmc['curso'] . '</p>';
										echo '</div>';
										echo '</div>';

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>NÍVEL</h6>';
										echo '<p class="text-muted">' . $formacao_acadmc['nivel'] . '</p>';
										echo '</div>';
										echo '</div>';

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>STATUS DO CURSO</h6>';
										echo '<p class="text-muted">' . $formacao_acadmc['status_curso'] . '</p>';
										echo '</div>';
										echo '</div>';

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>INÍCIO DO CURSO</h6>';
										echo '<p class="text-muted">' . $formacao_acadmc['inicio_mes'] . ' / ' . $formacao_acadmc['inicio_ano'] . '</p>';
										echo '</div>';
										echo '</div>';

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>CONCLUSÃO DO CURSO</h6>';
										if ($formacao_acadmc['conclusao_mes'] != '') {
											echo '<p class="text-muted">' . $formacao_acadmc['conclusao_mes'] . ' / ' . $formacao_acadmc['conclusao_ano'] . '</p>';
										} else {
											echo "Trancado";
										}
										echo '</div>';
										echo '</div>';
										echo '<div class="col-md-4 pl-1">';
										echo '</div>';
										echo '<div class="col-md-12 pl-1"><br>';
										echo '</div>';
									}


									?>
								</div>
								<hr>
						</div>

						<div class="card-header">
							<h4 class="card-title">Idiomas e Habilidades</h4><br>
						</div>

						<div class="card-body" style="text-align: left">

							<div class="row">
								<div class="col-md-6 pl-1">
									<div class="form-group typography-line">
										<h6>IDIOMAS</h6><br>
										<?php
										foreach ($pdo->query($select_idiomas) as $row_idiomas) {
											echo '<p class="text-muted">' . $row_idiomas["idiomas"] . '</p>';
										}
										?>
									</div>
								</div>
								<div class="col-md-6 pl-1">
									<div class="form-group typography-line">
										<h6>NÍVEL</h6><br>
										<?php
										foreach ($pdo->query($select_idiomas) as $row_idiomas) {
											echo '<p class="text-muted">' . $row_idiomas["nivel"] . '</p>';
										}
										?>
									</div>
								</div>
								<br><br>
								<div class="col-md-6 pl-1">
									<div class="form-group typography-line">
										<h6>HABILIDADES</h6><br>
										<?php
										foreach ($pdo->query($select_habilidades) as $row_habilidades) {
											echo '<p class="text-muted">' . $row_habilidades["descricao_habilidade"] . '</p>';
										}
										?>
									</div>
								</div>

								<div class="col-md-4 pl-1"></div>
								<br><br>
								<div class="col-md-4 pl-1">
									<div class="form-group typography-line">
										<h6>Àrea de Informática</h6><br>
										<?php
										foreach ($pdo->query($select_informatica) as $row_informatica) {
											echo '<p class="text-muted">' . $row_informatica["curso"] . '</p>';
										}
										?>
									</div>
								</div>
								<div class="col-md-4 pl-1">
									<div class="form-group typography-line">
										<h6>Conhecimento</h6><br>
										<?php
										foreach ($pdo->query($select_informatica) as $row_informatica) {
											echo '<p class="text-muted">' . $row_informatica["especializacao"] . '</p>';
										}
										?>
									</div>
								</div>
								<div class="col-md-4 pl-1">
									<div class="form-group typography-line">
										<h6>NÍVEL</h6><br>
										<?php
										foreach ($pdo->query($select_informatica) as $row_informatica) {
											echo '<p class="text-muted">' . $row_informatica["nivel"] . '</p>';
										}
										?>
									</div>
								</div>

							</div>



							<hr>





						</div>

						<div class="card-header">
							<h4 class="card-title">Experiências Profissionais</h4><br>
						</div>

						<div class="card-body" style="text-align: left">

							<div class="row">
								<?php

								$select_dadosProf = "SELECT COUNT(*) as dados_profissionais FROM bd_emprega_aruja.tb_dados_profissionais where id_solicitante = '$id_solicitante'";

								foreach ($pdo->query($select_dadosProf) as $dados_prof) {
									$count_dados	=	$dados_prof['dados_profissionais'];
								}

								if ($count_dados == '0') {

									echo '<div class="col-md-5 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<p>Não possui experiências anteriores</p>';
									echo '</div>';
									echo '</div>';
								} else {

									foreach ($pdo->query($select_ex_profissionais) as $ex_profissionais) {

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>NOME DA EMPRESA</h6>';
										echo '<p class="text-muted">' . $ex_profissionais["nome_empresa"] . '</p>';
										echo '</div>';
										echo '</div>';

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>CARGO</h6>';
										echo '<p class="text-muted">' . $ex_profissionais['area_de_atuacao'] . '</p>';
										echo '</div>';
										echo '</div>';

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>SALÁRIO</h6>';
										echo '<p class="text-muted">' . $ex_profissionais['salario'] . '</p>';
										echo '</div>';
										echo '</div>';

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>NÍVEL HIERÁRQUICO</h6>';
										echo '<p class="text-muted">' . $ex_profissionais['nivel_hierarquico'] . '</p>';
										echo '</div>';
										echo '</div>';

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>ÁREA DE ATUAÇÃO</h6>';
										echo '<p class="text-muted">' . $ex_profissionais['area_de_atuacao'] . '</p>';
										echo '</div>';
										echo '</div>';

										// echo '<div class="col-md-4 pl-1">';
										// 	echo '<div class="form-group typography-line">';
										// 		echo '<h6>ESPECIALIZAÇÃO</h6>';
										// 		echo '<p class="text-muted">'.$ex_profissionais ['especializacao'].'</p>';
										// 	echo '</div>';
										// echo '</div>';

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>DATA DE INÍCIO</h6>';
										echo '<p class="text-muted">' . $ex_profissionais['inicio_mes'] . ' / ' . $ex_profissionais['inicio_ano'] . '</p>';
										echo '</div>';
										echo '</div>';

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>DATA DE CONCLUSÃO</h6>';
										if ($ex_profissionais['conclusao_mes'] != '') {
											echo '<p class="text-muted">' . $ex_profissionais['conclusao_mes'] . ' / ' . $ex_profissionais['conclusao_ano'] . '</p>';
										} else {
											echo "Atual";
										}
										echo '</div>';
										echo '</div>';

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>ATUALIDADE</h6>';
										if ($ex_profissionais['atualiadade'] != '') {
											echo '<p class="text-muted">' . $ex_profissionais['atualiadade'] . '</p>';
										} else {
											echo "Não";
										}

										echo '</div>';
										echo '</div>';

										echo '<div class="col-md-4 pl-1">';
										echo '<div class="form-group typography-line">';
										echo '<h6>EXPERIÊNCIA COMPROVADA EM CARTEIRA</h6>';
										if ($ex_profissionais['exp_comprovada'] != '') {
											echo '<p class="text-muted">' . $ex_profissionais['exp_comprovada'] . '</p>';
										} else {
											echo "...";
										}

										echo '</div>';
										echo '</div>';

										echo '<div class="col-md-12 pl-1">';
										echo '<div class="form-group col-md-12 text-center">';
										echo '<h6>DESCRIÇÃO DAS ATIVIDADES</h6>';
										echo '<p class="text-muted">' . $ex_profissionais['descricao_da_atividade'] . '</p><br><br>';
										echo '</div>';
										echo '</div>';
									}
								}

								?>
							</div>

							<hr>
						</div>

						<div class="card-header">
							<h4 class="card-title">Objetivos Profissionais</h4><br>
						</div>

						<div class="card-body" style="text-align: left">

							<div class="row">
								<?php

								foreach ($pdo->query($select_objprofissional) as $objprofissional) {

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>JORNADA</h6>';
									echo '<p class="text-muted">' . $objprofissional["jornada"] . '</p>';
									echo '</div>';
									echo '</div>';

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>TIPO DE CONTRATO</h6>';
									echo '<p class="text-muted">' . $objprofissional['tipo_contrato'] . '</p>';
									echo '</div>';
									echo '</div>';

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>PROFISSAO DESEJADA</h6>';
									echo '<p class="text-muted">' . $objprofissional['area_desejada'] . '</p>';
									echo '</div>';
									echo '</div>';

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>HIERARQUIA MÍNIMA</h6>';
									echo '<p class="text-muted">' . $objprofissional['nivel_hierarquico_minimo'] . '</p>';
									echo '</div>';
									echo '</div>';

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>HIERARQUIA MÁXIMA</h6>';
									echo '<p class="text-muted">' . $objprofissional['nivel_hierarquico_maximo'] . '</p>';
									echo '</div>';
									echo '</div>';

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>PRETENSÃO MÍNIMA</h6>';
									echo '<p class="text-muted">' . $objprofissional['pretensao_minima'] . '</p>';
									echo '</div>';
									echo '</div>';

									echo '<div class="col-md-4 pl-1">';
									echo '<div class="form-group typography-line">';
									echo '<h6>PRETENSÃO MÁXIMA</h6>';
									echo '<p class="text-muted">' . $objprofissional['pretensao_maxima'] . '</p>';
									echo '</div>';
									echo '</div>';
								}
								?>

							</div>
							<hr>
						</div>

						<div class="card-header">
							<h4 class="card-title">Extra Curriculares</h4><br>
						</div>
						<div class="card-body" style="text-align: left">
							<div class="row">
								<div class="col-md-4 pl-1">
									<div class="form-group typography-line">
										<h6>Habilitado</h6>
										<p class="text-muted"><?php if (empty($habilitado)) {
																	echo "Não";
																} else {
																	echo $habilitado;
																}  ?></p>
									</div>
								</div>
								<div class="col-md-4 pl-1">
									<div class="form-group typography-line">
										<h6>Tipo Habilitacao</h6>
										<p class="text-muted"><?php if (empty($tipo_habilitacao)) {
																	echo "...";
																} else {
																	echo $tipo_habilitacao;
																}  ?></p>
									</div>
								</div>
								<div class="col-md-4 pl-1">
									<div class="form-group typography-line">
										<h6>Veículo Próprio</h6>
										<p class="text-muted"><?php if (empty($veiculo_proprio)) {
																	echo "Não";
																} else {
																	echo $veiculo_proprio;
																}  ?></p>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4 pl-1">
									<div class="form-group typography-line">
										<h6>Disponibilidade Para Viajar</h6>
										<p class="text-muted"><?php if (empty($disponibilidade_viajar)) {
																	echo "Não";
																} else {
																	echo $disponibilidade_viajar;
																}  ?></p>
									</div>
								</div>
								<div class="col-md-4 pl-1">
									<div class="form-group typography-line">
										<h6>Disponibilidade Para Mudar</h6>
										<p class="text-muted"><?php if (empty($disponibilidade_mudar)) {
																	echo "Não";
																} else {
																	echo $disponibilidade_mudar;
																}  ?></p>
									</div>
								</div>
								<div class="col-md-4 pl-1"></div>
							</div>

							<!-- <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                                </div>
                                            </div>
                                        </div>-->
							<input type="hidden" name="cpf" value="<?php echo $cpf; ?>" />
							<button type="submit" class="btn btn-info btn-fill pull-right cursor" title="Visualizar Currículo em PDF">Visualizar PDF</button>
							<div class="clearfix"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card card-user">
						<div class="card-image">
							<img src="./../imagens/backgroundedit.jpg" alt="...">
						</div>
						<div class="card-body">
							<div class="author">

								<img class="avatar border-gray" src="<?php if (empty($tratado)) {
																			echo './imagens/perfil.jpg';
																		} else {
																			echo $tratado;
																		} ?>" alt="...">
								<h5 class="title" style="color: #1dc7ea;"><?php
																			if (empty($nome)) {

																				echo "...";
																			} elseif (($sexo == "Homem Transgênero") || ($sexo == "Mulher Transgênero")) {

																				echo $nome . "<br>&nbsp;&nbsp;<i class='fas fa-transgender-alt' style='font-size:24px; color:#a366ff'></i>";

																				if ($possui_deficiencia == "Sim") {
																					echo "&nbsp;&nbsp;<i class='fa fa-wheelchair' style='font-size:24px; color:#244E98'></i>";
																				}
																			} elseif ($sexo == "Homem Transexual") {

																				echo $nome . "<br>&nbsp;&nbsp;<i class='fas fa-mars-double' style='font-size:24px; color:#a366ff'></i>";

																				if ($possui_deficiencia == "Sim") {
																					echo "&nbsp;&nbsp;<i class='fa fa-wheelchair' style='font-size:24px; color:#244E98'></i>";
																				}
																			} elseif ($sexo == "Mulher Transexual") {

																				echo $nome . "<br>&nbsp;&nbsp;<i class='fas fa-venus-double' style='font-size:24px; color:#a366ff'></i>";

																				if ($possui_deficiencia == "Sim") {
																					echo "&nbsp;&nbsp;<i class='fa fa-wheelchair' style='font-size:24px; color:#244E98'></i>";
																				}
																			} else {

																				echo $nome;

																				if ($possui_deficiencia == "Sim") {
																					echo "&nbsp;&nbsp;<i class='fa fa-wheelchair' style='font-size:24px; color:#244E98'></i>";
																				}
																			}

																			?></h5>

							</div>
							<hr><br>
							<?php

							if (($sexo == "Homem Transgênero") || ($sexo == "Mulher Transgênero") || ($sexo == "Homem Transexual") || ($sexo == "Mulher Transexual")) {

								echo '<h6>Nome Usual</h6>
												<p class="text-muted">' . $nome_usual . '</p>';
							}

							?>
							<h6>DATA DE NASCIMENTO</h6>
							<p class="text-muted"><?php if (empty($dtnasc)) {
														echo "...";
													} else {
														echo $dtnasc;
													}  ?></p>

							<h6>SEXO</h6>
							<p class="text-muted"><?php if (empty($sexo)) {
														echo "...";
													} else {
														echo $sexo;
													}  ?></p>

							<h6>EMAIL</h6>
							<p class="text-muted"><?php if (empty($email)) {
														echo "...";
													} else {
														echo $email;
													}  ?></p>

							<h6>CELULAR</h6>
							<p class="text-muted"><?php if (empty($celular)) {
														echo "...";
													} else {
														echo $celular;
													}  ?></p>

							<h6>TELEFONE</h6>
							<p class="text-muted"><?php if (empty($telefone)) {
														echo "...";
													} else {
														echo $telefone;
													}  ?></p>

							<h6>CEP</h6>
							<p class="text-muted"><?php if (empty($cep)) {
														echo "...";
													} else {
														echo $cep;
													}  ?></p>

							<h6>CIDADE / ESTADO</h6>
							<p class="text-muted"><?php if (empty($cidade)) {
														echo "...";
													} else {
														echo $cidade . " - " . $estado;
													}  ?></p>

							<h6>RUA</h6>
							<p class="text-muted"><?php if (empty($rua)) {
														echo "...";
													} else {
														echo $rua;
													}  ?></p>

							<h6>BAIRRO</h6>
							<p class="text-muted"><?php if (empty($bairro)) {
														echo "...";
													} else {
														echo $bairro;
													}  ?></p>

							<h6>NÚMERO</h6>
							<p class="text-muted"><?php if (empty($numero)) {
														echo "...";
													} else {
														echo $numero;
													}  ?></p>

							<h6>POSSUI DEFICIÊNCIA?</h6>
							<p class="text-muted"><?php if (empty($possui_deficiencia)) {
														echo "Não";
													} else {
														echo $possui_deficiencia;
													}  ?></p>

							<?php
							if (empty($deficiencia)) {
							} else {
								echo '<h6>QUAL?</h6>';
								echo '<p class="text-muted">' . $deficiencia . '</p>';
							}
							?>

							<?php
							if (empty($dados_deficiencia)) {
							} else {
								echo '<h6>DADOS DA DEFICIÊNCIA</h6>';
								echo '<p class="text-muted">' . $dados_deficiencia . '</p>';
							}
							?>


							<hr><br>
							<h6 class="text-center">RESUMO SOBRE VOCÊ</h6>
							<p class="description text-muted"><br>
								<?php if (empty($resumo)) {
									echo "...";
								} else {
									echo $resumo;
								}  ?>
							</p>
						</div>
						<hr>
						<div class="button-container mr-auto ml-auto text-center">

							<?php if (empty($facebook)) {
							} else {
								echo '<button href="#" class="btn btn-simple btn-link btn-icon"><a href="' . $facebook . '" target="_blank"><i class="fa fa-facebook-square"></i></a></button>';
							}  ?>


							<?php if (empty($linkedin)) {
							} else {
								echo '<button href="#" class="btn btn-simple btn-link btn-icon"><a href="' . $linkedin . '" target="_blank"><i class="fa fa-linkedin-square"></i></a></button>';
							}  ?>


							<?php if (empty($twitter)) {
							} else {
								echo '<button href="#" class="btn btn-simple btn-link btn-icon"><a href="' . $twitter . '" target="_blank"><i class="fa fa-twitter-square"></i></a></button>';
							}  ?>


							<?php if (empty($googleplus)) {
							} else {
								echo '<button href="#" class="btn btn-simple btn-link btn-icon"><a href="' . $googleplus . '" target="_blank"><i class="fa fa-google-plus-square"></i></a></button>';
							}  ?>


							<?php if (empty($youtube)) {
							} else {
								echo '<button href="#" class="btn btn-simple btn-link btn-icon"><a href="' . $youtube . '" target="_blank"><i class="fa fa-youtube-square"></i></a></button>';
							}  ?>


							<?php if (empty($instagram)) {
							} else {
								echo '<button href="#" class="btn btn-simple btn-link btn-icon"><a href="' . $instagram . '" target="_blank"><i class="fa fa-instagram"></i></a></button>';
							}  ?>


							<?php if (empty($blog)) {
							} else {
								echo '<button href="#" class="btn btn-simple btn-link btn-icon"><a href="' . $blog . '" target="_blank"><i class="fa fa-bold"></i></a></button>';
							}  ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>