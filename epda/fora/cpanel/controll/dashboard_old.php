<?php

include "../includes/variaveissessao.php";


?>
<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet" />
<link href="css/listar.css" rel="stylesheet" />
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<script type="text/javascript">
    $(document).ready(function()) {
        setTimeout(() => {
            window.location.reload(1);
        }, 5000);
    }
</script>

<meta charset="utf-8"><br>
<strong style="color: #4C4C4C">ACOMPANHE SUAS SOLICITAÇÕES</strong><br><br>




<table class="table table-striped ; table-bordered" style="margin-left: -50px" id="myList">
    <thead id="menu">
        <tr style="font-size: 13px">
            <!--  <th style="text-align: center;">Id</th> -->
            <th style="text-align: center;">Protocolo</th>
            <th style="text-align: center;">Funcionário</th>
            <th style="text-align: center;">Data da Solicitação</th>
            <th style="text-align: center;">Status</th>



        </tr>
    </thead>
    <tbody style="font-size: 12px;">
        <?php

        include 'conexao.php';

        $pdo  = Banco::conectar();
        $sql  = "SELECT *FROM ged_educ.bd_solicitacao where matricula = '$_SESSION[matricula]' order by data_solicitacao Limit 6";
        $sql2 = "SELECT * FROM ged_educ.bd_situacao_solicitacao";
        $sql3 = "SELECT * FROM ged_educ.bd_intercorrencia";

        foreach ($pdo->query($sql) as $row) {

            foreach ($pdo->query($sql2) as $row2) {
                if ($row['situacao'] == $row2['id_situacao']) {

                    $row['situacao'] = $row2['descricao'];
                }
            }

            foreach ($pdo->query($sql3) as $row3) {
                if ($row['id_cod_inter'] == $row3['id_inter']) {

                    $row['id_cod_inter'] = $row3['descricao'];
                }
            }


            echo '<td style="text-align: center;">'                                    . $row['numprotocolo']                             . '</td>';
            echo '<td style="text-align: center;">'                                    . $row['id_cod_inter']                             . '</td>';
            echo '<td style="text-align: center;">'                                    . $row['data_intercorrencia']                     . '</td>';
            echo '<td style="text-align: center;">'                                    . $row['situacao']                                 . '</td>';


            echo '<tr>';
        }
        ?>
</table>