	<script src="https://unpkg.com/sweetalert2@7.12.15/dist/sweetalert2.all.js"> </script> <!-- Biblioteca para mensagem de erro personalizada  -->
	<?php

	include "../banco/banco.php";
	$pdo = Banco::conectar();
	header("Content-type: text/html; charset=utf-8");

	if (isset($_POST['salvar'])) {
		$datamov = date("Y-m-d H:i:s");
		$observacao = $_POST['mov_obs'];
		$mov_sec = utf8_decode($_POST['mov_sec']);
		$usuario = $_POST["usuario"];
		$solicitacao = $_POST['idsolicitacao'];
		$secretaria = $_POST["secretaria"];
		$protocolo = $_POST["protocolo"];


		$insertmovimetacao = "INSERT INTO `bd_sol_hr`.`tb_movimentacao_sec` (`datamov`, `id_usuario`, `secretaria_atual`, `secretaria_mov`, `obs`, `protocolo_sol`) VALUES ('$datamov', '$usuario', '$secretaria', '$mov_sec', '$observacao', '$protocolo')";


		$resultado_movimentacao = $pdo->query($insertmovimetacao);

		// fim da movimentação no cadastro 

		$updatesequ = "UPDATE `bd_sol_hr`.`tb_solicitacao` SET `tb_secretaria_funcionario`='$mov_sec' WHERE `tb_numprotocolo`='$protocolo';";
		$resultado_update = $pdo->query($updatesequ);


		// fim da movimentação na tabela movimentação
		echo "<script>alert('Movimentação efetuada com Sucesso.');window.location='../index.php'</script>";
	} else if (isset($_POST['deferir'])) {
		$datamov = date("Y-m-d H:i:s");
		$observacao = $_POST['mov_obs'];
		$mov_sec = utf8_decode($_POST['mov_sec']);
		$usuario = $_POST["usuario"];
		$secretaria = $_POST["secretaria"];
		$protocolo = $_POST["protocolo"];

		$insertmovimentacao = "INSERT INTO `bd_sol_hr`.`tb_movimentacao` (`datamov`, `id_usuario`, `obs`,`status`, `protocolo_sol`) VALUES ('$datamov', '$usuario',  '$observacao',2, '$protocolo')";


		$resultado_movimentacao = $pdo->query($insertmovimentacao);

		// fim da movimentação no cadastro 

		$updatesequ = "UPDATE `bd_sol_hr`.`tb_solicitacao` SET `tb_situacao`=2 WHERE `tb_numprotocolo`='$protocolo';";
		$resultado_update = $pdo->query($updatesequ);


		// fim da movimentação na tabela movimentação

		echo "<script>alert('A solicitação foi deferida.');window.location='../index.php'</script>";
	} else if (isset($_POST['indeferir'])) {
		$datamov = date("Y-m-d H:i:s");
		$observacao = $_POST['mov_obs'];
		$mov_sec = utf8_decode($_POST['mov_sec']);
		$usuario = $_POST["usuario"];
		$secretaria = $_POST["secretaria"];
		$protocolo = $_POST["protocolo"];

		$insertmovimentacao = "INSERT INTO `bd_sol_hr`.`tb_movimentacao` (`datamov`, `id_usuario`, `obs`,`status`, `protocolo_sol`) VALUES ('$datamov', '$usuario',  '$observacao',3, '$protocolo')";


		$resultado_movimentacao =   $pdo->query($insertmovimentacao);

		// fim da movimentação no cadastro 

		$updatesequ = "UPDATE `bd_sol_hr`.`tb_solicitacao` SET `tb_situacao`=3 WHERE `tb_numprotocolo`='$protocolo';";
		$resultado_update = $pdo->query($updatesequ);


		// fim da movimentação na tabela movimentação
		echo "<script>alert('A solicitação foi indeferida.');window.location='../index.php'</script>";
	}
