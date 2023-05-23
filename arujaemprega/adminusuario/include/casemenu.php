
<?php



switch ($valor) {
  case "":
    require_once('./controll/dashboard.php');//antes dashboard
    break;

    case "dashboard":
      require_once('./controll/dashboard.php');
      break;   
    
    case "curriculo":
    require_once('./controll/menu_curriculo.php');
    break;
        
case "empresa":
    require_once('./controll/menu_empresa.php');
    break;

  case "admin":
    require_once('./controll/menu_admin.php');
    break;
	
  case "visualizar_cv":
    require_once('./controll/visualizar_cv.php');
    break;
	
  case "vagas_usu":
    require_once('./controll/menu_vagas.php');
    break;
	
  case "config_usu":
    require_once('./controll/menu_config.php');
    break;
	
  case "editar_cvConsulta":
    require_once('./controll/editarcurriculoConsulta.php');
    break;
	
  case "editar_cv":
    require_once('./controll/menu_editarcurriculo.php');
    break;
	
  case "curriculo_pdf":
    require_once('./controll/gerarPDF.php');
    break;
	
  case "baixar_pdf":
    require_once('./controll/baixarPDF.php');
    break;
	
  case "alterarsenhausuario":
    require_once('./controll/alterarsenhausuario.php');
    break;
	
  case "dadosaltersenhausunorm":
    require_once('./controll/dadosaltersenhausunorm.php');
    break;
	
  case "dadoscadusuario":
    require_once('./controll/dadoscadusuario.php');
    break;
	
  case "dadoscadusuarioConsulta":
    require_once('./controll/dadoscadusuarioConsulta.php');
    break;
    
    case "buscar_vagas":
    require_once('./controll/buscar_vagas.php');
    break;
		
    case "formacaoacademica":
    require_once('./controll/formacaoacademica.php');
    break;
		
    case "habilidadeseidiomas":
    require_once('./controll/habilidadeseidiomas.php');
    break;
		
    case "experienciasprofissionais":
    require_once('./controll/experienciasprofissionais.php');
    break;
		
    case "objetivosprofissionais":
    require_once('./controll/objetivosprofissionais.php');
    break;
          
    case "visualizar_vaga":
    require_once('./controll/visualizar_vaga.php');
    break;    
 
          
    case "listar_vagas":
    require_once('./controll/listar_vagas.php');
    break; 
    

    case "teste":
      require_once('./conteudo/Form_cad_cv4 - Copia.php');
      break; 
      
  

 
}

?>

     
     
     
     
     