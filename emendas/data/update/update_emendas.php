

<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
include("../conexaoBD.php");


//Declaração de variavel
$justificativa = $_POST['status_emendas'];
$empenhado = $_POST['valor_empenhado'];
$liquidado = $_POST['valor_liquidado'];
$id = $_POST['id_emendas'];
// $ano = date('Y');

$ano = 2023;
$arquivo_temp = $_FILES['arquivo']['name'];
// utiliza os 5 ultimos elentos do nome da imagem
$tratamento_extensao = substr($arquivo_temp, -3);
// usa somente o que esta depois do ponto
$dataatual = date('Y-m-d H:i:s');


$protocolo = date("Ymd").mt_rand();


//verifica se corresponde as extensões suportadas
if ($tratamento_extensao == "pdf") {

	$uploaddir = "../../upload/$ano/"; // Diretório que vai receber o arquivo.

	if (!is_dir($uploaddir)) { //se ele não existir

		mkdir(  $uploaddir , 0777, true); //cria a pasta.
	}
 	$name =  $protocolo . '.' . $tratamento_extensao; //Renomeia o arquivo
	$tmpName = $_FILES['arquivo']['tmp_name']; // Recebe o arquivo temporário.

	$uploadfile = $uploaddir . $name; //endereço completo(mover arquivo pasta)

	$uploadfileb =	"../upload/$ano/" . $name; //inserir no banco

	if (move_uploaded_file($tmpName, $uploadfile)) { // move_uploaded_file irá realizar o envio do arquivo.	

		// Atulizar banco com os dados inseridos

		$cadastrar = "UPDATE `emendasimpositivas`.`emendas` SET `arquivos` = '$uploadfileb', `ultima_atualizacao`='$dataatual' WHERE (`id_emendas` = '$id');";

		if (mysqli_query($conexao,  $cadastrar)) { //sucesso
			$pdf = '1';
		} else { //erro ao cadastrar 
			$pdf = '2';
		}
	} else { // não foi possivel realizar o upload da imagem tente novamente.
		$pdf = '3';
	}

}


// Atulizar banco com os dados inseridos
$atualizar = "UPDATE `emendasimpositivas`.`emendas` SET `status_emendas`='$justificativa', `valor_empenhado`='$empenhado', `valor_liquidado`='$liquidado', `ultima_atualizacao`='$dataatual' WHERE `id_emendas`='$id'";

if ($_SESSION['secretaria'] == "impositivas") {
	$link = "../../pages/manutencaoImpositivas.php";
} else {
	$link = "../../pages/manutencao.php";
}


//verifica se conectou com banco
if (mysqli_query($conexao, $atualizar)) { //sucesso
	if (empty($pdf)) {
		echo	"<script>alert('Atualizado com Sucesso')
		window.location.href ='" . $link . "'</script>";
		exit();
	} elseif ($pdf === '1') {
		echo	"<script>alert('PDF Cadastrado com Sucesso')
		window.location.href ='" . $link . "'</script>";
		exit();
	} elseif ($pdf === '2') {
		echo	"<script>alert('Não foi possível cadastrar o PDF!')
	window.location.href ='" . $link . "'</script>";
		exit();
	} elseif ($pdf === '3') {
		echo	"<script>alert('Não foi possível cadastrar o PDF!')
	window.location.href ='" . $link . "'</script>";
		exit();
	}
} else {
	echo	"<script>alert('Não foi possível Atualizar')
	window.location.href ='" . $link . "'</script>";
	exit();
}

























?>