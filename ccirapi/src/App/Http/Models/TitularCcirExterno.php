<?php

namespace Apps\Http\Models;

class TitularCcirExterno
{
    private static $table1 = 'tb_titular_ccir_externo';


    public static function inserir($dados, $connPdo)
    {
        $dados = json_decode(json_encode($dados));
        // var_dump($dados);
        foreach ($dados as $newDados) {
            $insertArearegistrada = $connPdo->prepare('INSERT INTO ' . self::$table1 . ' (codigo_imovel, cpf_cnpj, nome_titular, declarante, condicao_titularidade, percentual_detencao, nacionalidade) 
        VALUES (:codigo_imovel,:cpf_cnpj, :nome_titular, :declarante, :condicao_titularidade, :percentual_detencao, :nacionalidade);');
            $insertArearegistrada->bindValue(":codigo_imovel", $newDados->codigoImovel);
            $insertArearegistrada->bindValue(":cpf_cnpj", $newDados->cpfCnpj);
            $insertArearegistrada->bindValue(":nome_titular", $newDados->nomeTitular);
            $insertArearegistrada->bindValue(":declarante", $newDados->declarante);
            $insertArearegistrada->bindValue(":condicao_titularidade", $newDados->condicaoTitularidade);
            $insertArearegistrada->bindValue(":percentual_detencao", $newDados->percentualDetencao);
            $insertArearegistrada->bindValue(":nacionalidade", $newDados->nacionalidade);
            $insertArearegistrada->execute();
        }
        if ($insertArearegistrada->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public static function update($cod)
    {
    }
}
