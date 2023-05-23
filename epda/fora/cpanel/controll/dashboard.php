<?php

include "../includes/variaveissessao.php";


?>


<meta charset="utf-8"><br>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				<!-- Begin Page Content -->
				<div class="container-fluid">
					<!-- Page Heading -->
				


					<!-- DataTales Example -->
					<div class="card">
						<div class="card-header py-3" style="background-color:#E1E0E0">
							<h6 class="m-0 font-weight-bold text-default" >Lista das solitações</h6>
						</div>
						<div class="card-body" style="box-shadow: none;">
							<div class="table-responsive" style="box-shadow: none;">
								<table  class ="table table-striped ; table-bordered" id="dataTable" width="100%" cellspacing="0" style="box-shadow: none; font-size: 12px;" >
									<thead>
										<tr>
											<th>Protocolo</th>
											<th>Funcionário</th>
											<th>Data da Solicitação</th>
											<th>Status</th>
											<th>Detalhe</th>
                                            
										</tr>
									</thead>

									<tbody>
										<?php
										include 'conexao.php';
										$pdo  = Banco::conectar();
										$sql  = "SELECT * FROM bd_sol_hr.tb_solicitacao where tb_id_solicitante = $_SESSION[matricula]  ";
										$exec = $pdo->query($sql);
										while ($row_transacoes = $exec->fetch(PDO::FETCH_ASSOC)) {
										?>
											<tr>
												<td><?php echo ($row_transacoes['tb_numprotocolo']); ?></td>
												<td><?php echo ($row_transacoes['tb_nome_funcionario']); ?></td>
												<td><?php echo ($row_transacoes['tb_data_solicitacao']); ?></td>
												<td>
													<?php
													if ($row_transacoes['tb_situacao'] == 1) { ?>
														Em Análise
													<?php
													} elseif ($row_transacoes['tb_situacao'] == 2) { ?>
														Aprovado
													<?php
													} else { ?>
														Negado
													<?php
													}
        
													?>
												</td>
                                               <?php
                                                echo "<td align='center'>";

			echo " <a href='?p=dadosSolicitacao&?id=$row_transacoes[tb_numprotocolo]'> " . "
	
	
		 <img src='./../restrito/img/acessar.jpg'  width=18px' height='18px' title='Abrir'>" . '</a>' .

				//	 "<img src='../img/divisor.png'  width=1px' height='18px'>"."&nbsp;&nbsp;" .
				//"<img src='../img/setamovimenta.png'  width=18px' height='18px'>".

				"</td>";
                                                
                                                ?>
											</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
							<!-- /.container-fluid -->
						</div>
						<!-- End of Main Content -->

						<!-- Footer -->
						<footer class="sticky-footer ">
							<div class="container my-auto">
								<div class="copyright text-center my-auto">
									<span>Desenvolvimento Prefeitura de Arujá - CDS</span>
								</div>
							</div>
						</footer>
						<!-- End of Footer -->
					</div>
					<!-- End of Content Wrapper -->
				</div>
				<!-- End of Page Wrapper -->

</body>