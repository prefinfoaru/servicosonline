
<?php $pdo  = Banco::conectar();


$SqlQuerySecretaria = "SELECT distinct(tb_secretaria_funcionario) FROM bd_sol_hr.tb_solicitacao ";
$SqlQueryDepartamento = "SELECT distinct(tb_departamento_funcionario) FROM bd_sol_hr.tb_solicitacao  WHERE tb_situacao <>1";
$SqlNomeFuncionario = "SELECT distinct(tb_nome_funcionario) FROM bd_sol_hr.tb_solicitacao WHERE tb_situacao <>1";



?>