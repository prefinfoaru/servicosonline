<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

include "../banco.php";
$pdo = Banco2::conectar();

$usuario	= filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha 		= filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$sql = $pdo->query("SELECT * FROM bd_restrito.tb_usuariorestritos WHERE usuario = '$usuario'");
$row = $sql->fetch();

if (password_verify($senha, $row['senha'])) {
    $_SESSION['usuario']    = $row['usuario'];
    $_SESSION['ativo']      = $row['ativo'];

    header('Location: ../../restrito.php');
}else {
    header('Location: ../../login.php');
}
