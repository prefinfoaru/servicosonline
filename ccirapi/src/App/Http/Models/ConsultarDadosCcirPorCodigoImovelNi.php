<?php

namespace Apps\Http\Models;


class ConsultarDadosCcirPorCodigoImovelNi
{

    private static $table1 = 'tb_busca_ni';
    private static $table2 = 'tb_consultas';
    private static $table3 = 'tb_consultas_externas';

    public static function select(array $dados, $cpf, $token)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS, array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
        $verificaImovel =  $connPdo->prepare(' SELECT  count(id_busca) FROM  ' . self::$table1 . ' WHERE cpf=:cpf');
        $verificaImovel->bindValue(':cpf', $cpf);
        $verificaImovel->execute();
        if ($verificaImovel->fetchColumn() > 0) {
            $dadosConsulta = $connPdo->prepare('SELECT * FROM  ' . self::$table1 . '  WHERE cpf=:cpf');
            $dadosConsulta->bindValue(':cpf', $cpf);
            $dadosConsulta->execute();
            $dadosConsultaFinal = $dadosConsulta->fetchAll(\PDO::FETCH_OBJ);

            // self::salvaconsulta($dados, $cpf);

            return $dadosConsultaFinal;
        } else {
            return false;
        }
    }

    public static function selectSemSalvar(array $dados, $cpf, $token)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS, array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
        $verificaImovel =  $connPdo->prepare(' SELECT  count(id_busca) FROM  ' . self::$table1 . ' WHERE cpf=:cpf');
        $verificaImovel->bindValue(':cpf', $cpf);
        $verificaImovel->execute();
        if ($verificaImovel->fetchColumn() > 0) {
            $dadosConsulta = $connPdo->prepare('SELECT * FROM  ' . self::$table1 . '  WHERE cpf=:cpf');
            $dadosConsulta->bindValue(':cpf', $cpf);
            $dadosConsulta->execute();
            $dadosConsultaFinal = $dadosConsulta->fetchAll(\PDO::FETCH_OBJ);

            return $dadosConsultaFinal;
        } else {
            return false;
        }
    }

    public static function salvaconsulta($dados, $cpf)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS, array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
        if ($dados['empresa'] == "Prefeitura") {
            $now = date('Y-m-d H:i:s');
            $queryInsert = $connPdo->prepare('INSERT INTO  ' . self::$table2 . ' (nome_usuario,dado_consulta,tipo_consulta,base_consulta,data_consulta) 
            VALUES(:nome_usuario,:dado_consulta,:tipo_consulta,:base_consulta,:data_consulta)');
            $queryInsert->bindValue(":nome_usuario", $dados['nomeuser']);
            $queryInsert->bindValue(":dado_consulta", $cpf);
            $queryInsert->bindValue(":tipo_consulta", "Consulta por Número do CPF");
            $queryInsert->bindValue(":base_consulta", "Base Local");
            $queryInsert->bindValue(":data_consulta", $now);
            $queryInsert->execute();
        } else {
            $now = date('Y-m-d H:i:s');
            $queryInsert = $connPdo->prepare('INSERT INTO  ' . self::$table3 . ' (nome_usuario,empresa_consulta,dado_consulta,tipo_consulta,base_consulta,data_consulta) 
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
