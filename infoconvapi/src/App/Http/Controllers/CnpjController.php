<?php

namespace Apps\Http\Controllers;

use Apps\Http\Models\Cnpj;
use Apps\Http\Models\Cpf;

class CnpjController
{
    //http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/infoconvapi2/api/cnpj/consultacnpj/28670509000160
    public function consultacnpj_oldx($cnpj = null)
    {
        if (AuthController::checkauth()) {
            if ($cnpj) {
                return Cnpj::select($cnpj);
            } else {
                throw new \Exception("Nenhum dado encontrado");
            }
        }
        throw new \Exception("Desculpe, mas você não tem permissão para acessar");
    }

    public function consultacnpjcomp($cnpj = null)
    {
        if (AuthController::checkauth()) {
            if ($cnpj) {
                if (isset($_POST['nomeuser']) && isset($_POST['cpf']) && isset($_POST['empresa'])) {
                    if (Cpf::validacpf($_POST['cpf'])) {
                        if (Cnpj::validacnpj($cnpj) == true) {
                            return   Cnpj::selectcomp($_POST, $cnpj);
                        } else {
                            throw new \Exception("CNPJ Inválido");
                        }
                    } else {
                        throw new \Exception("CPF de consulta Inválido");
                    }
                } else {
                    throw new \Exception("Você deve passar as informações corretamente");
                }
            } else {
                throw new \Exception("Nenhum dado encontrado");
            }
        }
        throw new \Exception("Desculpe, mas você não tem permissão para acessar");
    }
}
