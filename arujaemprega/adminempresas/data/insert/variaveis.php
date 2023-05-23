<?php
$titulo = addslashes($_POST['titulo']);
$profissao = addslashes($_POST['profissao']);
$cargo = addslashes($_POST['cargo']);
$descricao = addslashes($_POST['descricao']);
$periodo = $_POST['periodo'];
$combinar = $_POST['combinar'];
@$salario = $_POST['salario'];
$escolaridade = addslashes($_POST['escolaridade']);
$quantidade = $_POST['vagas'];
$cep = $_POST['cep'];
$endereco = addslashes($_POST['endereco']);
$numero = $_POST['numero'];
$numeroend = $_POST['numero'];
$cidade = addslashes($_POST['cidade']);
$bairro = addslashes($_POST['bairro']);
$estado = addslashes($_POST['estado']);
$complemento = addslashes($_POST['complemento']);
$def = $_POST['def'];
// $defselect = NULL;
// $defselect2 = NULL;

// $dados_def = NULL;
// $dados_def2 = NULL;

if ($combinar == "Sim") {
  $salario = "A Combinar";
} else {
  $salario = $salario;
}

isset($_POST['def2']) ? $def2 = $_POST['def2'] : $def2 = 'Não';

isset($_POST['defselect']) ? $defselect = $_POST['defselect'] : $defselect = '';


isset($_POST['defselect2']) ? $defselect2 = $_POST['defselect2'] : $defselect2 = '';



isset($_POST['dados_def']) ? $dados_def = $_POST['dados_def'] : $dados_def = '';


isset($_POST['dados_def2']) ? $dados_def2 = $_POST['dados_def2'] : $dados_def2 = '';



$identificador = $_POST['identificador'];

$sigla = $_POST['sigla'];
$data = date('Y-m-d H:i:s');
$anonimo = isset($_POST['anonimo']) == 'on' ? "true" : "false";
