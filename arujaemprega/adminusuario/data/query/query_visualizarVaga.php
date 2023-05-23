<?php 
include "./data/banco.php";
$pdo = Banco::conectar();

$id_vaga	=	$_GET['id'];
@$cand		=	$_GET['cand'];

$select_dadosVaga = "SELECT a.id_vaga, a.titulo, a.profissao, a.hierarquia, a.descricao, a.periodo, a.salario, a.escolaridade, a.quantidade, a.cep, a.endereco,
a.numero, a.complemento, a.cidade, a.bairro, a.estado, a.status, a.data, a.id_empresa, a.vaga_exclusiva_pcd, a.deficiencia_exc, a.dados_def_exc,
a.vaga_tambem_pcd, a.deficiencia_tbm, a.dados_def_tbm, a.id_indet_cad, a.anonimo, b.id_cadastroempresa, b.cnpjcpf, b.nome_fantasia, b.razao_social, c.id_vaga, c.id_vaga_adicionais, c.tempo_experiencia, 
c.idade, c.habilitacao, c.tipo_habilitacao, c.veiculo, c.viajar, c.mudar
FROM bd_emprega_aruja.tb_cadastro_vaga as a
INNER JOIN bd_emprega_aruja.tb_cadastro_empresa as b INNER JOIN bd_emprega_aruja.tb_cadastro_vaga_adicionais as c
ON a.id_empresa = b.id_cadastroempresa and a.id_vaga = c.id_vaga where a.id_vaga = '$id_vaga' and a.status = '1' ";

$cpf	=	$_SESSION['usuario'];

include "./data/for/for_visuVaga.php";











?>