<?php



switch ($valor) {
  case "":
    require_once('./controll/cadastrarvaga.php');
    break; 

    case "dashboard":
      require_once('./controll/dashboard.php');
      break; 
  
    case "cadastrarvaga":
      require_once('./controll/cadastrarvaga.php');
      break; 
 
  

    case "listarvagas":
        require_once('./controll/listarvagas.php');
        break; 

    case "dadosCandidatos":
        require_once('./controll/dadosCandidatos.php');
        break;

    case "dadosEditarVaga":
        require_once('./controll/dadoseditarVaga.php');
        break; 

    case "dadosAdicionaisVaga":
        require_once('./controll/dadosAdicionaisVaga.php');
        break; 

    case "dadosBeneficiosVaga":
        require_once('./controll/dadosBeneficiosVaga.php');
        break;  
    
        case "exclusaoVaga":
        require_once('./controll/exclusaoVaga.php');
        break; 

    case "dadosIdiomasVaga":
          require_once('./controll/dadosIdiomasVaga.php');
          break; 

    case "dadosInformaticaVaga":
          require_once('./controll/dadosInformaticaVaga.php');
          break; 
		
	case "visualizar_vaga":
		require_once('./controll/visualizar_vaga.php');
		break;
		
	case "visualizar_cv":
		require_once('./controll/visualizar_cv.php');
		break;	
		
	case "curriculo_pdf":
		require_once('./controll/gerarPDF.php');
		break;	
		
	case "baixar_pdf":
		require_once('./controll/baixarPDF.php');
		break;
		
	case "lista_aprovados":
		require_once('./controll/lista_aprovados.php');
		break;
		
	case "gerar_listaAprovados":
		require_once('./controll/gerar_listaAprovados.php');
		break;	
		
	case "listareserva_aprovado":
		require_once('./controll/listareserva_aprovado.php');
		break;
		
		
	case "listareserva_aguardando":
		require_once('./controll/listareserva_aguardando.php');
		break;
		
		
	case "listareserva_negado":
		require_once('./controll/listareserva_negado.php');
		break;
	
    case "menu_vagas":
		require_once('./controll/menu_vagas.php');
		break;
		
		
////////////Configurações///////////////////
        case "configuracoes":
          	require_once('./controll/menu_configuracoes.php');
			break; 
        case "altersenha":
            require_once('./controll/alterasenha.php');
            break; 
        case "alterdados":
            require_once('./controll/alterdados.php');
            break;



        case "menu_editarvagas":
            require_once('./controll/menu_editarvagas.php');
            break;
        case "editarAdicionaisVaga":
            require_once('./controll/editarAdicionaisVaga.php');
            break;
		case "solicitacaosala":
			require_once('./controll/solicitacaosala.php');
			break; 
		case "editarBeneficiosVaga":
			require_once('./controll/editarBeneficiosVaga.php');
			break; 
		case "editarIdiomasVaga":
			require_once('./controll/editarIdiomasVaga.php');
			break; 
		case "editarInformaticaVaga":
			require_once('./controll/editarInformaticaVaga.php');
			break;
                  
		case "baixavaga":
			require_once('./controll/baixavaga.php');
			break;
			
		case "sala_entrevista":
            require_once('./controll/sala_entrevista.php');
            break;
                  
            
}



?>
