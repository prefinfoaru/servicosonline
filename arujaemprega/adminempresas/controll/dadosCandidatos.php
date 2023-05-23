<script src="./assets/js/sweetalert.js" type="text/javascript"></script>
<link href="./assets/css/sweetalert.css" rel="stylesheet">

<?php
$idvaga = $_GET["id"];
$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('res=', $URL_ATUAL, 2);
$res_soli = explode('res_soli=', $URL_ATUAL, 2);

$date_atual = date("H:i:s");
$date_btn   = strtotime($date_atual);

if (isset($numprot[1])) {

    $res    =   $numprot[1];
} else {

    $res = "";
}
if (isset($res_soli[1])) {

    $res_soli    =   $res_soli[1];
} else {

    $res_soli = "";
}
if ($res == 1) { ?>

<script>
swal.fire({
    title: 'Candidato Aprovado!',
    icon: "success",
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=dadosCandidatos&id=<?php echo $idvaga ?>&res=0">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }

if ($res  == 2) { ?>

<script>
swal.fire({
    icon: 'error',
    title: 'Não foi possível aprovar este candidato!',
    html: '<p>Por favor, tente novamente.</p><hr><button  class="btn btn-default"><a style="color:#000" href="?p=dadosCandidatos&id=<?php echo $idvaga ?>&res=0">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }

if ($res == 3) { ?>

<script>
swal.fire({
    title: 'Candidato Reprovado!',
    icon: "info",
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=dadosCandidatos&id=<?php echo $idvaga ?>&res=0">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }

if ($res  == 4) { ?>

<script>
swal.fire({
    icon: 'error',
    title: 'Não foi possível reprovar este candidato!',
    html: '<p>Por favor, tente novamente.</p><hr><button  class="btn btn-default"><a style="color:#000" href="?p=dadosCandidatos&id=<?php echo $idvaga ?>&res=0">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }

if ($res  == 5) { ?>

<script>
swal.fire({
    icon: 'error',
    title: 'Este candidato já está aprovado. Obrigado!',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=dadosCandidatos&id=<?php echo $idvaga ?>&res=0">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }

if ($res_soli  == 1) { ?>

<script>
swal.fire({
    title: 'Solicitação Realizada!',
    icon: "success",
    html: '<p>Aguarde a resposta do PAT sobre a liberação da sala, obrigado.</p><hr><button  class="btn btn-default"><a style="color:#000" href="?p=dadosCandidatos&id=<?php echo $idvaga ?>&res=0">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }

if ($res_soli  == 2) { ?>

<script>
swal.fire({
    icon: 'error',
    title: 'Não foi possível solicitar a reserva!',
    html: '<p>Por favor, tente novamente.</p><hr><button  class="btn btn-default"><a style="color:#000" href="?p=dadosCandidatos&id=<?php echo $idvaga ?>&res=0">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  } ?>


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
            <a class="navbar-brand" href="#pablo">Lista de Candidatos da Vaga</a>
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

                            $sql1      = "SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga where id_vaga = '$idvaga' ";
                            $sql2      = "SELECT count(*) as quant_candidatura FROM bd_emprega_aruja.tb_candidatura_vaga where id_vaga = '$idvaga' ";
                            $sql3      = "SELECT count(*) as quant_candidatos FROM bd_emprega_aruja.tb_candidato_aprovado where id_vaga = '$idvaga'  ";
                            $sql4      = "SELECT * FROM bd_emprega_aruja.tb_reservasala where id_vaga = '$idvaga'  ";

                            $exec1 = $pdo->query($sql1);
                            $exec2 = $pdo->query($sql2);
                            $exec3 = $pdo->query($sql3);
                            $exec4 = $pdo->query($sql4);


                            // $count = $exec4->fetchColumn();

                            while ($row_transacoes4 = $exec4->fetch(PDO::FETCH_ASSOC)) {

                                $idvaga_res     = $row_transacoes4['id_vaga'];
                                $data_agenda    = $row_transacoes4['data_agenda'];
                                $status         = $row_transacoes4['status'];
                                $horario_inicio = $row_transacoes4['horario_inicio'];
                                $horario_fim    = $row_transacoes4['horario_fim'];
                                $data_agendada  = strtotime($data_agenda);
                            }
                            if (!isset($status)) {
                                $status         =  "vazio";
                                $data_agenda    =  "vazio";
                                $horario_inicio =  "vazio";
                                $horario_fim    =  "vazio";
                                $data_agendada  =  "vazio";
                            }

                            while ($row_transacoes1 = $exec1->fetch(PDO::FETCH_ASSOC)) {
                                while ($row_transacoes2 = $exec2->fetch(PDO::FETCH_ASSOC)) {
                                    while ($row_transacoes3 = $exec3->fetch(PDO::FETCH_ASSOC)) {

                            ?>

                            <h6 class="card-title"><b style="color: #0D4060">Nome da Vaga: </b><i
                                    style="color:#EC7678"><?php echo $row_transacoes1['titulo'] ?></i></h6>
                            <h6 class="card-title"><b style="color: #0D4060">Quantidade de Vagas:</b><i
                                    style="color:#EC7678"><?php echo $row_transacoes1['quantidade'] ?></i></h6>
                            <h6 class="card-title"><b style="color: #0D4060">quantidade de Candidatos:</b><i
                                    style="color:#EC7678"><?php echo $row_transacoes2['quant_candidatura'] ?></i></h6>
                            <h6 class="card-title"><b style="color: #0D4060">quantidade de Candidatos Aprovados:</b><i
                                    style="color:#EC7678"><?php echo $row_transacoes3['quant_candidatos'] ?></i></h6>
                            <hr>
                            <a href="?p=lista_aprovados&id=<?php echo $idvaga; ?>">
                                <h6>Acessar Lista de Candidatos aprovados para entrevista - <i class="fa fa-file-text"
                                        style="font-size:20px;color:#D86F57"
                                        title="Lista de aprovados para entrevista com horários e locais"></i></h6>
                            </a>

                            <?php

                                        if (($row_transacoes2['quant_candidatura'] > 0) && ((@$status > "1") || (@$status == "") || ($status == "1" && $data_agendada < $date_btn))) {
                                            echo '
										<div class="col-md-12" style="text-align: right">
											<a href="?p=solicitacaosala&id=' . $idvaga . '"><button class="btn btn-info" title="Reservar Sala De Entrevista do Arujá Emprega/PAT">Reservar Sala do Arujá Emprega / PAT</button></a>
										</div><br>';
                                        }
                                    }
                                }
                                $sigla      = $row_transacoes1['sigla'];
                                $hierarq    = $row_transacoes1['hierarquia'];
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
                    <h6 class="m-0 font-weight-bold text-default">Lista das candidatos</h6>
                </div>
                <div class="card-body" style="box-shadow: none;">
                    <div class="table-responsive" style="box-shadow: none;">
                        <table class="table table-striped ; table-bordered" id="dataTable" width="100%" cellspacing="0"
                            style="box-shadow: none; font-size: 12px;">
                            <thead>
                                <tr>

                                    <th>Nome do Candidato</th>
                                    <?= $sigla == "Sec_assistencia" && $hierarq == "Jovem Aprendiz" ? "<th>NIS</th>" : "" ?>
                                    <th>Data da Candidatura</th>
                                    <th>Celular</th>
                                    <th>Telefone</th>
                                    <th>cep</th>
                                    <th>bairro</th>
                                    <th>cidade</th>
                                    <th>Email</th>
                                    <th>SEXO</th>
                                    <th>VER CV</th>
                                    <th>APROVAR</th>
                                    <th>REPROVAR</th>
                                    <th>BAIXAR CV</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql      = "SELECT a.id_candidatura, a.status_candidatura, b.email, b.cep, b.bairro, b.cidade, b.sexo, b.celular, b.telefone, a.id_solicitante, b.id_solicitante, b.pis, 
                                a.id_vaga, c.id_vaga, a.id_empresa, a.data_hora, b.nome, b.cpf, c.titulo, c.quantidade, c.sigla, c.hierarquia, d.NIS FROM bd_emprega_aruja.tb_candidatura_vaga as a 
                                INNER JOIN bd_emprega_aruja.tb_cadastro_solicitante as b ON a.id_solicitante = b.id_solicitante 
                                INNER JOIN bd_emprega_aruja.tb_cadastro_vaga AS  c  ON a.id_vaga = c.id_vaga 
                                LEFT JOIN  bd_emprega_aruja.tb_nis as d  on   b.id_solicitante = d.id_solicitante 
                                where a.id_vaga = '$idvaga' and status_candidatura = '0' group by A.id_solicitante ORDER BY a.id_solicitante ASC;";
                                // $sql      = "SELECT a.id_candidatura, a.status_candidatura, b.email, b.cep, b.bairro, b.cidade, b.sexo, b.celular, b.telefone, a.id_solicitante, b.id_solicitante, b.pis, a.id_vaga, c.id_vaga, a.id_empresa, a.data_hora, b.nome, b.cpf, c.titulo, c.quantidade, c.sigla, c.hierarquia, d.NIS FROM bd_emprega_aruja.tb_candidatura_vaga as a INNER JOIN bd_emprega_aruja.tb_cadastro_solicitante as b INNER JOIN bd_emprega_aruja.tb_cadastro_vaga AS c INNER JOIN bd_emprega_aruja.tb_nis as d on a.id_solicitante = b.id_solicitante and a.id_vaga = c.id_vaga and b.id_solicitante = d.id_solicitante where a.id_vaga = '$idvaga' and status_candidatura = '0' group by d.id_solicitante ORDER BY a.id_solicitante ASC";
                                $exec = $pdo->query($sql);
                                $contador = 0;
                                while ($row_transacoes = $exec->fetch(PDO::FETCH_ASSOC)) {


                                ?>
                                <tr>

                                    <td><?php echo ($row_transacoes['nome']); ?></td>
                                    <?= $row_transacoes['sigla'] == "Sec_assistencia" && $row_transacoes['hierarquia'] == "Jovem Aprendiz" ? "<td>" . $row_transacoes['NIS'] . "</td>" : "" ?>
                                    <td><?php echo (date('d/m/Y', strtotime($row_transacoes['data_hora']))); ?></td>
                                    <td><?php echo ($row_transacoes['celular']); ?></td>
                                    <td><?php echo ($row_transacoes['telefone']); ?></td>
                                    <td><?php echo ($row_transacoes['cep']); ?></td>
                                    <td><?php echo ($row_transacoes['bairro']); ?></td>
                                    <td><?php echo ($row_transacoes['cidade']); ?></td>
                                    <td><?php echo ($row_transacoes['email']); ?></td>
                                    <td><?php echo ($row_transacoes['sexo']); ?></td>
                                    <?php $id_soli = $row_transacoes['id_solicitante'];
                                        $id_vaga = $row_transacoes['id_vaga'];

                                        echo "<td align='center'>";

                                        echo " <a href='?p=visualizar_cv&soli=$row_transacoes[id_solicitante]&idvaga=$idvaga' target='_blank'> " . "
                                                        <i style='color:  ; font-size:13px' class='fas fa-eye' title='Vizualizar currículo na tela'></i>" . '</a>';
                                        "</td>";

                                        echo "<td align='center'>";
                                        ?>
                                    <a data-toggle='modal' data-target='#myModal1<?php echo $id_soli ?>'>
                                        <i style='color: green ; font-size:13px' class='fas fa-user-check cursor'
                                            title='Menu de aprovação para entrevista da vaga, informando o mesmo via email e sistema'></i></a>
                                    <?php
                                        "</td>";

                                        echo "<td align='center'>";
                                        ?>
                                    <a data-toggle='modal' data-target='#myModal2<?php echo $id_soli ?>'>
                                        <i style='color: red; font-size:13px' class='fas fa-user-times cursor'
                                            title='Aqui você reprova o candidato para essa vaga'></i></a>
                                    <?php
                                        "</td>";

                                        echo "<td align='center'>";
                                        echo "<a href='?p=baixar_pdf&id=$row_transacoes[cpf]'> " . "
                                                    <i style='color: red ; font-size:13px'  class='far fa-file-pdf' title='Baixar o currículo do candidato em formato PDF'></i>" . '</a>' .
                                            "</td>";


                                        ?>

                                </tr>
                                <?php
                                    $contador += 1;
                                    include "./includes/modal_aprovarcandidato.php";
                                    include "./includes/modal_reprovarcandidato.php";
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