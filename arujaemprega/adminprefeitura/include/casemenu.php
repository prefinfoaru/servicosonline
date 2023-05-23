
                <?php

                switch ($valor) {
                  case "":
                    require_once('./controll/dashboard.php');
                    break;

                  case "dash":
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

                  case "dadoscadusuario":
                    require_once('./controll/dadoscadusuario.php');
                    break;

                  case "dadoscadusuarioConsulta":
                    require_once('./controll/dadoscadusuarioConsulta.php');
                    break;

                  case "altersenhausu":
                    require_once('./controll/alterarsenhausuario.php');
                    break;

                  case "dadosaltersenhausunorm":
                    require_once('./controll/dadosaltersenhausunorm.php');
                    break;

                  case "consultarusupref":
                    require_once('./controll/consultarusupref.php');
                    break;
    

                    ///////////////////ADMINISTRAÇÃO///////////////
                  case "altersenhausup":
                    require_once('./controll/alterarsenhausuariopma.php');
                    break;

                  case "alterarsenhaempresa":
                    require_once('./controll/alterarsenhaempresa.php');
                    break;  

                  case "dadosaltersenhausu":
                    require_once('./controll/dadosaltersenhausu.php');
                    break;

                  case "alterdadosusup":
                    require_once('./controll/alterardadosusuariopma.php');
                    break;

                  case "dadosaltersenhaempresa":
                    require_once('./controll/dadosaltersenhaempresa.php');
                    break;
                  case "dadosalterdadosusu":
                    require_once('./controll/dadosalterdadosusu.php');
                    break;

                  case "relatorios":
                    require_once('./controll/relatorios.php');
                    break;

                  case "relatorio_cadempresa":
                    require_once('./controll/relatorio_cadempresa.php');
                    break;

                  case "entrevista":
                    require_once('./controll/entrevista.php');
                    break;

                  case "relatorio_cadusuario":
                    require_once('./controll/relatorio_cadusuario.php');
                    break;  

                    //teste cad usuario
                    case "relatorio_cadusuarioarea":
                      require_once('./controll/relatorio_cadusuarioarea.php');
                      break;  

                  case "relatorio_salaentrevista":
                    require_once('./controll/relatorio_salaentrevista.php');
                    break;  

                  case "relatorio_candidatos":
                    require_once('./controll/relatorio_candidatos.php');
                    break;   
                      
                  case "listadados_secretarias":
                    require_once('./controll/listadados_secretarias.php');
                    break;     

                    /*  case "dadosempresaconsulta":
                require_once('./controll/dadosempresaconsulta.php');
                break;  */

                  case "criarusupre":
                    require_once('./controll/cadusuariopre.php');
                    break;

                  case "excluirusupre":
                    require_once('./controll/excluirusupma.php');
                    break;

                  case "listarusupre":
                    require_once('./controll/listarusupma.php');
                    break;

                  case "consultarempresapref":
                    require_once('./controll/consultarempresapref.php');
                    break;

                  case "listarvagas":
                    require_once('./controll/menu_listarvagas.php');
                    break;

                  case "visualizar_vaga":
                    require_once('./controll/visualizar_vaga.php');
                    break;


                  case "aprovarempresa":
                    require_once('./controll/aprovarempresa.php');
                    break;

                  case "reservasalareuniao":
                    require_once('./controll/reservasalareuniao.php');
                    break;

                  case "listavagareserva":
                    require_once('./controll/listavagareserva.php');
                    break;

                  case "solicitacaosalaentre":
                    require_once('./controll/solicitacaosalaentre.php');
                    break;
                }




                ?>
