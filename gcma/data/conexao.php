<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('banco.php');
$pdo = Banco2::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);