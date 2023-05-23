<?php

namespace Apps\Http\Controllers;

use Apps\Http\Models\Cpf;


class CpfController
{
    //http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/infoconvapi2/api/cnpj/consultacnpj/28670509000160
    public function consultacpfoldx($cpf = null)
    {
        if (AuthController::checkauth()) {
            if ($cpf) {
                return Cpf::select($cpf);
            } else {
                throw new \Exception("Nenhum dado encontrado");
            }
        }
        throw new \Exception("Desculpe, mas você não tem permissão para acessar");
    }
    public function consultacpfcomp($cpf = null)
    {
        if (AuthController::checkauth()) {
            if ($cpf) {
                if (isset($_POST['nomeuser']) && isset($_POST['cpf']) && isset($_POST['empresa'])) {
                    if (Cpf::validacpf($_POST['cpf'])) {
                        if (Cpf::validacpf($cpf)) {
                            return   Cpf::selectcomp($_POST, $cpf);
                        } else {
                            throw new \Exception("CPF Inválido");
                        }
                    } else {
                        throw new \Exception("CPF de consulta Inválido");
                    }
                } else {
                    throw new \Exception("Informe os dados de forma correta");
                }
            } else {
                throw new \Exception("Nenhum dado encontrado");
            }
        }
        throw new \Exception("Desculpe, mas você não tem permissão para acessar");
    }
}
