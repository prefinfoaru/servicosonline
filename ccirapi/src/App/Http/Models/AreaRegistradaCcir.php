<?php

namespace Apps\Http\Models;

class AreaRegistradaCcir
{
    private static $table1 = 'tb_area_registrada_ccir';


    public static function inserir($dados, $connPdo)
    {
    
        $dados = json_decode(json_encode($dados));
        foreach ($dados as $newDados) {
            $insertArearegistrada = $connPdo->prepare('INSERT INTO ' . self::$table1 . ' (codigo_imovel, area, cns_ou_oficio, data_registro, livro_ou_ficha, matricula_ou_transcricao, municipio_cartorio, registro, uf_cartorio) 
        VALUES (:codigo_imovel,:area, :cns_ou_oficio, :data_registro, :livro_ou_ficha, :matricula_ou_transcricao, :municipio_cartorio, :registro, :uf_cartorio);');
            $insertArearegistrada->bindValue(":codigo_imovel", $newDados->codigoImovel);
            $insertArearegistrada->bindValue(":area", $newDados->area);
            $insertArearegistrada->bindValue(":cns_ou_oficio", $newDados->cnsOuOficio);
            $insertArearegistrada->bindValue(":data_registro", $newDados->dataRegistro);
            $insertArearegistrada->bindValue(":livro_ou_ficha", $newDados->livroOuFicha);
            $insertArearegistrada->bindValue(":matricula_ou_transcricao", $newDados->matriculaOuTranscricao);
            $insertArearegistrada->bindValue(":municipio_cartorio", $newDados->municipioCartorio);
            $insertArearegistrada->bindValue(":registro", $newDados->registro);
            $insertArearegistrada->bindValue(":uf_cartorio", $newDados->ufCartorio);
            $insertArearegistrada->execute();
        }
        return true;
        // if ($insertArearegistrada->rowCount() > 0 ) {
        //     return true;
        // } else {
        //     return false;
        // }
    }
    public static function update($cod)
    {
    }
}
