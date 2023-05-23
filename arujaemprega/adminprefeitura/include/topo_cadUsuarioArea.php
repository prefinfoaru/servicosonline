<?php

include '../data/banco.php';
$pdo  = Banco::conectar();

$data1 = $_POST['data1'];
$data2 = $_POST['data2'];
$cargo = $_POST['cargo'];
$sqlCargo = '';
if($cargo == 'Todos'){
    $sqlCargo = '1 ';
}elseif ($cargo != ''){
    $sqlCargo = 'b.area_de_atuacao as cargo = '.$cargo;

}

if ($data1 == '' && $data2 == '' && $cargo == 'Todos') {

    $query = "SELECT 
	DISTINCT b.area_de_atuacao as cargo,
	a.id_solicitante,
    a.nome,
    a.cpf,
    a.data_cadastro
    FROM bd_emprega_aruja.tb_cadastro_solicitante AS a
    INNER JOIN bd_emprega_aruja.tb_dados_profissionais AS b
    ON a.id_solicitante = b.id_solicitante";

}elseif ($data1 == '' && $data2 == '' && $cargo != 'Todos') {

    $query = "SELECT 
	DISTINCT b.area_de_atuacao as cargo,
	a.id_solicitante,
    a.nome,
    a.cpf,
    a.data_cadastro
    FROM bd_emprega_aruja.tb_cadastro_solicitante AS a
    INNER JOIN bd_emprega_aruja.tb_dados_profissionais AS b
    ON a.id_solicitante = b.id_solicitante
    WHERE b.area_de_atuacao = '$cargo'";

}elseif ($data1 != '' && $data2 == '' && $cargo == 'Todos') {

    $query = "SELECT 
	DISTINCT b.area_de_atuacao as cargo,
	a.id_solicitante,
    a.nome,
    a.cpf,
    a.data_cadastro
    FROM bd_emprega_aruja.tb_cadastro_solicitante AS a
    INNER JOIN bd_emprega_aruja.tb_dados_profissionais AS b
    ON a.id_solicitante = b.id_solicitante
    WHERE a.data_cadastro > '$data1 00:00:00'";

}elseif ($data1 != '' && $data2 == '' && $cargo != 'Todos') {

    $query = "SELECT 
	DISTINCT b.area_de_atuacao as cargo,
	a.id_solicitante,
    a.nome,
    a.cpf,
    a.data_cadastro
    FROM bd_emprega_aruja.tb_cadastro_solicitante AS a
    INNER JOIN bd_emprega_aruja.tb_dados_profissionais AS b
    ON a.id_solicitante = b.id_solicitante
    WHERE b.area_de_atuacao = '$cargo'
    AND a.data_cadastro > '$data1 00:00:00'";

}elseif ($data1 == '' && $data2 != '' && $cargo == 'Todos') {

    $query = "SELECT 
	DISTINCT b.area_de_atuacao as cargo,
	a.id_solicitante,
    a.nome,
    a.cpf,
    a.data_cadastro
    FROM bd_emprega_aruja.tb_cadastro_solicitante AS a
    INNER JOIN bd_emprega_aruja.tb_dados_profissionais AS b
    ON a.id_solicitante = b.id_solicitante
    WHERE a.data_cadastro < '$data2 23:59:00'";

}elseif ($data1 == '' && $data2 != '' && $cargo != 'Todos') {

    $query = "SELECT 
	DISTINCT b.area_de_atuacao as cargo,
	a.id_solicitante,
    a.nome,
    a.cpf,
    a.data_cadastro
    FROM bd_emprega_aruja.tb_cadastro_solicitante AS a
    INNER JOIN bd_emprega_aruja.tb_dados_profissionais AS b
    ON a.id_solicitante = b.id_solicitante
    WHERE b.area_de_atuacao = '$cargo' 
    AND a.data_cadastro < '$data2 23:59:00'";

}elseif ($data1 != '' && $data2 != '' && $cargo == 'Todos') {

    $query = "SELECT 
	DISTINCT b.area_de_atuacao as cargo,
	a.id_solicitante,
    a.nome,
    a.cpf,
    a.data_cadastro
    FROM bd_emprega_aruja.tb_cadastro_solicitante AS a
    INNER JOIN bd_emprega_aruja.tb_dados_profissionais AS b
    ON a.id_solicitante = b.id_solicitante
    WHERE a.data_cadastro BETWEEN '$data1 00:00:00' AND '$data2 23:59:00'";

}elseif ($data1 != '' && $data2 != '' && $cargo != 'Todos' ) {

    $query = "SELECT 
	DISTINCT b.area_de_atuacao as cargo,
	a.id_solicitante,
    a.nome,
    a.cpf,
    a.data_cadastro
    FROM bd_emprega_aruja.tb_cadastro_solicitante AS a
    INNER JOIN bd_emprega_aruja.tb_dados_profissionais AS b
    ON a.id_solicitante = b.id_solicitante
    WHERE b.area_de_atuacao = '$cargo'
    AND a.data_cadastro BETWEEN '$data1 00:00:00' AND '$data2 23:59:00'";

}