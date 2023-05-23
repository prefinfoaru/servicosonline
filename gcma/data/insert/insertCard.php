<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('../banco.php');
$pdo = Banco2::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$icone      = $_POST['icone'];
$texto      = $_POST['texto'];
$optlink    = $_POST['optlink'];
$url        = $_POST['url'];

$insert = $pdo->prepare("INSERT INTO `bd_gcma`.`tb_card` (`texto`, `icone`, `possui_url`, `url`) VALUES ('$texto', '$icone', '$optlink', '$url');");

$insert->execute();

if ($insert->rowCount() > 0) {
    header('Location: ../../card.php');
} else {
    header('Location: ../../card.php?res=2');
}
