<?php
include    "./data/conexao.php";
include    "./data/banco.php";

$pdo =  Banco::conectar();

//Início dados grafico de estaticas de vagas
$vagaspre = "SELECT COUNT(*) FROM bd_emprega_aruja.tb_cadastro_vaga where status =0;";
$vagaspreexec = mysqli_query($conn, $vagaspre);
$vagaspretotal = mysqli_fetch_assoc($vagaspreexec);

$vagaslibe = "SELECT COUNT(*) FROM bd_emprega_aruja.tb_cadastro_vaga where status =1;";
$vagaslibexec = mysqli_query($conn, $vagaslibe);
$vagaslibetotal = mysqli_fetch_assoc($vagaslibexec);

$vagasexec = "SELECT COUNT(*) FROM bd_emprega_aruja.tb_cadastro_vaga where status =2;";
$vagasexecexec = mysqli_query($conn, $vagasexec);
$vagasexecetotal = mysqli_fetch_assoc($vagasexecexec);

$vagasaguar = "SELECT COUNT(*) FROM bd_emprega_aruja.tb_cadastro_vaga where status =3;";
$vagasaguarexec = mysqli_query($conn, $vagasaguar);
$vagasaguaretotal = mysqli_fetch_assoc($vagasaguarexec);

$vagasatotal = "SELECT COUNT(*) FROM bd_emprega_aruja.tb_cadastro_vaga where status between 0 and 3";
$vagastotalexec = mysqli_query($conn, $vagasatotal);
$vagastotal = mysqli_fetch_assoc($vagastotalexec);
//Fim dados grafico de estaticas de vagas


//Início dados Cadastro de Vagaspre
$vagasemp = "SELECT month(data) ,COUNT(*) FROM tb_cadastro_vaga where sigla='empresa' and year(data)=year(now())  group by month(data)";
$vagasempexec = $pdo->query($vagasemp);
$vagasemptotal = $vagasempexec->fetchAll();

$vagaspref = "SELECT month(data) ,COUNT(*) FROM tb_cadastro_vaga where sigla<>'empresa' and year(data)=year(now())  group by month(data)";
$vagasprefexec = $pdo->query($vagaspref);
$vagaspreftotal = $vagasprefexec->fetchAll();

$qnt_candidatos = "SELECT COUNT(id_solicitante) AS qnt_solicitante FROM bd_emprega_aruja.tb_cadastro_solicitante";
$qnt_candidatosexec = mysqli_query($conn, $qnt_candidatos);
$qnt_candidatostotal = mysqli_fetch_assoc($qnt_candidatosexec);

$qnt_empresa = "SELECT COUNT(id_cadastroempresa) AS qnt_empresa FROM bd_emprega_aruja.tb_cadastro_empresa";
$qnt_empresaexec = mysqli_query($conn, $qnt_empresa);
$qnt_empresatotal = mysqli_fetch_assoc($qnt_empresaexec);

$qnt_vaga = "SELECT COUNT(id_vaga) AS qnt_vaga FROM bd_emprega_aruja.tb_cadastro_vaga";
$qnt_vagaexec = mysqli_query($conn, $qnt_vaga);
$qnt_vagatotal = mysqli_fetch_assoc($qnt_vagaexec);

