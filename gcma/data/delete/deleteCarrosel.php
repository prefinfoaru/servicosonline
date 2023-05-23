<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('../banco.php');
$pdo = Banco2::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['cod'];

$img = $pdo->query("SELECT * FROM bd_gcma.tb_carrosel WHERE `id` = '$id'");
$file = $img->fetch();

$delete = $pdo->prepare("DELETE FROM `bd_gcma`.`tb_carrosel` WHERE `id`='$id'");

unlink('../../' . $file['imagem']);

$delete->execute();

if ($delete->rowCount() > 0) {
    header('Location: ../../carrosel.php');
} else {
    header('Location: ../../carrosel.php?res=2');
}
