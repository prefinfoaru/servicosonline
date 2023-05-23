<?php 
$idvaga = $_GET["id"];
?>


<meta https-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<link href="css/bootstrap-3.4.1.css" rel="stylesheet" type="text/css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="js/jquery-1.12.4.min.js"></script>

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<script src="js/bootstrap-3.4.1.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<![endif]-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />


<!-- Custom styles for this template-->
<link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />

<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<style>
.cursor {
    cursor: pointer;
}
</style>
<div class="main-panel">
    <!---conexão e querys  ---------------------------------------------------------------------------------------------------------------------------------------------->
    <?php
				  include './data/banco.php';
              ?>


    <!--- final conexão e querys  ------------------------------------------------------------------------------------------------------------------------------------->


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Aprovados Para Entrevista</a>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?php
									$idvaga = $_GET["id"];
									
									$sql1  	= "SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga where id_vaga = '$idvaga' ";
									$sql2  	= "SELECT count(*) as quant_candidatura FROM bd_emprega_aruja.tb_candidatura_vaga where id_vaga = '$idvaga'; ";
									$sql3  	= "SELECT count(*) as quant_candidatos FROM bd_emprega_aruja.tb_candidato_aprovado where id_vaga = '$idvaga'  ";
									
                                    $exec1 = $pdo->query($sql1);
                                    $exec2 = $pdo->query($sql2);
									$exec3 = $pdo->query($sql3);
									
									while ($row_transacoes1 = $exec1->fetch(PDO::FETCH_ASSOC)) {
									while ($row_transacoes2 = $exec2->fetch(PDO::FETCH_ASSOC)) {
									while ($row_transacoes3 = $exec3->fetch(PDO::FETCH_ASSOC)) {
										
									?>

                            <h6 class="card-title"><b style="color: #0D4060">Nome da Vaga: </b><i
                                    style="color:#EC7678"><?php echo $row_transacoes1['titulo'] ?></i></h6>
                            <h6 class="card-title"><b style="color: #0D4060">Quantidade de Vagas:</b><i
                                    style="color:#EC7678"><?php echo $row_transacoes1['quantidade'] ?></i></h6>
                            <h6 class="card-title"><b style="color: #0D4060">quantidade de Candidatos Aprovados:</b><i
                                    style="color:#EC7678"><?php echo $row_transacoes3['quant_candidatos'] ?></i></h6>
                            <hr>
                            <div class="col-md-12 text-right">

                                <a data-toggle="modal" data-target="#myModal1"><button type="button" name="Cadastrar"
                                        class="btn btn-warning btn-fill pull-right cursor" title="Consultar CPF">Gerar
                                        PDF</button></a>
                                <?php include "./includes/modal_gerarListaPDF.php"; ?>

                            </div>
                            <br><br>
                            <hr>

                            <?php
										}
										}
										}
									?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

                                    <th>Nome do Candidato</th>
                                    <th>Data da Candidatura</th>
                                    <th>Celular</th>
                                    <th>Telefone</th>
                                    <th>Email</th>
                                    <th>Data da Entrevista</th>
                                    <th>Horário da Entrevista</th>
                                    <th>Entrevistador</th>
                                    <th>VER CV</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
											
										$sql  	= "SELECT a.id_candidatura, a.status_candidatura, b.email, b.cep, b.bairro, b.cidade, b.sexo, b.celular, b.telefone, a.id_solicitante, b.id_solicitante, a.id_vaga, c.id_vaga, a.id_empresa, a.data_hora, b.nome, b.cpf, c.titulo, c.quantidade, d.data, d.hora, d.entrevistador FROM bd_emprega_aruja.tb_candidatura_vaga as a INNER JOIN bd_emprega_aruja.tb_cadastro_solicitante as b INNER JOIN bd_emprega_aruja.tb_cadastro_vaga AS c INNER JOIN bd_emprega_aruja.tb_candidato_aprovado as d on a.id_solicitante = b.id_solicitante and a.id_vaga = c.id_vaga and a.id_vaga = d.id_vaga and a.id_solicitante = d.id_solicitante where a.id_vaga = '$idvaga' and status_candidatura = '1' ORDER BY a.id_solicitante ASC ";
										
                                        $exec = $pdo->query($sql);
										
										while ($row_transacoes = $exec->fetch(PDO::FETCH_ASSOC)) {
											
										
										?>
                                <tr>

                                    <td><?php echo ($row_transacoes['nome']); ?></td>
                                    <td><?php echo (date('d/m/Y', strtotime($row_transacoes['data_hora']))	); ?></td>

                                    <td><?php echo ($row_transacoes['celular']); ?></td>
                                    <td><?php echo ($row_transacoes['telefone']); ?></td>
                                    <td><?php echo ($row_transacoes['email']); ?></td>
                                    <td><?php echo (date('d/m/Y', strtotime($row_transacoes['data']))	); ?></td>
                                    <td><?php echo ($row_transacoes['hora']); ?></td>
                                    <td><?php echo ($row_transacoes['entrevistador']); ?></td>

                                    <?php $id_soli = $row_transacoes['id_solicitante'] 	;
													  $id_vaga = $row_transacoes['id_vaga'] 		;
											
                                                    echo "<td align='center'>";
                                            
                                                    echo " <a href='?p=visualizar_cv&soli=$row_transacoes[id_solicitante]&idvaga=$idvaga' target='_blank'> " . "
                                                    <i style='color:  ; font-size:13px' class='fas fa-eye' title='Vizualizar currículo na tela'></i>" .'</a>'  ;
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
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->