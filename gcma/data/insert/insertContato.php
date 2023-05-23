<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('../banco.php');
$pdo = Banco2::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$nome           = $_POST['nome'];
$cidade         = $_POST['cidade'];
$whatsapp       = $_POST['whatsapp'];
$email          = $_POST['email'];
$mensagem       = $_POST['mensagem'];
$data_contato   = date("Y-m-d H:i:s");

$insert = $pdo->prepare(
    "INSERT INTO `bd_gcma`.`tb_contato` (`nome`, `cidade`, `whatsapp`, `email`, `mensagem`, `data_contato`) 
    VALUES ('$nome', '$cidade', '$whatsapp', '$email', '$mensagem', '$data_contato')"
);

$insert->execute();

if ($insert->rowCount() > 0) {
    header('Location: ../../contato.php?res=1');
} else {
    header('Location: ../../contato.php?res=2');
}
