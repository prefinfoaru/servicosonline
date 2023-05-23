<?php 
	require ("../conexao.php");

	$login = addslashes($_POST['login']);
	$senha = md5(addslashes($_POST['senha']));

	$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'");
	$row = mysqli_num_rows($query);

	if ($row > 0){
		session_start();
		$_SESSION['login'] = $login;
		header('Location: consultando.php');
	}else{
		header('Location: index.php?msg=1');
	}
?>