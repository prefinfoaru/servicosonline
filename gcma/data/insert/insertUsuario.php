<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('../banco.php');
$pdo = Banco2::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$cpf        = $_POST['cpf'];
$cpf        = preg_replace('/[^0-9]/', '', $cpf);
$nome       = $_POST['nome'];
$email      = $_POST['email'];
$setor      = $_POST['setor'];
$funcao     = $_POST['funcao'];
$tel        = $_POST['tel'];
$cel        = $_POST['cel'];
$usuario    = $_POST['usuario'];
$senha1     = $_POST['senha'];
$senha2     = $_POST['senha_repetida'];
$data       = date('Y-m-d H:i:s');

$options = [
    'cost' => 12,
];

$senhaCript = password_hash("$senha1", PASSWORD_BCRYPT, $options);

$stmt = $pdo->prepare(
    "INSERT INTO `bd_restrito`.`tb_usuariorestritos` (`nome`, `email`, `senha`, `usuario`, `ativo`, `setor`, `cpf`, `funcao`, `tel`, `cel`, `data`) 
    VALUES (:nome, :email, :senha, :usuario, 1, :setor, :cpf, :funcao, :tel, :cel, :data);"
);

$stmt->bindValue(":nome", $nome);
$stmt->bindValue(":email", $email);
$stmt->bindValue(":senha", $senhaCript);
$stmt->bindValue(":usuario", $usuario);
$stmt->bindValue(":setor", $setor);
$stmt->bindValue(":cpf", $cpf);
$stmt->bindValue(":funcao", $funcao);
$stmt->bindValue(":tel", $tel);
$stmt->bindValue(":cel", $cel);
$stmt->bindValue(":data", $data);

$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../../cadusuario.php?res=1');
} else {
    header('Location: ../../cadusuario.php?res=2');
}
