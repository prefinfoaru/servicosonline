<?php
  
    
  switch ($valor) {
  case "":
    require_once ('../cpanel/controll/dashboard.php');
       
  break;
    
case "home":
    require_once ('../cpanel/controll/dashboard.php');
       
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
      require_once '../cpanel/controll/solicitacao.php'; ;
        break;
        
        case "dadosSolicitacao":
    require_once './controll/dadosSolicitacao.php';;
    break;
	
          
     case "dadosRequerimento":
    require_once './controll/dadosRequerimento.php';;
    break;    
      
      case "dadosObservacoes":
    require_once './controll/dadosObservacoes.php';;
    break;   
      
      case "dadosanexopendente":
    require_once './controll/dadosanexopendente.php';;
    break;  
      
      case "dadosrespostasObservacoes":
    require_once './controll/dadosrespostasObservacoes.php';;
    break;      
          
          
     case "dadosrespostasObservacoes":
    require_once './controll/dadosrespostasObservacoes.php';;
    break;        
   
}	
    
     
?>

