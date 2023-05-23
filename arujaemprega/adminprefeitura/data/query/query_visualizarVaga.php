<?php 
include "./data/banco.php";
$pdo = Banco::conectar();

$id_vaga	=	$_GET['id'];


$select_dadosVaga = "SELECT a.id_vaga, a.titulo, a.profissao, a.hierarquia, a.descricao, a.periodo, a.salario, a.escolaridade, a.quantidade, a.cep, a.endereco,
a.numero, a.complemento, a.cidade, a.bairro, a.estado, a.status, a.data, a.id_empresa, a.vaga_exclusiva_pcd, a.deficiencia_exc, a.dados_def_exc,
a.vaga_tambem_pcd, a.deficiencia_tbm, a.dados_def_tbm, a.id_indet_cad,a.anonimo, b.id_cadastroempresa, b.cnpjcpf, b.nome_fantasia, b.razao_social, c.id_vaga, c.id_vaga_adicionais, c.tempo_experiencia, 
c.idade, c.habilitacao, c.tipo_habilitacao, c.veiculo, c.viajar, c.mudar
FROM bd_emprega_aruja.tb_cadastro_vaga as a
INNER JOIN bd_emprega_aruja.tb_cadastro_empresa as b INNER JOIN bd_emprega_aruja.tb_cadastro_vaga_adicionais as c
ON a.id_empresa = b.id_cadastroempresa and a.id_vaga = c.id_vaga where a.id_vaga = '$id_vaga' ";




foreach($pdo->query($select_dadosVaga)as $dadosVaga){
	$titulo					=	$dadosVaga ['titulo']				;
	$profissao				=	$dadosVaga ['profissao']			;
	$hierarquia				=	$dadosVaga ['hierarquia']			;
	$descricao				=	$dadosVaga ['descricao']			;
	$salario				=	$dadosVaga ['salario']				;
	$escolaridade			=	$dadosVaga ['escolaridade']			;
	$quantidade				=	$dadosVaga ['quantidade']			;
	$periodo				=	$dadosVaga ['periodo']				;
	$rua					=	$dadosVaga ['endereco']				;
	$numero					=	$dadosVaga ['numero']				;
	$complemento			=	$dadosVaga ['complemento']			;
	$bairro					=	$dadosVaga ['bairro']				;
	$cidade					=	$dadosVaga ['cidade']				;
	$estado					=	$dadosVaga ['estado']				;
	$bairro					=	$dadosVaga ['bairro']				;
	$id_empresa				=	$dadosVaga ['id_empresa']			;
	$cnpj					=	$dadosVaga ['cnpjcpf']				;
	$status					=	$dadosVaga ['status']				;
	$vaga_exclusiva_pcd		=	$dadosVaga ['vaga_exclusiva_pcd']	;
	$deficiencia_exc		=	$dadosVaga ['deficiencia_exc']		;
	$dados_def_exc			=	$dadosVaga ['dados_def_exc']		;
	$vaga_tambem_pcd		=	$dadosVaga ['vaga_tambem_pcd']		;
	$deficiencia_tbm		=	$dadosVaga ['deficiencia_tbm']		;
	$dados_def_tbm			=	$dadosVaga ['dados_def_tbm']		;
	$nome_fantasia			=	$dadosVaga ['nome_fantasia']		;
	$id_vaga_adicionais		=	$dadosVaga ['id_vaga_adicionais']	;
	$tempo_experiencia		=	$dadosVaga ['tempo_experiencia']	;
	$idade					=	$dadosVaga ['idade']				;
	$habilitacao			=	$dadosVaga ['habilitacao']			;
	$tipo_habilitacao		=	$dadosVaga ['tipo_habilitacao']		;
	$veiculo				=	$dadosVaga ['veiculo']				;
	$viajar					=	$dadosVaga ['viajar']				;
	$mudar					=	$dadosVaga ['mudar']				;
	$hierarquia				=	$dadosVaga ['hierarquia']			;
	$anonimo				=	$dadosVaga ['anonimo']			;
}
$select_dadosBeneficiosver	=	"SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga_beneficios where id_vaga = '$id_vaga'";
foreach($pdo->query($select_dadosBeneficiosver)as $dadosBeneficiosver){
	$beneficiosver			=	$dadosBeneficiosver['nome'];
}
$select_dadosInformaticaver	=	"SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga_informatica where id_vaga = '$id_vaga'";
foreach($pdo->query($select_dadosInformaticaver)as $dadosInformaticaver){
	@$informaticaver			=	$dadosInformaticaver['nome'];
}
$select_dadosIdiomasver		=	"SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga_idiomas where id_vaga = '$id_vaga'";
foreach($pdo->query($select_dadosIdiomasver)as $dadosIdiomasver){
	$idiomasver				=	$dadosIdiomasver['nome'];
}


$select_logoEmpresa 		= "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where id_cadastroempresa = '$id_empresa' ";
foreach($pdo->query($select_logoEmpresa)as $logo_empresa){
	$logo_empresa				=	$logo_empresa['logotipo'];
}

$img = $logo_empresa;
$imgtrat = explode('./..', $img, 2);
$logotipo = './../adminempresas'.$imgtrat[1];










?>