<?php

namespace Apps\Http\Models;


class ConsultarDadosCcirPorCodigoImovel
{

    private static $table1 = 'tb_dados_ccir_externo';
    private static $table2 = 'tb_area_registrada_ccir';
    private static $table3 = 'tb_dados_controle_ccir';
    private static $table4 = 'tb_titular_ccir_externo';
    private static $table5 = 'tb_consultas';
    private static $table6 = 'tb_consultas_externas';

    public static function select(array $dados, $cod, $token)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS, array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
        $verificaImovel =  $connPdo->prepare(' SELECT  count(id_imovel) FROM  ' . self::$table1 . ' WHERE codigo_imovel_incra=:codigo_imovel_incra');
        $verificaImovel->bindValue(':codigo_imovel_incra', $cod);
        $verificaImovel->execute();
        if ($verificaImovel->fetchColumn() > 0) {
            $dadosCcirExterno = $connPdo->prepare('SELECT * FROM  ' . self::$table1 . '  WHERE codigo_imovel_incra=:codigo_imovel_incra');
            $dadosCcirExterno->bindValue(':codigo_imovel_incra', $cod);
            $dadosCcirExterno->execute();
            $dadosCcirExternoFinal = $dadosCcirExterno->fetchAll(\PDO::FETCH_OBJ);

            $dadosAreaRegistrada = $connPdo->prepare('SELECT * FROM  ' . self::$table2 . '  WHERE codigo_imovel=:codigo_imovel ORDER BY data_registro DESC');
            $dadosAreaRegistrada->bindValue(':codigo_imovel', $cod);
            $dadosAreaRegistrada->execute();
            $dadosAreaRegistradaFinal = $dadosAreaRegistrada->fetchAll(\PDO::FETCH_OBJ);

            $dadosControleCcir = $connPdo->prepare('SELECT * FROM  ' . self::$table3 . '  WHERE codigo_imovel=:codigo_imovel');
            $dadosControleCcir->bindValue(':codigo_imovel', $cod);
            $dadosControleCcir->execute();
            $dadosControleCcirFinal = $dadosControleCcir->fetchAll(\PDO::FETCH_OBJ);

            $dadosTitularCcir = $connPdo->prepare('SELECT * FROM  ' . self::$table4 . '  WHERE codigo_imovel=:codigo_imovel');
            $dadosTitularCcir->bindValue(':codigo_imovel', $cod);
            $dadosTitularCcir->execute();
            $dadosTitularCcirFinal = $dadosTitularCcir->fetchAll(\PDO::FETCH_OBJ);
            $dadosAreaRegistradaFinal = array(
                "areasRegistradas" => $dadosAreaRegistradaFinal
            );
            $dadosControleCcirFinal = array(
                "dadosUltimoCcir" => $dadosControleCcirFinal
            );
            $dadosTitularCcirFinal = array(
                "titulares" => $dadosTitularCcirFinal
            );

            array_push($dadosCcirExternoFinal, $dadosAreaRegistradaFinal);
            array_push($dadosCcirExternoFinal, $dadosControleCcirFinal);
            array_push($dadosCcirExternoFinal, $dadosTitularCcirFinal);



            return $dadosCcirExternoFinal;
        } else {
            return false;
        }
    }

    public static function selectSemSalvar(array $dados, $cod, $token)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS, array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
        $verificaImovel =  $connPdo->prepare(' SELECT  count(id_imovel) FROM  ' . self::$table1 . ' WHERE codigo_imovel_incra=:codigo_imovel_incra');
        $verificaImovel->bindValue(':codigo_imovel_incra', $cod);
        $verificaImovel->execute();
        if ($verificaImovel->fetchColumn() > 0) {
            $dadosCcirExterno = $connPdo->prepare('SELECT * FROM  ' . self::$table1 . '  WHERE codigo_imovel_incra=:codigo_imovel_incra');
            $dadosCcirExterno->bindValue(':codigo_imovel_incra', $cod);
            $dadosCcirExterno->execute();
            $dadosCcirExternoFinal = $dadosCcirExterno->fetchAll(\PDO::FETCH_OBJ);

            $dadosAreaRegistrada = $connPdo->prepare('SELECT * FROM  ' . self::$table2 . '  WHERE codigo_imovel=:codigo_imovel ORDER BY data_registro DESC');
            $dadosAreaRegistrada->bindValue(':codigo_imovel', $cod);
            $dadosAreaRegistrada->execute();
            $dadosAreaRegistradaFinal = $dadosAreaRegistrada->fetchAll(\PDO::FETCH_OBJ);

            $dadosControleCcir = $connPdo->prepare('SELECT * FROM  ' . self::$table3 . '  WHERE codigo_imovel=:codigo_imovel');
            $dadosControleCcir->bindValue(':codigo_imovel', $cod);
            $dadosControleCcir->execute();
            $dadosControleCcirFinal = $dadosControleCcir->fetchAll(\PDO::FETCH_OBJ);

            $dadosTitularCcir = $connPdo->prepare('SELECT * FROM  ' . self::$table4 . '  WHERE codigo_imovel=:codigo_imovel');
            $dadosTitularCcir->bindValue(':codigo_imovel', $cod);
            $dadosTitularCcir->execute();
            $dadosTitularCcirFinal = $dadosTitularCcir->fetchAll(\PDO::FETCH_OBJ);
            $dadosAreaRegistradaFinal = array(
                "areasRegistradas" => $dadosAreaRegistradaFinal
            );
            $dadosControleCcirFinal = array(
                "dadosUltimoCcir" => $dadosControleCcirFinal
            );
            $dadosTitularCcirFinal = array(
                "titulares" => $dadosTitularCcirFinal
            );

            array_push($dadosCcirExternoFinal, $dadosAreaRegistradaFinal);
            array_push($dadosCcirExternoFinal, $dadosControleCcirFinal);
            array_push($dadosCcirExternoFinal, $dadosTitularCcirFinal);

            return $dadosCcirExternoFinal;
        } else {
            return false;
        }
    }

    public static function salvarConsulta($dados, $cpf)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS, array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
        if ($dados['empresa'] == "Prefeitura") {
            $now = date('Y-m-d H:i:s');
            $queryInsert = $connPdo->prepare('INSERT INTO  ' . self::$table5 . ' (nome_usuario,dado_consulta,tipo_consulta,base_consulta,data_consulta) 
            VALUES(:nome_usuario,:dado_consulta,:tipo_consulta,:base_consulta,:data_consulta)');
            $queryInsert->bindValue(":nome_usuario", $dados['nomeuser']);
            $queryInsert->bindValue(":dado_consulta", $cpf);
            $queryInsert->bindValue(":tipo_consulta", "Consulta por Código do Imóvel");
            $queryInsert->bindValue(":base_consulta", "Base Local");
            $queryInsert->bindValue(":data_consulta", $now);
            $queryInsert->execute();
        } else {
            $now = date('Y-m-d H:i:s');
            $queryInsert = $connPdo->prepare('INSERT INTO  ' . self::$table6 . ' (nome_usuario,empresa_consulta,dado_consulta,tipo_consulta,base_consulta,data_consulta) 
            VALUES(:nome_usuario,:empresa_consulta,:dado_consulta,:tipo_consulta,:base_consulta,:data_consulta)');
            $queryInsert->bindValue(":nome_usuario", $dados['nomeuser']);
            $queryInsert->bindValue(":empresa_consulta", $dados['empresa']);
            $queryInsert->bindValue(":dado_consulta", $cpf);
            $queryInsert->bindValue(":tipo_consulta", "Consulta por Código do Imóvel");
            $queryInsert->bindValue(":base_consulta", "Base Local");
            $queryInsert->bindValue(":data_consulta", $now);
            $queryInsert->execute();
        }
    }
}
