<?php

namespace Apps\Http\Models;

class ControleCcir
{
    private static $table1 = 'tb_dados_controle_ccir';


    public static function inserir($dados, $connPdo)
    {
        $dados = json_decode(json_encode($dados));
        $inserControleCcir = $connPdo->prepare('INSERT INTO ' . self::$table1 . ' (codigo_imovel, data_geracao_ccir, data_lancamento, data_vencimento_ccir, debitos_anteriores, juros, multa, numero_autenticidade_ccir, numero_ccir,situacao_ccir,taxa_servicos_cadastrais,valor_cobrado,valor_total) 
        VALUES (:codigo_imovel,:data_geracao_ccir, :data_lancamento, :data_vencimento_ccir, :debitos_anteriores, :juros, :multa, :numero_autenticidade_ccir, :numero_ccir,:situacao_ccir,:taxa_servicos_cadastrais,:valor_cobrado,:valor_total);');
        $inserControleCcir->bindValue(":codigo_imovel", $dados->codigoImovel);
        $inserControleCcir->bindValue(":data_geracao_ccir", $dados->dataGeracaoCcir);
        $inserControleCcir->bindValue(":data_lancamento", $dados->dataLancamento);
        $inserControleCcir->bindValue(":data_vencimento_ccir", $dados->dataVencimentoCcir);
        $inserControleCcir->bindValue(":debitos_anteriores", $dados->debitosAnteriores);
        $inserControleCcir->bindValue(":juros", $dados->juros);
        $inserControleCcir->bindValue(":multa", $dados->multa);
        $inserControleCcir->bindValue(":numero_autenticidade_ccir", $dados->numeroAutenticidadeCcir);
        $inserControleCcir->bindValue(":numero_ccir", $dados->numeroCcir);
        $inserControleCcir->bindValue(":situacao_ccir", $dados->situacaoCcir);
        $inserControleCcir->bindValue(":taxa_servicos_cadastrais", $dados->taxaServicosCadastrais);
        $inserControleCcir->bindValue(":valor_cobrado", $dados->valorCobrado);
        $inserControleCcir->bindValue(":valor_total", $dados->valorTotal);
        $inserControleCcir->execute();
        if ($inserControleCcir->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public static function update($cod)
    {
    }
}
