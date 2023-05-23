<?php

include('../../data/banco.php');
$pdo = Banco2::conectar();

function busca($cpf, $pdo)
{
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    $stmt = $pdo->prepare(
        "SELECT * FROM bd_restrito.tb_usuariorestritos WHERE cpf = '$cpf';"
    );
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $dados = $stmt->fetch(PDO::FETCH_OBJ);
    }else {
        $dados = 0;
    }

    return json_encode($dados);
}

if (isset($_GET['cpf'])) {
    if (!empty($_GET['cpf'])) {
        echo busca($_GET['cpf'], $pdo);
    }
}
