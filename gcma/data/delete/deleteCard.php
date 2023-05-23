<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('../banco.php');
$pdo = Banco2::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['cod'];

$delete = $pdo->prepare("DELETE FROM `bd_gcma`.`tb_card` WHERE `id`='$id'");

$delete->execute();

if ($delete->rowCount() > 0) {
    header('Location: ../../card.php');
} else {
    header('Location: ../../card.php?res=2');
}
