<style>
	.cursor {
		cursor: pointer;
	}
</style>
<?php
@$sigla = $_SESSION["sigla"];
$tipo = $_GET['tipo'];
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="main-panel">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg " color-on-scroll="100">
		<div class="container-fluid">
			<a class="navbar-brand" href="#pablo">Menu Listar Vagas</a>
			<button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-bar burger-lines"></span>
				<span class="navbar-toggler-bar burger-lines"></span>
				<span class="navbar-toggler-bar burger-lines"></span>
			</button>
			<?php echo $sigla == "empresa" ? "" : $sigla; ?>
		</div>
	</nav>
	<!-- End Navbar -->
	<!-- Navbar -->
	<script src="./assets/js/jsjs.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

	<!-- Custom styles for this template-->
	<link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />

	<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<div class="content">
		<!-- DataTales Example -->
		<div class="card">
			<div class="card-header py-3" style="background-color:#E1E0E0">
				<h6 class="m-0 font-weight-bold text-default">Lista das vagas</h6>
			</div>
			<div class="card-body" style="box-shadow: none;">
				<div class="table-responsive" style="box-shadow: none;">

					<table class="table table-striped ; table-bordered" id="dataTable" width="100%" cellspacing="0" style="box-shadow: none; font-size: 12px;">
						<thead>
							<tr>
								<th></th>
								<th>Titulo</th>
								<th>Profissão</th>
								<th>Cargo</th>
								<th>Status</th>
								<th>Data de inclusão</th>
								<th>Dias para Expirar</th>
								<th>Ver Canditados</th>
								<th>Visualizar Vaga</th>
								<th>Editar</th>
								<th>Excluir</th>
								<th>Baixar Vaga</th>
								<th>Disponibilizar Vaga para Candidatos</th>
								<th>Suspender / Reativar Vaga</th>
								<th>Prorrogar tempo da Vaga</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include './data/banco.php';
							$pdo  = Banco::conectar();
							$limiteDias = 30;
							$iduser = $_SESSION['iduser'];
							if ($tipo == "andamento") {
								$sql          = "SELECT * FROM tb_cadastro_vaga where id_empresa= '$iduser' and sigla = '$sigla' and excluida is null and (status < 2 or status = 3 or status = 4) ORDER BY id_vaga DESC";
							} else {
								$sql          = "SELECT * FROM tb_cadastro_vaga where id_empresa= '$iduser' and sigla = '$sigla' and excluida is null and (status = 2 or status = 5) ORDER BY id_vaga DESC";
							}
							$exec = $pdo->query($sql);


							while ($row_transacoes = $exec->fetch(PDO::FETCH_ASSOC)) {

								$id_vaga = $row_transacoes['id_vaga'];

								$verficacando  = "SELECT count(*) as candidaturas FROM bd_emprega_aruja.tb_candidatura_vaga where id_vaga = '$row_transacoes[id_vaga]' ";

								$verfica = $pdo->query($verficacando);
								while ($row_verficacando = $verfica->fetch(PDO::FETCH_ASSOC)) {
							?>
									<tr>
										<td><?php echo ($row_transacoes['id_vaga']); ?></td>
										<td><?php echo ($row_transacoes['titulo']); ?></td>
										<td><?php echo ($row_transacoes['profissao']); ?></td>
										<td><?php echo ($row_transacoes['hierarquia']); ?></td>
										<td>
											<?php
											if ($row_transacoes['status'] == 1) { ?>
												Publicada
											<?php
											} elseif ($row_transacoes['status'] == 2) { ?>
												Encerrada
											<?php
											} elseif ($row_transacoes['status'] == 4) { ?>
												Vaga Pausada
											<?php
											} elseif ($row_transacoes['status'] == 5) { ?>
												Vaga Expirada
											<?php
											} else { ?>
												Aguardando Liberação
											<?php
											}
											?>
										</td>
										<td><?php echo ($row_transacoes['data']); ?></td>
										<?php
										if ($row_transacoes['status'] == 1 || $row_transacoes['status'] == 4) { ?>
											<td> <?= $limiteDias - $row_transacoes['dias_vaga'] ?> dias restantes.</td>
										<?php
										} else { ?>
											<td align="center"><i class="fa fa-ban" title="Expirar a vaga"></i></td>
										<?php
										}
										?>
										<!-- <td><?php echo ($limiteDias - $row_transacoes['dias_vaga']); ?> dias restantes.</td> -->
							
										<?php
										// 1 significa que a vaga foi publicada
										if ($row_transacoes['status'] == 1) {

											echo "<td align='center'>";
											echo " <a href='?p=dadosCandidatos&id=$row_transacoes[id_vaga]'> " . "
                                                            <i class='fa fa-users' title='Vizualizar Candidatos'></i>" . '</a>' .
												"</td>";
												echo "<td align='center'><a href='?p=visualizar_vaga&id=$row_transacoes[id_vaga]'><i class='fas fa-eye'></i></a></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Editar Dados da Vaga'></i></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Deletar Vaga'></i></td>";
											echo "<td align='center'>";
										?>
											<a data-toggle='modal' data-target='#myModal3<?php echo $id_vaga ?> '>
												<i class='fa fa-check-square cursor' title='Baixar vaga' style="color: #235C26"></i></a>
											<?php
											echo "</td>";
											echo "<td align='center'><i class='fa fa-ban' title='Disponibilizar a Vaga'></i></td>";
											?>
											<td align="center">
												<a data-toggle='modal' data-target='#myModal5<?php echo $id_vaga ?> '>
													<i class='fa fa-check-square cursor' title='Pausar vaga' style="color: red;"></i></a>
											</td>
											<?php if ($row_transacoes['dias_vaga'] > 15 && $row_transacoes['vaga_prorrogada'] != 'Sim') {
											?>
												<td align='center'> <a data-toggle='modal' data-target='#myModal7<?php echo $id_vaga ?> '>
														<i class='fa fa-check-square cursor' title='Prorrogar' style="color: #235C26"></i></a></td>
											<?php
											} else { ?>
												<td align='center'><i class='fa fa-ban' title='Prorrogar a Vaga'></i></td>
											<?php
											}
											?>
										<?php
										} elseif ($row_transacoes['status'] == 2) { /// 2 significa que a vaga foi baixada
											echo "<td align='center'><i class='fa fa-ban' title='Ver Candidatos'></i></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Visualizar Vagas'></i></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Editar Dados da Vaga'></i></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Deletar Vaga'></i></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Baixar Vaga'></i></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Disponibilizar a Vaga'></i></td>";
											echo "<td align='center'><i class='fa fa-ban'title='Pausar a Vaga'></i></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Prorrogar a Vaga'></i></td>";
										} elseif ($row_transacoes['status'] == 3) { // 3 significa que a vaga ainda não foi publicada e disponibilizada aos candidatos
											echo "<td align='center'><i class='fa fa-ban' title='Ver Candidatos'></i></td>";
											echo "<td align='center'><a href='?p=visualizar_vaga&id=$row_transacoes[id_vaga]'><i class='fas fa-eye'></i></a></td>";
											echo "<td align='center'>";
											echo " <a href='?p=menu_editarvagas&?id=$row_transacoes[id_vaga]'> " . "
														<i class='fa fa-pencil-square-o' title='Editar Dados da Vaga'></i>" . '</a>' .
												"</td>";
											echo "<td align='center'>";
										?>
											<a data-toggle='modal' data-target='#myModal1<?php echo $id_vaga ?> '>
												<i class='fa fa-trash cursor' title='Deletar Vaga'></i></a>
											<?php
											echo "</td>";

											echo "<td align='center'><i class='fa fa-ban' title='Baixar Vaga'></i></td>";
											echo "<td align='center'>";

											?>

											<a data-toggle='modal' data-target='#myModal4<?php echo $id_vaga ?> '>
												<i class='fa fa-check-square cursor' title='Disponibilizar a Vaga' style="color: #235C26"></i></a>

										<?php

											echo "</td>";

											echo "<td align='center'><i class='fa fa-ban'title='Pausar a Vaga'></i></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Prorrogar Vaga'></i></td>";
										} elseif ($row_transacoes['status'] == 4) { //  VAGA QUE FOI PAUSADA 
											echo "<td align='center'>";
											echo " <a href='?p=dadosCandidatos&id=$row_transacoes[id_vaga]'> " . "
                                                            <i class='fa fa-users' title='Vizualizar Candidatos'></i>" . '</a>' .
												"</td>";
												echo "<td align='center'><a href='?p=visualizar_vaga&id=$row_transacoes[id_vaga]'><i class='fas fa-eye'></i></a></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Editar Vaga'></i></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Deletar Vaga'></i></td>";
											echo "<td align='center'>";
										?>

											<a data-toggle='modal' data-target='#myModal3<?php echo $id_vaga ?> '>
												<i class='fa fa-check-square cursor' title='Baixar vaga' style="color: #235C26"></i></a>

											<?php
											echo "</td>";
											echo "<td align='center'><i class='fa fa-ban' title='Pausar Vaga'></i></td>";
											?>

											<td align="center">
												<a data-toggle='modal' data-target='#myModal6<?php echo $id_vaga ?> '>
													<i class='fa fa-check-square cursor' title='Despausar vaga' style="color: #235C26"></i></a>
											</td>
											<?php if ($row_transacoes['dias_vaga'] > 15 && $row_transacoes['vaga_prorrogada'] != 'Sim') {
											?>
												<td align='center'> <a data-toggle='modal' data-target='#myModal7<?php echo $id_vaga ?> '>
														<i class='fa fa-check-square cursor' title='Prorrogar' style="color: #235C26"></i></a></td>
											<?php
											} else { ?>
												<td align='center'><i class='fa fa-ban' title='Prorrogar a Vaga'></i></td>
											<?php
											}
											?>
										<?php } elseif ($row_transacoes['status'] == 5) {

											echo "<td align='center'><i class='fa fa-ban' title='Ver Candidatos'></i></td>";
											echo "<td align='center'><a href='?p=visualizar_vaga&id=$row_transacoes[id_vaga]'><i class='fas fa-eye'></i></a></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Editar Dados da Vaga'></i></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Deletar Vaga'></i></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Baixar Vaga'></i></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Disponibilizar a Vaga'></i></td>";
											echo "<td align='center'><i class='fa fa-ban'title='Pausar a Vaga'></i></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Prorrogar a Vaga'></i></td>";
										} else { // PARA DESPAUSAR A VAGA
											echo "<td align='center'>";
											echo " <a href='?p=dadosCandidatos&id=$row_transacoes[id_vaga]'> " . "
											<i class='fa fa-users' title='Vizualizar Candidatos'></i>" . '</a>' .
												"</td>";
												echo "<td align='center'><a href='?p=visualizar_vaga&id=$row_transacoes[id_vaga]'><i class='fas fa-eye'></i></a></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Editar Vaga'></i></td>";
											echo "<td align='center'><i class='fa fa-ban' title='Deletar Vaga'></i></td>";
											echo "<td align='center'>";
										?>

											<a data-toggle='modal' data-target='#myModal3<?php echo $id_vaga ?> '>
												<i class='fa fa-check-square cursor' title='Baixar vaga' style="color: #235C26"></i></a>

											<?php
											echo "</td>";
											?>
											<td align='center'><a href="?p=dadosAdicionaisVaga&vaga=<?php echo $id_vaga; ?>" class="btn btn-danger btn-sm" role="button">Continuar cadastro da vaga</a></td>
											<td align='center'><i class='fa fa-ban' title='Pausar a Vaga'></i></td>
											<td align='center'><i class='fa fa-ban' title='Prorrogar a Vaga'></i></td>


										<?php } ?>

									</tr>

							<?php
									include "./includes/modal_excluirVaga.php";
									include "./includes/modal_baixarVaga.php";
									include "./includes/modal_liberarvaga.php";
									include "./includes/modal_pausarvaga.php";
									include "./includes/modal_despausarvaga.php";
									include "./includes/modal_prorrogarVaga.php";
								}
							}

							?>
						</tbody>
					</table>
					<!-- Mini Modal -->

					<!-- /.container-fluid -->
				</div>
				<!-- End of Main Content -->
			</div>
			<!-- End of Content Wrapper -->
		</div>

		<?php
		include('./controll/mensagens/mensagens.php');
		?>


	</div>