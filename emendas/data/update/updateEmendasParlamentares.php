

<?php

session_start();
include("../conexaoBD.php");

//Declaração de variavel
$objeto = $_POST['objeto_emenda'];
$deputado = $_POST['deputado'];
$valor = $_POST['valor_emenda'];
$tipo = $_POST['tipo_emenda'];
$id = $_POST['id_emendas'];
$usuario = $_SESSION['secretaria'];

// usa somente o que esta depois do ponto
$dataatual = date('Y-m-d H:i:s');



//Atulizar banco com os dados inseridos
$atualizar = "UPDATE `emendasimpositivas`.`emendas_parlamentares` SET  `deputado`='$deputado', `valor_emenda`='$valor',  `tipo_emenda`='$tipo',`objeto_emenda`='$objeto',`ultima_atualizacao`='$dataatual',`usuario_atualizacao`='$usuario' WHERE `id_emenda_parl`='$id'";


//  //  //verifica se conectou com banco
if (mysqli_query($conexao, $atualizar)) { //sucesso
    echo    "<script>alert('Atualizado com Sucesso')
		window.location.href ='../../pages/manutencaoParlamentares.php'</script>";
    exit();
} else {
    echo    "<script>alert('Não foi possível Atualizar')
	window.location.href ='../../pages/manutencaoParlamentares.php'</script>";
    exit();
}

























?>