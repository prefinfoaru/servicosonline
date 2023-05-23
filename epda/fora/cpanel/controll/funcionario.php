<?php
include 'conexao.php';

$pdo = Banco::conectar();
$data = date("Y");

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Relatório Geral</title>
</head>
<style>
    .containerr {

        width: 1020px;
    }

    td {
        white-space: pre-wrap;

    }
</style>


<div class="container">

    <div align="center"><br>

        <label style="font-family: consolas">Relatório por Funcionario <?php echo $data ?></label></div>
    <br>
    <div class="container">
        <?php
        $funcionario = $_POST['funcionario'];
        $mes = $_POST['mes'];
        $ano = $_POST['ano'];
        $datai = $ano . '-' . $mes . '-' . '01';
        $dataf = $ano . '-' . $mes . '-' . '31';

        $sql = "SELECT * FROM tb_solicitacao where tb_situacao <>1 AND tb_nome_funcionario = '$funcionario' AND tb_data_status between '$datai' AND '$dataf' ORDER BY tb_nome_funcionario ASC";
        $sqltotal = "SELECT tb_secretaria_funcionario, COUNT(*) As Total
                FROM tb_solicitacao
                where tb_situacao <>1 AND tb_nome_funcionario = '$funcionario' AND tb_data_status between '$datai' AND '$dataf'";
        $sqlapv = "SELECT tb_secretaria_funcionario, COUNT(*) As Total
                FROM tb_solicitacao
                WHERE tb_situacao = 2 AND tb_nome_funcionario = '$funcionario' AND tb_data_status between '$datai' AND '$dataf'";
        $sqlneg = " SELECT tb_secretaria_funcionario, COUNT(*) As Total
                FROM tb_solicitacao
                WHERE tb_situacao = 3 AND tb_nome_funcionario = '$funcionario' AND tb_data_status between '$datai' AND '$dataf'";

        ?>
        <div align="center"><br>
            <label style="font-family: consolas"><?php echo $secretaria ?></label></div>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr style="background:#D3D2D2; text-align: center">
                    <th style="text-align: center">Total de Solicitações do Funcionario</th>
                    <th style="text-align: center">Aprovadas</th>
                    <th style="text-align: center">Negadas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    foreach ($pdo->query($sqltotal) as $row) {
                        echo '<tr style="font-size: 12px; text-align: center " >';
                        echo '<td title="' . $row['Total'] . '">' . $row['Total']  . '</td>';
                    }
                    foreach ($pdo->query($sqlapv) as $row) {
                        echo '<td title="' . $row['Total'] . '">' . $row['Total'] . '</td>';
                    }
                    foreach ($pdo->query($sqlneg) as $row) {
                        echo '<td title="' . $row['Total'] . '">' . $row['Total']  . '</td>';
                    }
                    ?>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr style="background:#D3D2D2; text-align: center">
                    <th style="text-align: center">Nome do Solicitante</th>
                    <th style="text-align: center">Secretaria</th>
                    <th style="text-align: center">Matricula</th>
                    <th style="text-align: center">Data Solicitada</th>
                    <th style="text-align: center">Status</th>
                    <th style="text-align: center">Quantidade de Horas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr style="font-size: 12px; text-align: center " >';
                        echo '<td title="' . $row['tb_nome_funcionario'] . '">' . $row['tb_nome_funcionario'] . '</td>';
                        echo '<td title="' . $row['tb_secretaria_funcionario'] . '">' . $row['tb_secretaria_funcionario'] . '</td>';
                        echo '<td title="' . $row['tb_id_funcionario'] . '">' . $row['tb_id_funcionario'] . '</td>';
                        echo '<td title="' .  date('d/m/Y', strtotime($row['tb_data_status'])) . '">' . date('d/m/Y', strtotime($row['tb_data_status'])) . '</td>';
                        if ($row['tb_situacao'] == 1) {
                            echo ('<td title>Em Análise</td>');
                        } elseif ($row['tb_situacao'] == 2) {
                            echo ('<td title>Aprovado</td>');
                        } else {
                            echo ('<td title>Negado</td>');
                        }
                        echo '<td title="' . $row['tb_hr_solicitada'] . '">' . $row['tb_hr_solicitada'] . '</td>';
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>

    <body>

    </body>

</html>