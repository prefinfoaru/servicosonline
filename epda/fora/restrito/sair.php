<?php

session_start();
unset($_SESSION['id_cad_user'], $_SESSION['nome'], $_SESSION['email']);

$_SESSION['msg'] = "Deslogado com sucesso";
header("Location: index.php");