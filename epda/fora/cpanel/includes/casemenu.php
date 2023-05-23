<?php

switch ($valor) {
  case "":
    require_once ('./controll/dashboard.php');
  break;
    

	 case "contato":
      require_once './controll/contatos.php'; ;
        break;
		
 case "enviodoc":
      require_once './controll/cadastro.php'; ;
        break;		
    

	 case "escolas":
      require_once './controll/escolas.php'; ;
        break;		
    
		 case "intecorrencias":
      require_once './controll/intercorrencias.php'; ;
        break;
		 
		 case "solicitar":
      require_once './controll/solicitacao.php'; ;
        break;
        
        case "dadosSolicitacao":
    require_once './controll/dadosSolicitacao.php';;
    break;
}	