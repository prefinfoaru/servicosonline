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
$sql8 = "SELECT * FROM bd_sol_hr.tb_movimentacao_sec where protocolo_sol = '$protocolo'";
$sql9 = "SELECT * FROM bd_sol_hr.tb_movimentacao where protocolo_sol = '$protocolo'";



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
    $data_status = $row['tb_data_status'];
    $tipoHr = $row['tb_calculo'];
  
}

	foreach ($pdo->query($sql) as $row) {
			$departamento = $row['tb_departamento_funcionario'];
			foreach ($pdo->query($sql2) as $row2) {
				if ($row['tb_situacao'] == $row2['id_situacao']) {

					$row['situacao'] = $row2['descricao'];
				}
			}

    }


foreach ($pdo->query($sql8) as $rowM) {
		    $atualSec = $rowM['secretaria_atual'];
			$dataMov = $rowM['datamov'];
          $secMov  = $rowM['secretaria_mov'];
          $motivoobs  = $rowM['obs'];

}
foreach ($pdo->query($sql9) as $rowR) {
		    $datR = $rowR['datamov'];
            $obsR  = $rowR['obs'];
			
}

