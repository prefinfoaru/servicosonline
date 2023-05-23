<?php

namespace Apps\Http\Controllers;

// use Apps\Http\Models\ConsultarDadosCcirPorCodigoImovelNi;
use Apps\Http\Models\ConsultarDadosCcirPorCodigoImovelNiApi;
use Exception;

class ConsultarDadosCcirPorCodigoImovelNiController
{
    public function consultar($cpf = null)
    {
        try {
            $token = AuthApiController::logar();
            if ($cpf) {
                if (isset($_POST['nomeuser'])  && isset($_POST['empresa'])) {
                    // var_dump(ConsultarDadosCcirPorCodigoImovelNi::select($_POST, $cpf, $token));
                    // exit;
                    return ConsultarDadosCcirPorCodigoImovelNiApi::consultaImoveis($_POST, $cpf, $token);
                    // if (ConsultarDadosCcirPorCodigoImovelNi::select($_POST, $cpf, $token) != false) {
                    //     return ConsultarDadosCcirPorCodigoImovelNi::select($_POST, $cpf, $token);
                    // } else {
                    //     return ConsultarDadosCcirPorCodigoImovelNiApi::consultaImoveis($_POST, $cpf, $token);
                    // }
                } else {
                    throw new \Exception("Preencha os Dados Corretamente");
                }
            } else {
                throw new \Exception("Nenhum dado encontrado");
            }
        } catch (Exception $e) {
            throw new \Exception("Ocorreu um erro - " . $e->getMessage());
        }
    }
}
