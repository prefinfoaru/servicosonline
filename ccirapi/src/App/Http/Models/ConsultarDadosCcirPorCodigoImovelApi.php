<?php

namespace Apps\Http\Models;

use Exception;
use Apps\Http\Models\DadosCcirExterno;


class ConsultarDadosCcirPorCodigoImovelApi
{
    private static $table1 = 'tb_consultas';
    private static $table2 = 'tb_config';
    public static function consultaImovel(array $dados, string $cod, string $token)
    {
        $connPdo = new \PDO(
            DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME,
            DBUSER,
            DBPASS,
            array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            )
        );
        $queryVerificaConsultas = $connPdo->prepare('SELECT valor_configuracao FROM ' . self::$table2 . ' WHERE id_configuracao=:id');
        $queryVerificaConsultas->bindValue(":id", 2);
        $queryVerificaConsultas->execute();
        $queryVerificaLimite = $connPdo->prepare('SELECT valor_configuracao FROM ' . self::$table2 . ' WHERE id_configuracao=:id');
        $queryVerificaLimite->bindValue(":id", 1);
        $queryVerificaLimite->execute();
        $quantidadeLimite = $queryVerificaLimite->fetchAll(\PDO::FETCH_OBJ);
        $quantidadeConsulta = $queryVerificaConsultas->fetchAll(\PDO::FETCH_OBJ);
        if ($quantidadeConsulta >= $quantidadeLimite) {
            throw new \Exception("O limite de consultas foi atingido ");
            exit;
        }
        try {
            // $token = '06aef429-a981-3ec5-a1f8-71d38d86481e';
            $curl = curl_init();
            curl_setopt_array($curl, array(
                // CURLOPT_URL => 'https://gateway.apiserpro.serpro.gov.br/consulta-ccir-trial/v1/consultarDadosCcirPorCodigoImovel/' . $cod . '',
                CURLOPT_URL => 'https://gateway.apiserpro.serpro.gov.br/consulta-ccir/v1/consultarDadosCcirPorCodigoImovel/' . $cod . '',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $token . ''
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $dadosImovel = json_decode($response);
            if (json_decode($response) != NULL) {
                if (DadosCcirExterno::verifica($cod) == false) {
                    $dadosCcirExterno = self::separarDadosImovelCcirExterno($dadosImovel, $cod);
                    $dadosAreaRegistradaCcir = self::separarDadosImovelAreaRegistradaCcir($dadosImovel, $cod);
                    $dadosControleCcir = self::separarDadosImovelDadosControleCcir($dadosImovel, $cod);
                    $dadosTitularCcirExterno = self::separarDadosImovelTitularesCcir($dadosImovel, $cod);
                    try {
                        $connPdo->beginTransaction();
                        DadosCcirExterno::inserir($dadosCcirExterno, $connPdo);
                        AreaRegistradaCcir::inserir($dadosAreaRegistradaCcir, $connPdo);
                        ControleCcir::inserir($dadosControleCcir, $connPdo);
                        TitularCcirExterno::inserir($dadosTitularCcirExterno, $connPdo);
                        $connPdo->commit();

                        $now = date('Y-m-d H:i:s');
                        $queryInsert = $connPdo->prepare('INSERT INTO  ' . self::$table1 . ' (nome_usuario,dado_consulta,tipo_consulta,base_consulta,data_consulta) 
                        VALUES(:nome_usuario,:dado_consulta,:tipo_consulta,:base_consulta,:data_consulta)');
                        $queryInsert->bindValue(":nome_usuario", $dados['nomeuser']);
                        $queryInsert->bindValue(":dado_consulta", $cod);
                        $queryInsert->bindValue(":tipo_consulta", "Consulta por Código do Imóvel");
                        $queryInsert->bindValue(":base_consulta", "Base da CCIR");
                        $queryInsert->bindValue(":data_consulta", $now);
                        $queryInsert->execute();

                        self::contabilizarconsultas();

                        return ConsultarDadosCcirPorCodigoImovel::selectSemSalvar($dados,  $cod,  $token);
                        // return $dadosCcirExternoFinal;
                    } catch (\PDOException $e) {
                        $connPdo->rollback();
                        throw $e;
                    }
                } else {
                }
                // return json_decode($response);
            } else {
                return ($response);
            }
            // return json_decode($response);
        } catch (Exception $e) {
            throw new \Exception("Ocorreu um erro " . $e->getMessage());
        }
    }
    public static function separarDadosImovelCcirExterno($dadosImovel, $cod)
    {
        $data = date("Y-m-d H:i:s");
        $dadosCcirExterno = array(
            "codigoImovelIncra" => $cod,
            "areaCertificada" => $dadosImovel->areaCertificada,
            "areaMedida" => $dadosImovel->areaMedida,
            "areaModuloFiscal" => $dadosImovel->areaModuloFiscal,
            "areaModuloRural" => $dadosImovel->areaModuloRural,
            "areaTotal" => $dadosImovel->areaTotal,
            "classificacaoFundiaria" => $dadosImovel->classificacaoFundiaria,
            "dataProcessamentoUltimaDeclaracao" => $dadosImovel->dataProcessamentoUltimaDeclaracao,
            "denominacao" => $dadosImovel->denominacao,
            "fracaoMinimaParcelamento" => $dadosImovel->fracaoMinimaParcelamento,
            "indicacoesLocalizacao" => $dadosImovel->indicacoesLocalizacao,
            "municipioSede" => $dadosImovel->municipioSede,
            "numeroModulosFiscais" => $dadosImovel->numeroModulosFiscais,
            "numeroModulosRurais" => $dadosImovel->numeroModulosRurais,
            "totalAreaPosseJustoTitulo" => $dadosImovel->totalAreaPosseJustoTitulo,
            "totalAreaPosseSimplesOcupacao" => $dadosImovel->totalAreaPosseSimplesOcupacao,
            "totalAreaRegistrada" => $dadosImovel->totalAreaRegistrada,
            "totalPessoasRelacionadasImovel" => $dadosImovel->totalPessoasRelacionadasImovel,
            "ufSede" => $dadosImovel->ufSede,
            "dataAtualizacao" => $data
        );
        return $dadosCcirExterno;
    }
    public static function separarDadosImovelAreaRegistradaCcir($dadosImovel, $cod)
    {
        $areaRegistradaCcir = [];
        foreach ($dadosImovel->areasRegistradas as $dados) {
            $dadosAreaRegistradaCcir = array(
                "codigoImovel" => $cod,
                "ufCartorio" => $dados->ufCartorio,
                "municipioCartorio" => $dados->municipioCartorio,
                "dataRegistro" => $dados->dataRegistro,
                "cnsOuOficio" => $dados->cnsOuOficio,
                "matriculaOuTranscricao" => $dados->matriculaOuTranscricao,
                "registro" => $dados->registro,
                "livroOuFicha" => $dados->livroOuFicha,
                "area" => $dados->area
            );
            array_push($areaRegistradaCcir, $dadosAreaRegistradaCcir);
        }

        return $areaRegistradaCcir;
    }
    public static function separarDadosImovelDadosControleCcir($dadosImovel, $cod)
    {
        $dadosControleCcir = array(
            "codigoImovel" => $cod,
            "dataGeracaoCcir" => $dadosImovel->dadosUltimoCcir->dataGeracaoCcir,
            "dataLancamento" => $dadosImovel->dadosUltimoCcir->dataLancamento,
            "dataVencimentoCcir" => $dadosImovel->dadosUltimoCcir->dataVencimentoCcir,
            "debitosAnteriores" => $dadosImovel->dadosUltimoCcir->debitosAnteriores,
            "juros" => $dadosImovel->dadosUltimoCcir->juros,
            "multa" => $dadosImovel->dadosUltimoCcir->multa,
            "numeroAutenticidadeCcir" => $dadosImovel->dadosUltimoCcir->numeroAutenticidadeCcir,
            "numeroCcir" => $dadosImovel->dadosUltimoCcir->numeroCcir,
            "situacaoCcir" => $dadosImovel->dadosUltimoCcir->situacaoCcir,
            "taxaServicosCadastrais" => $dadosImovel->dadosUltimoCcir->taxaServicosCadastrais,
            "valorCobrado" => $dadosImovel->dadosUltimoCcir->valorCobrado,
            "valorTotal" => $dadosImovel->dadosUltimoCcir->valorTotal
        );

        return $dadosControleCcir;
    }
    public static function separarDadosImovelTitularesCcir($dadosImovel, $cod)
    {
        $titularesCcir = [];
        foreach ($dadosImovel->titulares as $dadosTitulares) {
            $dadosTitulares = array(
                "codigoImovel" => $cod,
                "cpfCnpj" => $dadosTitulares->cpfCnpj,
                "nomeTitular" => $dadosTitulares->nomeTitular,
                "declarante" => $dadosTitulares->declarante,
                "condicaoTitularidade" => $dadosTitulares->condicaoTitularidade,
                "percentualDetencao" => $dadosTitulares->percentualDetencao,
                "nacionalidade" => $dadosTitulares->nacionalidade
            );
            array_push($titularesCcir, $dadosTitulares);
        }
        return $titularesCcir;
    }

    private static function contabilizarconsultas()
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $queryUpdate = $connPdo->prepare('UPDATE ' . self::$table2 . ' SET valor_configuracao=valor_configuracao+1 WHERE id_configuracao=:id');
        $queryUpdate->bindValue(":id", 2);
        $queryUpdate->execute();
    }
}
