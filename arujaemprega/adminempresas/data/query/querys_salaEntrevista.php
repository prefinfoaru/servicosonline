<?php 



$sql = "SELECT * FROM bd_emprega_aruja.tb_reservasala where id_empresa = '$idempresa' ";

$exec = $pdo->query($sql);

while ($row_transacoes = $exec->fetch(PDO::FETCH_ASSOC)) {  
	$status = $row_transacoes['status'];
}

$sql1 = "SELECT count(*) as quant_aprovados FROM bd_emprega_aruja.tb_reservasala where id_empresa = '$idempresa' and status = '1' ";
$sql2 = "SELECT count(*) as quant_aprovados FROM bd_emprega_aruja.tb_reservasala where id_empresa = '$idempresa' and status = '0' ";
$sql3 = "SELECT count(*) as quant_aprovados FROM bd_emprega_aruja.tb_reservasala where id_empresa = '$idempresa' and status = '2' ";

$exec1 = $pdo->query($sql1);
$exec2 = $pdo->query($sql2);
$exec3 = $pdo->query($sql3);

while ($row_transacoes1 = $exec1->fetch(PDO::FETCH_ASSOC)) {  
	$qnt_aprovados = $row_transacoes1['quant_aprovados'];
}
while ($row_transacoes2 = $exec2->fetch(PDO::FETCH_ASSOC)) {  
	$qnt_aguardando = $row_transacoes2['quant_aprovados'];
}
while ($row_transacoes3 = $exec3->fetch(PDO::FETCH_ASSOC)) {  
	$qnt_negado = $row_transacoes3['quant_aprovados'];
}
if($qnt_aprovados == ""){
	
	$qnt_aprovados = "0";
}
if($qnt_aguardando == ""){
	
	$qnt_aguardando = "0";
}
if($qnt_negado == ""){
	
	$qnt_negado = "0";
}





?>