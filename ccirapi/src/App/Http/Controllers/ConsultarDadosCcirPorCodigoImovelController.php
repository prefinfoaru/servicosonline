<?php

namespace Apps\Http\Controllers;

use Apps\Http\Models\ConsultarDadosCcirPorCodigoImovel;
use Apps\Http\Models\ConsultarDadosCcirPorCodigoImovelApi;
use Exception;

class ConsultarDadosCcirPorCodigoImovelController
{
    public function consultar($cod = null)
    {
        try {
            $token = AuthApiController::logar();
            if ($cod) {
                if (isset($_POST['nomeuser'])  && isset($_POST['empresa'])) {
                    if (ConsultarDadosCcirPorCodigoImovel::select($_POST, $cod, $token) != false) {
                        ConsultarDadosCcirPorCodigoImovel::salvarConsulta($_POST, $cod);
                        return ConsultarDadosCcirPorCodigoImovel::select($_POST, $cod, $token);
                    } else {
                        return ConsultarDadosCcirPorCodigoImovelApi::consultaImovel($_POST, $cod, $token);
                    }
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
