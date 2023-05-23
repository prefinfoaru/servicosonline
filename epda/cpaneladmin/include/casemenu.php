<?php
  
    
  switch ($valor) {
  case "":
    require_once ('../cpaneladmin/controll/dashboard.php');
       
  break;
    
case "home":
    require_once ('../cpaneladmin/controll/dashboard.php');
       
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
      require_once '../cpaneladmin/controll/solicitacao.php'; ;
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
      
      case "montagemata":
    require_once './controll/montagemata.php';;
    break;  
      
      case "dadosrespostasmesa":
    require_once './controll/dadosrespostasmesa.php';;
    break;      
          
          
     case "dadosrespostasObservacoes":
    require_once './controll/dadosrespostasObservacoes.php';;
    break;        
   


case "dadosrespobs":
    require_once './controll/dadosrespobs.php';;
    break;        
   
case "montagemata":
    require_once './controll/montagemata.php';;
    break;  
          
      case "atafinal":
    require_once './controll/atafinal.php';;
    break; 
      
      case "gerarPDF":
    require_once './controll/gerarPDF.php';;
    break;    
      case "buscarAta":
    require_once './controll/buscarAta.php';;
    break;        
   
}	
    
     
?>

