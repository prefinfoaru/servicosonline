<?php
$res = $_GET['r'];
?>

<script src="../../assets/js/sweetalert.js" type="text/javascript"></script>
<link href="../../assets/css/sweetalert.css" rel="stylesheet">

<link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">

<?php include "includes/topoRelatorios.php"; ?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />

<div class="row">
    <div class="col-md-12" align="right">
        <a href="cadCastracaoDash.php"><button type="button" class="btn btn-danger btn-sm">Voltar</button></a>
    </div>
    <div class="col-md-12"><br>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne" align="center">
                <h4 class="panel-title" style="line-height: 45px;"><i class="fa fa-file-text-o" style="font-size: 22px;"></i> &nbsp; RELATÓRIO DE CADASTROS </h4>
            </div><br>
            <div class="table-responsive" style="box-shadow: none;">
                <table class="table table-striped ; table-bordered" id="dataTable" width="100%" cellspacing="0" style="box-shadow: none; font-size: 12px;">


                    <?php if ($res == "solicitacoes") { ?>
                        <thead>
                            <tr>
                                <th></th>
                                <th>CPF do Responsável</th>
                                <th>Nome</th>
                                <th>Quantidade Solicitação</th>
                                <th>Data da Solicitação</th>
                                <th>Liberar</th>
                                <th>Negar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($pdo2->query($consulta) as $row) { ?>
                                <tr>
                                    <td><?= $row['id_solicitacao']; ?></td>
                                    <td><?= $row['cpf']; ?></td>
                                    <td><?= $row['nome']; ?></td>
                                    <td><?= $row['qnt_animais']; ?></td>
                                    <td><?= date('d-m-Y', strtotime($row['data_solicitacao'])); ?></td>
                                    <td style="text-align: center;"><i data-toggle="modal" data-target="#myModal<?= $row['id_solicitacao'] ?>"><?= $row['status'] == 0 && $row['status'] == 0 ? "<button class='btn btn-success btn-xs'>Liberar</button>" : "<i class='fa fa-ban'></i>" ?></i></td>
                                    <td style="text-align: center;"><i data-toggle="modal" data-target="#myModal1<?= $row['id_solicitacao'] ?>"> <?= $row['status'] == 0 ? "<button class='btn btn-success btn-xs'>Negar</button>" : "<i class='fa fa-ban'></i>" ?></i></td>
                                    <td><?php if ($row['status'] == 0) {
                                            echo "Aguardando Resposta";
                                        } elseif ($row['status'] == 1) {
                                            echo "Liberado";
                                        } elseif ($row['status'] == 2) {
                                            echo "Negado";
                                        } ?></td>
                                </tr>
                            <?php
                                include "includes/modalCadCastracao/modalLiberarSoli.php";
                                include "includes/modalCadCastracao/modalNegarSoli.php";
                            } ?>
                        </tbody>

                    <?php } elseif ($res == "confirmadas" || $res == "naoConfirmadas" || $res == "todosAgendamentos" || $res == "aguardandoConfirmacao") { ?>
                        <thead>
                            <tr>
                                <th></th>
                                <th>CPF do Responsável</th>
                                <th>Email</th>
                                <th>Espécie</th>
                                <th>Data Presença</th>
                                <th>Hora Presença</th>

                                <?php if ($res != "todosAgendamentos") { ?>
                                    <th>Status</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($pdo2->query($consulta) as $row) { ?>
                                <tr>
                                    <td><?= $row['id_emailConfirma']; ?></td>
                                    <td><?= $row['cpf_responsavel']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['especie']; ?></td>
                                    <td><?= date('d-m-Y', strtotime($row['dataCastra'])); ?></td>
                                    <td><?= $row['horaCastra']; ?></td>
                                    <?php if ($res != "todosAgendamentos") { ?>
                                        <td><?= empty($row['confirmaPresenca']) ? "Aguardando Confirmação" : $row['confirmaPresenca'] ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>

                    <?php } else { ?>

                        <thead>
                            <tr>
                                <th></th>
                                <th>Nome do Pet</th>
                                <th>CPF do Responsável</th>
                                <th>Espécie</th>
                                <th>Raça</th>
                                <th>Status</th>
                                <th>Data</th>
                                <?php
                                if ($res == "aguardando") { ?>
                                    <th></th>
                                <?php } else {
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            foreach ($pdo2->query($consulta) as $row) { ?>
                                <tr>
                                    <td><?= $row['id_pet']; ?></td>
                                    <td><?= $row['nome']; ?></td>
                                    <td><?= $row['cpf_resp']; ?></td>
                                    <td><?= $row['especie']; ?></td>
                                    <td><?= $row['raca']; ?></td>
                                    <td><?php if ($row['status_castra'] == 1) {
                                            echo "Aguardando"; ?>
                                            <button class="btn btn-xs btn-default"><i data-toggle="modal" data-target="#myModal<?= $row['id_pet'] ?>">Dar baixa</i></button>
                                        <?php } elseif ($row['status_castra'] == 1) {
                                            echo "Aguardando"; ?>
                                            <button class="btn btn-xs btn-default"><i data-toggle="modal" data-target="#myModal<?= $row['id_pet'] ?>">Dar baixa</i></button>
                                        <?php } else {
                                            echo "Castrado";
                                        } ?>
                                    </td>
                                    <td><?= date('d-m-Y', strtotime($row['data_cad'])); ?></td>
                                    <?php
                                    if ($res == "aguardando") { ?>
                                        <td align="center">
                                            <?php if ($row['status_email'] == 0) { ?>
                                                <button class="btn btn-xs btn-default"><i data-toggle="modal" data-target="#myModal1<?= $row['id_pet'] ?>">Enviar Email</i></button>
                                            <?php } else { ?>
                                                <i>Email Enviado</i>
                                            <?php } ?>
                                        </td>
                                    <?php } else {
                                    }
                                    ?>
                                </tr>

                            <?php
                                include "includes/modalCadCastracao/modalCastrarCad.php";
                                include "includes/modalCadCastracao/modalEmailCad.php";
                            } ?>

                        </tbody>

                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
<br>

<script src="../vendor/datatables/jquery.dataTables.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js" defer></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js" defer></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js" defer></script>
<script src="../assets/js/datatable.js" type="text/javascript" defer></script>