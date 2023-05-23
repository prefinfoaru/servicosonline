<?php
$URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('id=', $URL_ATUAL, 2);
$protocolo = $numprot[1];
$data_movimetacao = date("Y-m-d H:i:s");

$pdo = Banco::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT *FROM bd_sol_hr.tb_solicitacao where tb_numprotocolo ='$protocolo'";
$sql2 = "SELECT * FROM bd_sol_hr.tb_situacao_solicitacao";

$sql4 = "SELECT * FROM bd_sol_hr.tb_cadastro_de_usuarios;";

//	$sql6 = "SELECT count(*) as contador FROM bd_sol_hr.tb_solicitacao where tb_data_recebimento is null and tb_id_usuario_recebimento is null and `tb_numprotocolo`='$protocolo' ";
$sql7 = "SELECT * FROM bd_sol_hr.tb_secretarias;";
$sql8 = "SELECT * FROM bd_sol_hr.tb_movimentacao";



$q = $pdo->prepare($sql);
$q->execute(array($id));
$data = $q->fetch(PDO::FETCH_ASSOC);
Banco::desconectar();



foreach ($pdo->query($sql) as $row) {
	$nome     = $row['tb_nome_funcionario'];
	$funcao   = $row['tb_funcao_funcionario'];
	$secretaria   = $row['tb_secretaria_funcionario'];
	$dtsol  = $row['tb_data_solicitacao'];
	$protocolo  = $row['tb_numprotocolo'];
	$HRx  = $row['tb_v_estimativa'];
	$idf = $row['tb_id_funcionario'];
	$departamento = $row['tb_departamento_funcionario'];



	foreach ($pdo->query($sql2) as $row2) {
		if ($row['tb_situacao'] == $row2['id_situacao']) {

			$row['situacao'] = $row2['descricao'];
		}
	}


	foreach ($pdo->query($sql4) as $row4) {
		if ($row['tb_id_solicitante'] == $row4['id_cad_user']) {


			$email  = $row4['email'];
		}
	}

	$dep  = $departamento = $row['tb_departamento_funcionario'];
}
$sqltotalhrs =  "SELECT sum(cast(replace(tb_hr_solicitada, ',','.') as decimal(8,1))) as soma FROM bd_sol_hr.tb_solicitacao  where tb_id_funcionario = '$idf' and tb_situacao = '2' ;";
foreach ($pdo->query($sqltotalhrs) as $rowt) {

	if ($rowt['soma'] == "" or $rowt['soma'] == 'nulo') {
		$qts     = 0;
	} else
		$qts     = $rowt['soma'];
}
$sqltotalhrsTotal =  "SELECT sum(tb_v_estimativa) as valor FROM bd_sol_hr.tb_solicitacao where tb_id_funcionario = '$idf' and tb_situacao = '2';";
foreach ($pdo->query($sqltotalhrsTotal) as $rowto) {

	if ($rowto['valor'] == "" or $rowto['valor'] == 'nulo') {
		$qtsT     = '0,00';
	} else
		$qtsT     = round($rowto['valor'], 2);
}





