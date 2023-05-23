<?php
session_start();
include "../conexao.php";
$pdo =  Banco::conectar();


$usuario	 = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha 		 = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$curl = curl_init();
curl_setopt_array($curl, [
	CURLOPT_SSL_VERIFYPEER => 0,

	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POST => true,
	CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
	CURLOPT_POSTFIELDS => [
		'secret' => '6LeQASYaAAAAAPejpRtUYEgZf5Gz2-I3u92PKFgG',
		'response' => $_POST['g-recaptcha-response'],
		'remoteip' =>   $_SERVER['REMOTE_ADDR']

	]


]);

$response = json_decode(curl_exec($curl));
curl_close($curl);

if (!$response->success) {
	$_SESSION['erro'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'>Captcha Incorreto.</div>";
	header("location: ../../pages/login.php");
} else {
	if (!empty($usuario) || !empty($senha)) {

		$consulta = $pdo->prepare("SELECT * FROM emendasimpositivas.usuarios where usuario = '$usuario'");
		$consulta->execute();

		$resultado_consulta = fi

		if ($resultado_consulta) {

			$row_dados = mysqli_fetch_assoc($resultado_consulta);
			if (password_verify($senha, $row_dados['senha'])) {
				if ($row_dados['secretaria'] == '02.03.00 - Secretaria Municipal de Finanças') {
					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = '02.03.00 - Secretaria Municipal de Finanças';

					header("location: ../../pages/manutencao.php");
				} elseif ($row_dados['secretaria'] == '02.04.00 - Secretaria Municipal de Educação') {

					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = '02.04.00 - Secretaria Municipal de Educação';
					header("location: ../../pages/manutencao.php");
				} elseif ($row_dados['secretaria'] == '02.05.00 - Secretaria Municipal de cultura') {

					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = '02.05.00 - Secretaria Municipal de cultura';
					header("location: ../../pages/manutencao.php");
				} elseif ($row_dados['secretaria'] == '02.06.00 - Secretaria Municipal de Saúde') {

					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = '02.06.00 - Secretaria Municipal de Saúde';
					header("location: ../../pages/manutencao.php");
				} elseif ($row_dados['secretaria'] == '02.07.00 - Secretaria Municipal de Assistência Social') {

					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = '02.07.00 - Secretaria Municipal de Assistência Social';
					header("location: ../../pages/manutencao.php");
				} elseif ($row_dados['secretaria'] == '02.09.00 - Secretaria Municipal de Obras') {

					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = '02.09.00 - Secretaria Municipal de Obras';
					header("location: ../../pages/manutencao.php");
				} elseif ($row_dados['secretaria'] == '02.10.00 - Secretaria Municipal de Serviços') {

					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = '02.10.00 - Secretaria Municipal de Serviços';
					header("location: ../../pages/manutencao.php");
				} elseif ($row_dados['secretaria'] == '02.12.00 - Secretaria Municipal de Esportes') {

					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = '02.12.00 - Secretaria Municipal de Esportes';
					header("location: ../../pages/manutencao.php");
				} elseif ($row_dados['secretaria'] == '02.14.00 - Secretaria Municipal de Meio Ambiente') {

					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = '02.14.00 - Secretaria Municipal de Meio Ambiente';
					header("location: ../../pages/manutencao.php");
				} elseif ($row_dados['secretaria'] == '02.16.00 - Secretaria Municipal de Segurança Pública') {

					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = '02.16.00 - Secretaria Municipal de Segurança Pública';
					header("location: ../../pages/manutencao.php");
				} else if ($row_dados['secretaria'] == '02.11.00 - Secretaria Municipal de Governo') {
					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = '02.11.00 - Secretaria Municipal de Governo';
					header("location: ../../pages/menu.php");
				} else if ($row_dados['secretaria'] == 'impositivas') {
					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = 'impositivas';
					header("location: ../../pages/formEmendasImpositivas.php");
				} elseif ($row_dados['secretaria'] == '02.18.00 - Secretaria Municipal de Turismo e Lazer') {

					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = '02.18.00 - Secretaria Municipal de Turismo e Lazer';
					header("location: ../../pages/manutencao.php");
				} elseif ($row_dados['secretaria'] == '02.08.00 - Secretaria Municipal de Planejamento Urbano e Habitação') {

					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = '02.08.00 - Secretaria Municipal de Planejamento Urbano e Habitação';
					header("location: ../../pages/manutencao.php");
				} elseif ($row_dados['secretaria'] == '02.01.00 - Chefia do Executivo') {

					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = '02.01.00 - Chefia do Executivo';
					header("location: ../../pages/manutencao.php");
				} else if ($row_dados['secretaria'] == 'parlamentares') {
					$_SESSION['logado'] = 1;
					$_SESSION['secretaria'] = 'parlamentares';
					header("location: ../../pages/formEmendasParlamentares.php");
				} else {
					$_SESSION['erro'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'> Usuário ou Senha Incorreto.</div>";
					header("location: ../../pages/login.php");
				}
			} else {
				$_SESSION['erro'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'> Usuário ou Senha Incorreto.</div>";
				header("location: ../../pages/login.php");
			}
		}
	}
}
