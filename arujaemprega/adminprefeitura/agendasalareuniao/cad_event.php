<?php
session_start();

include_once './conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$titulo = utf8_decode($dados['title']);
$cor = $dados['color'];
//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
$data= str_replace('/', '-', $dados['data']);
$data_conv = date("Y-m-d", strtotime($data));


$horaini = $dados['horarioinicio'];
$horafim = $dados['horariofim'];
$res = utf8_decode($dados['responsavel']);
$sala = utf8_decode($dados['sala']);



$query = "INSERT INTO `bd_emprega_aruja`.`tb_reservasala` (`data_agenda`, `horario_inicio`, `horario_fim`, `nome_empresa`, `responsavel`, `sala`, `status`, `color`) VALUES ('$data_conv', '$horaini', '$horafim', '$titulo', '$res', '$sala', '1', '$cor');";

$insert = $conn->prepare($query);

if ($insert->execute()) {
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Cadastro realizado com sucesso!</div>';
           header("Location: ../?p=entrevista");
 } else {
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Não foi possivel cadastrar!</div>';
        header("Location: ../?p=entrevista");

 }

