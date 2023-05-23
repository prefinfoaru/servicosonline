<?php

namespace Apps\Http\Models;

class DadosCcirExterno
{
    private static $table1 = 'tb_dados_ccir_externo';


    public static function verifica($cod)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $query = $connPdo->prepare('SELECT * FROM  ' . self::$table1 . ' WHERE codigo_imovel=:codigo_imovel');
        $query->bindValue(":codigo_imovel", $cod);
        $query->execute();
        if ($query->rowCount() > 0) {
            $row_dados = $query->fetch();
            return $row_dados;
        } else {
            return false;
        }
    }
    public static function inserir($dados, $connPdo)
    {

        $dados = json_decode(json_encode($dados));
        $insertCcirExterno = $connPdo->prepare('INSERT INTO ' . self::$table1 . ' (codigo_imovel_incra, area_certificada, area_medida, area_modulo_fiscal, area_modulo_rural, area_total, classificacao_fundiaria, data_processamento_ultima_declaracao, denomicao, fracao_minima_parcelamento, indicacoes_localizacao, municipio_sede, numero_modulos_fiscais, numero_modulos_rurais, total_area_posse_justo_titulo, total_area_posse_simples_ocupacao, total_area_registrada, total_pessoas_relacionadas_imovel, uf_sede, data_atualizacao) 
        VALUES (:codigo_imovel_incra,:area_certificada, :area_medida, :area_modulo_fiscal, :area_modulo_rural, :area_total, :classificacao_fundiaria, :data_processamento_ultima_declaracao, :denomicao, :fracao_minima_parcelamento, :indicacoes_localizacao, :municipio_sede, :numero_modulos_fiscais, :numero_modulos_rurais, :total_area_posse_justo_titulo, :total_area_posse_simples_ocupacao, :total_area_registrada, :total_pessoas_relacionadas_imovel, :uf_sede, :data_atualizacao);');
        $insertCcirExterno->bindValue(":codigo_imovel_incra", $dados->codigoImovelIncra);
        $insertCcirExterno->bindValue(":area_certificada", $dados->areaCertificada);
        $insertCcirExterno->bindValue(":area_medida", $dados->areaMedida);
        $insertCcirExterno->bindValue(":area_modulo_fiscal", $dados->areaModuloFiscal);
        $insertCcirExterno->bindValue(":area_modulo_rural", $dados->areaModuloRural);
        $insertCcirExterno->bindValue(":area_total", $dados->areaTotal);
        $insertCcirExterno->bindValue(":classificacao_fundiaria", $dados->classificacaoFundiaria);
        $insertCcirExterno->bindValue(":data_processamento_ultima_declaracao", $dados->dataProcessamentoUltimaDeclaracao);
        $insertCcirExterno->bindValue(":denomicao", $dados->denominacao);
        $insertCcirExterno->bindValue(":fracao_minima_parcelamento", $dados->fracaoMinimaParcelamento);
        $insertCcirExterno->bindValue(":indicacoes_localizacao", $dados->indicacoesLocalizacao);
        $insertCcirExterno->bindValue(":municipio_sede", $dados->municipioSede);
        $insertCcirExterno->bindValue(":numero_modulos_fiscais", $dados->numeroModulosFiscais);
        $insertCcirExterno->bindValue(":numero_modulos_rurais", $dados->numeroModulosRurais);
        $insertCcirExterno->bindValue(":total_area_posse_justo_titulo", $dados->totalAreaPosseJustoTitulo);
        $insertCcirExterno->bindValue(":total_area_posse_simples_ocupacao", $dados->totalAreaPosseSimplesOcupacao);
        $insertCcirExterno->bindValue(":total_area_registrada", $dados->totalAreaRegistrada);
        $insertCcirExterno->bindValue(":total_pessoas_relacionadas_imovel", $dados->totalPessoasRelacionadasImovel);
        $insertCcirExterno->bindValue(":uf_sede", $dados->ufSede);
        $insertCcirExterno->bindValue(":data_atualizacao", $dados->dataAtualizacao);
        $insertCcirExterno->execute();
        if ($insertCcirExterno->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public static function update($cod)
    {
    }
}
