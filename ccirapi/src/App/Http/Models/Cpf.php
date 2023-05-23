<?php

namespace Apps\Http\Models;


class Cpf
{
    private static $table1 = 'tb_dados_cpf';
    private static $table3 = 'tb_consulta_externa';
    private static $table4 = 'tb_consulta_externa_comp';

    public static function select(string $cpf)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $buscaDadosCnpj = 'SELECT * FROM  ' . self::$table1 . ' WHERE cpf=:cpf';
        $stmt = $connPdo->prepare($buscaDadosCnpj);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $now = date('Y-m-d H:i:s');
            $sqlInsert = 'INSERT INTO ' . self::$table3 . '  (cpf_cnpj_consultado,tipo_consulta,empresa_consulta,base_consulta,data_consulta) VALUES(:cpfCnpjCon,:tipo,:empresa,:base,:data)';
            $exec = $connPdo->prepare($sqlInsert);
            $exec->bindValue(':cpfCnpjCon', $cpf);
            $exec->bindValue(':tipo', "CPF");
            $exec->bindValue(':empresa', "SILTECNOLOGIA");
            $exec->bindValue(':base', "Base Local");
            $exec->bindValue(':data', $now);
            $exec->execute();
            $cpfDados = $stmt->fetch(\PDO::FETCH_ASSOC);
            // return $socios;
            return  array("cpf" => $cpfDados);
        } else {
            throw new \Exception("Nenhum usuário encontrado");
        }
    }
    public static function selectcomp(array $dados, string $cpf)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $buscaDadoscpf = 'SELECT cpf,nome,situacao_cadastral,residente_exterior,codigo_pais_exterior,nome_pais_exterior
        nome_mae,data_nascimento,sexo,natureza_ocupacao,ocupacao_principal,exercicio_ocupacao,tipo_logradouro,logradouro,numero,complemento,
        cep,bairro,codigo_municipio,municipio,uf,ddd1,telefone1,unidade_administrativa,ano_obito,estrangeiro,data_atualizacao FROM  ' . self::$table1 . ' WHERE cpf=:cpf';
        $stmt = $connPdo->prepare($buscaDadoscpf);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $now = date('Y-m-d H:i:s');
            $queryInsert = $connPdo->prepare('INSERT INTO  ' . self::$table4 . ' (nome_usuario,cpf_cnpj_consultado,cpf_consulta,tipo_consulta,empresa_consulta,base_consulta,data_consulta) VALUES(:nome_usuario,:cpf_cnpj_consultado,:cpf_consulta,:tipo_consulta,:empresa_consulta,:base_consulta,:data_consulta)');
            $queryInsert->bindValue(":nome_usuario", $dados['nomeuser']);
            $queryInsert->bindValue(":cpf_cnpj_consultado", $cpf);
            $queryInsert->bindValue(":cpf_consulta", $dados['cpf']);
            $queryInsert->bindValue(":tipo_consulta", "CPF");
            $queryInsert->bindValue(":empresa_consulta", $dados['empresa']);
            $queryInsert->bindValue(":base_consulta", "Base Local");
            $queryInsert->bindValue(":data_consulta", $now);
            $queryInsert->execute();
            $empresa = $stmt->fetch(\PDO::FETCH_ASSOC);
            // return $socios;
            return  array("Consulta CPF" => $empresa);
        } else {
            return Infoconv::consultainfoconvcpf($dados, $cpf);
        }
    }
    public static function validacpf(string $cpf)
    {
        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
}
