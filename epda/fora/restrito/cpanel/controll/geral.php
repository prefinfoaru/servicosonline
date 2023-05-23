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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="./css/stylle.css">
    <title>Relatório Geral</title>
</head>
<style>
    .containerr {

        width: 1020px;
    }

    td {
        white-space: pre-wrap;

    }

    .form-control {
        min-height: 37px;
        width: 120px;
        float: right;
    }
</style>


<div class="container">

    <div align="center"><br>

        <label style="font-family: consolas">Relatório Geral <?php echo $data ?></label></div>
    <br>
    <div class="container">
        <?php
        $mes = $_POST['mes'];
        $ano = $_POST['ano'];
        $filtro = $_POST['filtro'];
        $datai = $ano . '-' . $mes . '-' . '01';
        $dataf = $ano . '-' . $mes . '-' . '31';

        if ($filtro == "todos") {
            $sql = $pdo->query("SELECT * FROM tb_solicitacao where tb_situacao <>1 AND tb_data_status between '$datai' AND '$dataf' ORDER BY tb_nome_funcionario ASC, tb_secretaria_funcionario ASC");
        } else {
            $sql = $pdo->query("SELECT * FROM tb_solicitacao where tb_situacao ='$filtro' AND tb_data_status between '$datai' AND '$dataf' ORDER BY tb_nome_funcionario ASC, tb_secretaria_funcionario ASC");
        }

        $sqltotal = $pdo->query("SELECT tb_secretaria_funcionario, COUNT(*) As Total
                FROM tb_solicitacao
                where tb_situacao <>1 AND tb_data_status between '$datai' AND '$dataf'");
        $total = $sqltotal->fetchAll();
        $sqlapv = $pdo->query("SELECT tb_secretaria_funcionario, COUNT(*) As Total
                FROM tb_solicitacao
                WHERE tb_situacao =2 AND tb_data_status between '$datai' AND '$dataf'");
        $apv = $sqlapv->fetchAll();
        $sqlneg = $pdo->query(" SELECT tb_secretaria_funcionario, COUNT(*) As Total
                FROM tb_solicitacao
                WHERE tb_situacao = 3 AND tb_data_status between '$datai' AND '$dataf'");
        $neg = $sqlneg->fetchAll();
        ?>

        <table class="table table-bordered">
            <thead>
                <tr style="background:#D3D2D2; text-align: center">
                    <th style="text-align: center">Total de Solicitações das Secretarias</th>
                    <th style="text-align: center">Aprovadas</th>
                    <th style="text-align: center">Negadas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if ($sql->rowCount() >= 1) {
                        echo '<tr style="font-size: 12px; text-align: center " >';
                        echo '<td title="' . $total[0]['Total'] . '">' . ($total[0]['Total'] > 0 ? $total[0]['Total'] : 0) . '</td>';
                        echo '<td title="' . $apv[0]['Total'] . '">' . ($apv[0]['Total'] > 0 ? $apv[0]['Total'] : 0) . '</td>';
                        echo '<td title="' . $neg[0]['Total'] . '">' . ($neg[0]['Total'] > 0 ? $neg[0]['Total'] : 0) . '</td>';
                    } else { ?>
                        <div align="center"><br>
                            <label style="font-family: consolas">Não há informação para este relatorio neste periodo</label></div>
                        <br>
                    <?php
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
                    <th style="text-align: center">Tipo HE</th>
                    <th style="text-align: center">QTD Horas</th>
                    <th style="text-align: center">Estimativa $</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    foreach ($sql as $row) {
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
                        echo '<td title="' . $row['tb_calculo'] . '">' . $row['tb_calculo'] . '</td>';
                        echo '<td title="' . $row['tb_hr_solicitada'] . '">' . $row['tb_hr_solicitada'] . '</td>';
                        echo '<td title="' . $row['tb_v_estimativa'] . '">R$' . $row['tb_v_estimativa'] . '</td>';
                    }
                    ?>
                </tr>
            </tbody>
        </table>
        <input type="button" class="form-control" name="imprimir" value="Imprimir" onclick="window.print();">
    </div>

    <body>

    </body>

</html>