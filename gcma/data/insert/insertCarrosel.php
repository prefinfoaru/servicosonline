<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('../banco.php');
$pdo = Banco2::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = $pdo->query("SELECT * FROM bd_gcma.tb_carrosel ORDER BY id DESC LIMIT 1");
$img = $sql->fetch();
$titulo = 'imagem' . $img['id'];

$imagem = $_FILES['imagem']['name'];

$extensao = strtolower(end(explode(".", substr($imagem, -5))));

if ($extensao == 'png' || $extensao == 'jpg' || $extensao == 'jpeg') {
    $uploaddir = '../../assets/img/carrosel/';
    $nomeArquivo = $titulo . '.' . $extensao;
    $tmpName = $_FILES['imagem']['tmp_name'];
    $uploadFile = $uploaddir . $nomeArquivo;
    $filePath = 'assets/img/carrosel/' . $nomeArquivo;
    move_uploaded_file($tmpName, $uploadFile);

    $insert = $pdo->prepare("INSERT INTO `bd_gcma`.`tb_carrosel` (`imagem`) VALUES ('$filePath');");

    $insert->execute();

    if ($insert->rowCount() > 0) {
        header('Location: ../../carrosel.php');
    } else {
        header('Location: ../../carrosel.php?res=2');
    }
} else {
    header('Location: ../../carrosel.php?res=3');
}
