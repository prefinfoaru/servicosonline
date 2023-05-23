
<?php

session_start();


switch ($valor) {
  case "":
    require_once('./controll/dashboard.php');
    break;

  case "info":
    require_once './controll/info.php';;
    break;

  case "contato":
    require_once './controll/contatos.php';;
    break;

  case "enviodoc":
    require_once './controll/cadastro.php';;
    break;


  case "dados":
    require_once './controll/dados.php';;
    break;

  case "relatorio":
    require_once './controll/relatorio.php';;
    break;

  case "solicitar":
    require_once './controll/solicitacao.php';;
    break;

  case "geral":
    require_once './controll/geral.php';;
    break;

  case "secretaria":
    require_once './controll/rel_secretaria.php';;
    break;

  case "departamento":
    require_once './controll/departamento.php';;
    break;

  case "funcionario":
    require_once './controll/funcionario.php';;
    break;
}
