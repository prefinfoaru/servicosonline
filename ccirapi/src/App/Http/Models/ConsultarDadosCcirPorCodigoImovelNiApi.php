<?php

namespace Apps\Http\Models;

use Exception;
use Apps\Http\Models\DadosCcirExterno;


class ConsultarDadosCcirPorCodigoImovelNiApi
{
    private static $table1 = 'tb_consultas';
    private static $table2 = 'tb_config';
    private static $table3 = 'tb_busca_ni';
    private static $table4 = 'tb_consultas_externas';
    public static function consultaImoveis(array $dados, string $cpf, string $token)
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
                // CURLOPT_URL => 'https://gateway.apiserpro.serpro.gov.br/consulta-ccir-trial/v1/consultarCodigoImovelPorNI/' . $cpf . '',
                CURLOPT_URL => 'https://gateway.apiserpro.serpro.gov.br/consulta-ccir/v1/consultarCodigoImovelPorNI/' . $cpf . '',
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
                if (ConsultarDadosCcirPorCodigoImovelNi::select($dados, $cpf, $token) == false) {
                    try {
                        self::salvaconsulta($dados, $cpf);
                        self::contabilizarconsultas();
                        self::salvarBuscaNi($cpf, $dadosImovel);
                        return ConsultarDadosCcirPorCodigoImovelNi::selectSemSalvar($dados,  $cpf,  $token);
                    } catch (\PDOException $e) {
                        throw $e;
                    }
                } else {
                    self::updateNi($cpf, $dadosImovel);
                    self::salvaconsulta($dados, $cpf);
                    self::contabilizarconsultas();
                    return ConsultarDadosCcirPorCodigoImovelNi::selectSemSalvar($dados,  $cpf,  $token);
                }
                // return json_decode($response);
            } else {
                return ($response);
            }
            // return json_decode($response);
        } catch (Exception $e) {
            throw new \Exception("Ocorreu um erro " . $e->getMessage());
            exit;
        }
    }


    private static function salvarBuscaNi($cpf, $dados)
    {
        $codImoveis = implode(',', $dados);
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $cadastraBuscaNi = $connPdo->prepare('INSERT INTO  ' . self::$table3 . ' (cpf,codigos) 
        VALUES(:cpf,:codigos)');
        $cadastraBuscaNi->bindValue(":cpf", $cpf);
        $cadastraBuscaNi->bindValue(":codigos", $codImoveis);
        $cadastraBuscaNi->execute();
    }

    private static function updateNi($cpf, $dados)
    {
        $codImoveis = implode(',', $dados);
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $cadastraBuscaNi = $connPdo->prepare('UPDATE  ' . self::$table3 . ' SET codigos=:codigos WHERE cpf=:cpf');
        $cadastraBuscaNi->bindValue(":cpf", $cpf);
        $cadastraBuscaNi->bindValue(":codigos", $codImoveis);
        $cadastraBuscaNi->execute();
    }
    private static function contabilizarconsultas()
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $queryUpdate = $connPdo->prepare('UPDATE ' . self::$table2 . ' SET valor_configuracao=valor_configuracao+1 WHERE id_configuracao=:id');
        $queryUpdate->bindValue(":id", 2);
        $queryUpdate->execute();
    }

    private static function salvaconsulta($dados, $cpf)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS, array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
        if ($dados['empresa'] == "Prefeitura") {
            $now = date('Y-m-d H:i:s');
            $queryInsert = $connPdo->prepare('INSERT INTO  ' . self::$table1 . ' (nome_usuario,dado_consulta,tipo_consulta,base_consulta,data_consulta) 
            VALUES(:nome_usuario,:dado_consulta,:tipo_consulta,:base_consulta,:data_consulta)');
            $queryInsert->bindValue(":nome_usuario", $dados['nomeuser']);
            $queryInsert->bindValue(":dado_consulta", $cpf);
            $queryInsert->bindValue(":tipo_consulta", "Consulta por Número do CPF");
            $queryInsert->bindValue(":base_consulta", "Base Local");
            $queryInsert->bindValue(":data_consulta", $now);
            $queryInsert->execute();
        } else {
            $now = date('Y-m-d H:i:s');
            $queryInsert = $connPdo->prepare('INSERT INTO  ' . self::$table4 . ' (nome_usuario,empresa_consulta,dado_consulta,tipo_consulta,base_consulta,data_consulta) 
            VALUES(:nome_usuario,:empresa_consulta,:dado_consulta,:tipo_consulta,:base_consulta,:data_consulta)');
            $queryInsert->bindValue(":nome_usuario", $dados['nomeuser']);
            $queryInsert->bindValue(":empresa_consulta", $dados['empresa']);
            $queryInsert->bindValue(":dado_consulta", $cpf);
            $queryInsert->bindValue(":tipo_consulta", "Consulta por Número do CPF");
            $queryInsert->bindValue(":base_consulta", "Base Local");
            $queryInsert->bindValue(":data_consulta", $now);
            $queryInsert->execute();
        }
    }
}
