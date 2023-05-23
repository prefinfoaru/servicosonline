<?php

session_start();
$optexperiencia = isset($_POST['optexperiencia']) ? $_POST['optexperiencia'] : null;
$optidade = isset($_POST['optidade']) ? $_POST['optidade'] : null;
$experiencia = isset($_POST['experiencia']) ? $_POST['experiencia'] : null;
$idade = isset($_POST['idade']) ? $_POST['idade'] : null;
$habilitacao = isset($_POST['habilitacao']) ? $_POST['habilitacao'] : null;
$tipohabilitacao = isset($_POST['categoria']) ? $_POST['categoria'] : null;
$veiculo = isset($_POST['veiculo']) ? $_POST['veiculo'] : null;
$viajar = isset($_POST['viajar']) ? $_POST['viajar'] : null;
$mudar = isset($_POST['mudar']) ? $_POST['mudar'] : null;
$id = ($_POST['idvaga']);
include('../banco.php');
if (isset($_POST['cadastrar'])) {
    if (empty($optexperiencia) || empty($optidade) || empty($habilitacao) || empty($veiculo) || empty($viajar) || empty($mudar)) {
        header("Location: ../../index.php?p=dadosAdicionaisVaga&id=$id");
        $_SESSION['msgadc'] = 0;
    } else {
        if ($optidade == 'Sim') {
            if (empty($idade)) {
                header("Location: ../../index.php?p=dadosAdicionaisVaga&id=$id");
                $_SESSION['msgadc'] = 0;
            }
        }
        if ($optexperiencia == 'Sim') {
            if (empty($experiencia) || $experiencia > 6) {
                header("Location: ../../index.php?p=dadosAdicionaisVaga&id=$id");
                $_SESSION['msgadc'] = 0;
            }
        }
        if ($tipohabilitacao == 'Sim') {
            if (empty($tipohabilitacao)) {
                header("Location: ../../index.php?p=dadosAdicionaisVaga&id=$id");
                $_SESSION['msgadc'] = 0;
            }
        }


        $pdo = Banco::conectar();
        $query_solicitacao =  "INSERT INTO `bd_emprega_aruja`.`tb_cadastro_vaga_adicionais` (`id_vaga`,`tempo_experiencia`,`idade`,`habilitacao`,`tipo_habilitacao`,`veiculo`,`viajar`,`mudar`) 
            VALUES ($id,'$experiencia','$idade','$habilitacao','$tipohabilitacao','$veiculo','$viajar','$mudar') ";

        //var_dump($query_solicitacao);
        $resultado_cadastro = $pdo->query($query_solicitacao);
        if ($pdo->lastInsertId()) {

            $query_update =  "UPDATE `bd_emprega_aruja`.`tb_cadastro_vaga` SET 
                `status`= 3 WHERE id_vaga=$id";
            $resultado_update = $pdo->query($query_update);
            if ($resultado_update) {
                header("Location: ../../index.php?p=dadosBeneficiosVaga&id=$id");
                $_SESSION['msgadc'] = 1;
            }
        } else {
            header("Location: ../../index.php?p=dadosAdicionaisVaga&id=$id");
            $_SESSION['msgadc'] = 0;
        }
    }
}
