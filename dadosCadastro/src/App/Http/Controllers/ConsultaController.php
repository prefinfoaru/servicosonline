<?php

namespace Apps\Http\Controllers;

use Apps\Http\Models\Consulta;
use Exception;

class ConsultaController
{
    public function geral()
    {
        if (AuthController::checkauth()) {
            if ($_POST) {
                if (isset($_POST['nomeuser'])) {
                    if(isset($_POST['nome_titular']) && isset($_POST['nome_logradouro']))
                    {
                    
                        try{
                            
                              return Consulta::select($_POST['nomeuser'],$_POST['nome_titular'], $_POST['nome_logradouro']);
                        }catch(Exception $e){

                        }
                        
                    }
                   
                } else {
                    throw new \Exception("Informe todos os paramêtros");
                }
            } else {
                throw new \Exception("Nenhum dado encontrado");
            }
        }
        throw new \Exception("Desculpe, mas você não tem permissão para acessar");
    }
}
