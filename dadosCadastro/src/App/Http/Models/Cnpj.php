<?php

namespace Apps\Http\Models;

class Cnpj
{
    private static $table1 = 'tb_dados_cnpj';
    private static $table2 = 'tb_dados_cnpj_sociedade';
    private static $table3 = 'tb_consulta_externa';
    private static $table4 = 'tb_consulta_externa_comp';

    public static function select(string $cnpj)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $buscaDadosCnpj = 'SELECT * FROM  ' . self::$table1 . ' WHERE cnpj=:cnpj';
        $stmt = $connPdo->prepare($buscaDadosCnpj);
        $stmt->bindValue(':cnpj', $cnpj);
        $stmt->execute();

        $buscaSocios = 'SELECT A.* FROM  ' . self::$table2 . ' AS A  INNER JOIN ' . self::$table1 . ' AS B ON A.id_dados_cnpj=B.id_dados_cnpj  WHERE cnpj=:cnpj';
        $buscaExec = $connPdo->prepare($buscaSocios);
        $buscaExec->bindValue(':cnpj', $cnpj);
        $buscaExec->execute();

        if ($stmt->rowCount() > 0) {
            $now = date('Y-m-d H:i:s');
            $sqlInsert = 'INSERT INTO ' . self::$table3 . '  (cpf_cnpj_consultado,tipo_consulta,empresa_consulta,base_consulta,data_consulta) VALUES(:cpfCnpjCon,:tipo,:empresa,:base,:data)';
            $exec = $connPdo->prepare($sqlInsert);
            $exec->bindValue(':cpfCnpjCon', $cnpj);
            $exec->bindValue(':tipo', "CNPJ");
            $exec->bindValue(':empresa', "SILTECNOLOGIA");
            $exec->bindValue(':base', "Base Local");
            $exec->bindValue(':data', $now);
            $exec->execute();
            $empresa = $stmt->fetch(\PDO::FETCH_ASSOC);
            $socios = $buscaExec->fetchAll(\PDO::FETCH_ASSOC);
            return  array("Cnpj" => $empresa, "Socio" =>  $socios);
        } else {
            throw new \Exception("Nenhum usuário encontrado");
        }
    }

    public static function selectcomp(array $dados, $cnpj)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $buscaDadosCnpj = ' SELECT  `cnpj`,`estabelecimento`,`nome_empresarial`, `nome_fantasia`,`situacao_cadastral`, `data_situacao_cadastral`, `cidade_exterior`, `codigo_pais`, `nome_pais`, `natureza_juridica`, `data_abertura`, `cnae_principal`, `cnae_secundario`,`tipo_logradouro`,`logradouro`,`numero_logradouro`,`complemento`,`bairro`,`cep`,`uf`,`codigo_municipio`,`nome_municipio`,`ddd1`,`telefone1`,`ddd2`,`telefone2`,`email`,`cpf_responsavel`,`nome_responsavel`,`capital_social`,`tipo_crc_contador_pj`,`classificacao_crc_contador_pj`,`numero_crc_contador_pj`,`uf_crc_contador_pj`,`cnpj_contador`,`tipo_crc_contador_pf`,`classificacao_crc_contador_pf`,`numero_crc_contador_pf`,`uf_crc_contador_pf`,`cpf_contador`,`porte`,`opcao_simples`,`data_opcao_simples`,`data_exclusao_simples`,
        `cnpj_sucedida` FROM  ' . self::$table1 . ' WHERE cnpj=:cnpj';
        $stmt = $connPdo->prepare($buscaDadosCnpj);
        $stmt->bindValue(':cnpj', $cnpj);
        $stmt->execute();

        $buscaSocios = 'SELECT A.tipo,A.nome,A.numero,A.percentual_participacao,A.codigo_pais_origem,A.nome_pais_origem FROM  ' . self::$table2 . ' AS A  INNER JOIN ' . self::$table1 . ' AS B ON A.id_dados_cnpj=B.id_dados_cnpj  WHERE cnpj=:cnpj';
        $buscaExec = $connPdo->prepare($buscaSocios);
        $buscaExec->bindValue(':cnpj', $cnpj);
        $buscaExec->execute();

        if ($stmt->rowCount() > 0) {
            $now = date('Y-m-d H:i:s');
            $queryInsert = $connPdo->prepare('INSERT INTO  ' . self::$table4 . ' (nome_usuario,cpf_cnpj_consultado,cpf_consulta,tipo_consulta,empresa_consulta,base_consulta,data_consulta) VALUES(:nome_usuario,:cpf_cnpj_consultado,:cpf_consulta,:tipo_consulta,:empresa_consulta,:base_consulta,:data_consulta)');
            $queryInsert->bindValue(":nome_usuario", $dados['nomeuser']);
            $queryInsert->bindValue(":cpf_cnpj_consultado", $cnpj);
            $queryInsert->bindValue(":cpf_consulta", $dados['cpf']);
            $queryInsert->bindValue(":tipo_consulta", "CNPJ");
            $queryInsert->bindValue(":empresa_consulta", $dados['empresa']);
            $queryInsert->bindValue(":base_consulta", "Base Local");
            $queryInsert->bindValue(":data_consulta", $now);
            $queryInsert->execute();
            $empresa = $stmt->fetch(\PDO::FETCH_ASSOC);
            $socios = $buscaExec->fetchAll(\PDO::FETCH_ASSOC);
            // return $socios;
            return  array("Cnpj" => $empresa, "Socio" =>  $socios);
        } else {
            return Infoconv::consultainfoconvcnpj($dados, $cnpj);
        }
    }

    public static function validacnpj(string $cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }
}
