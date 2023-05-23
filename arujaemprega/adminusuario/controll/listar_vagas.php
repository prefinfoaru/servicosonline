<?php include "./includes/topo_listar_vagas.php";

$select_candidatura = "SELECT a.id_vaga, a.id_solicitante, a.id_vaga, a.id_empresa, a.data_hora, b.id_vaga, b.titulo, b.descricao, b.status
FROM bd_emprega_aruja.tb_candidatura_vaga as a
INNER JOIN bd_emprega_aruja.tb_cadastro_vaga as b ON a.id_vaga = b.id_vaga where a.id_solicitante = '$id_solicitante'";




?>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg " color-on-scroll="100">
    <div class="container-fluid">
        <a class="navbar-brand" href="#pablo">Menu de Vagas </a>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>

    </div>
</nav>
<!-- End Navbar -->
<div class="content">

    <!-- DataTales Example -->
    <div class="card">
        <div class="card-header py-3" style="background-color:#E1E0E0">
            <h6 class="m-0 font-weight-bold text-default">Lista das vagas</h6>
        </div>
        <div class="card-body" style="box-shadow: none;">
            <div class="table-responsive" style="box-shadow: none;">
                <table class="table table-striped ; table-bordered" id="dataTable" width="100%" cellspacing="0"
                    style="box-shadow: none; font-size: 12px;">
                    <thead>

                        <tr>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;">Titulo da Vaga</th>
                            <th>Descrição da Vaga</th>
                            <th style="align: center;">Data da Candidatura</th>
                            <th style="align: center;">Status da Candidatura</th>
                            <th style="align: center;">Agenda</th>
                            <th style="align: center;">Status da Vaga</th>
                            <th style="align: center;">Vaga</th>


                        </tr>
                    </thead>

                    <tbody>

                        <?php

						foreach ($pdo->query($select_candidatura) as $candidatura) {
							$str 		= 	$candidatura['data_hora'];
							$data_str	= 	explode(' ', $str, 4);
							$data 		=	$data_str[0];
							$status		=	$candidatura['status'];
							$id_vaga	=	$candidatura['id_vaga'];

							//verifica se candidato foi aprovado ou reprovado
							$count_aprovado	=	"SELECT count(*) as id_solicitante FROM bd_emprega_aruja.tb_candidato_aprovado where id_solicitante = '$id_solicitante' and id_vaga = '$id_vaga' ";

							$count_reprovado	=	"SELECT count(*) as id_solicitante FROM bd_emprega_aruja.tb_candidato_reprovado where id_solicitante = '$id_solicitante' and id_vaga = '$id_vaga' ";

							foreach ($pdo->query($count_aprovado) as $row_countAprovado) {
								$aprovado	=	$row_countAprovado['id_solicitante'];
							}

							foreach ($pdo->query($count_reprovado) as $row_countReprovado) {
								$reprovado	=	$row_countReprovado['id_solicitante'];
							}

							echo '<tr>';
							echo '<td>' . $candidatura['id_vaga'] . '</td>';
							echo '<td>' . $candidatura['titulo'] . '</td>';
							echo '<td>' . limita_caracteres($candidatura['descricao'], 300) . '</td>';
							echo '<td>' . date('d/m/Y', strtotime($data)) . '</td>';

							if ($status == 1 || $status == 4) {

								if (($aprovado > 0) and ($reprovado == 0)) {
									echo '<td>Entrevista Agendada &nbsp;&nbsp;&nbsp;</td>';

									echo '<td style="text-align: center;">   <a data-toggle="modal"  data-target="#myModal1' . $id_solicitante . $id_vaga . '"><i class="far fa-calendar-alt cursor" title="Há entrevista agendada" style="color: #7ECB7B; font-size:20px"></i></td>';
								}

								if (($aprovado == 0) and ($reprovado == 0)) {
									echo '<td>Perfil Em Análise &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';


									echo '<td style="text-align: center;">     <i class="far fa-calendar" title="Em Análise" style="font-size:20px;"></i></td>';
								}

								if (($aprovado == 0) and ($reprovado > 0)) {
									echo '<td>Perfil Reprovado Para Vaga&nbsp; </td>';

									echo '<td style="text-align: center;">    <i class="far fa-calendar-times" title="Não há entrevista de emprego agendada para esta vaga" style="color: #F47679; font-size:20px;"></i></td>';
								}

								if ($status == 1) {
									echo '<td>Publicada</td>';
								} else if ($status == 4) {
									echo '<td>Pausada</td>';
								}

								echo "<td align='center'>";
								echo " <a href='?p=visualizar_vaga&id=" . $candidatura['id_vaga'] . "&cand=ok'> " . "
                                                        <i class='fas fa-eye' '></i>" . '</a>' .
									"</td>";
							} elseif ($status == 2) {

								echo '<td>Vaga Preenchida &nbsp;&nbsp;&nbsp;</td>';

								echo '<td style="text-align: center;"><i class="far fa-calendar-check" title="Esta vaga já foi encerrada" style="color: #F47679; font-size:20px"></i></td>';

								echo '<td>Encerrado</td>';
								echo "<td align='center'>";
								echo "<i class='fas fa-eye-slash' style='color:#F47679'></i></td>";
							} elseif ($status == 5) {

								echo '<td>Vaga Cancelada por Inatividade&nbsp;&nbsp;&nbsp;</td>';

								echo '<td style="text-align: center;"><i class="far fa-calendar-check" title="Esta vaga já foi encerrada" style="color: #F47679; font-size:20px"></i></td>';

								echo '<td>Encerrada por inatividade</td>';
								echo "<td align='center'>";
								echo "<i class='fas fa-eye-slash' style='color:#F47679'></i></td>";
							}

							echo '</tr>';

							include "./includes/modals/modal_dadosentrevista.php";
						}

						?>
                    </tbody>
                </table>
            </div><br><br>
            <a href="?p=buscar_vagas&?tpbusca=2&?buscar=0"><button type="button"
                    class="btn btn-warning btn-fill pull-center cursor" title="Voltar para lista de vagas">RETORNAR
                    TODAS AS VAGAS</button></a>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->


<?php
function limita_caracteres($texto, $limite, $quebra = false)
{
	$tamanho = strlen($texto);
	if ($tamanho <= $limite) { //Verifica se o tamanho do texto é menor ou igual ao limite
		$novo_texto = $texto;
	} else { // Se o tamanho do texto for maior que o limite
		if ($quebra == true) { // Verifica a opção de quebrar o texto
			$novo_texto = trim(substr($texto, 0, $limite)) . "...";
		} else { // Se não, corta $texto na última palavra antes do limite
			$ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o útlimo espaço antes de $limite
			$novo_texto = trim(substr($texto, 0, $ultimo_espaco)) . "..."; // Corta o $texto até a posição localizada
		}
	}
	return $novo_texto; // Retorna o valor formatado
}
?>