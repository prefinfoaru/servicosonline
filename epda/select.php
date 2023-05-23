
<?php
include('cpanel/banco/conexao.php');

//busca a função. 
$pdo = Banco::conectar();

$sql = 'SELECT *FROM bd_spf.tb_funcoes;';
$sql2 = 'SELECT * FROM bd_spf.tb_carga_horaria'
?>