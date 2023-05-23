<?php

    include('./data/banco.php');
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT *FROM bd_emprega_aruja.tb_cadastro_vaga where id_vaga='$id'";
    
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Banco::desconectar();



    foreach ($pdo->query($sql) as $row) {
        $titulo     = $row['titulo'];
        $profissao   = $row['profissao'];
        $hierarquia   = $row['hierarquia'];
        $descricao  = $row['descricao'];
        $periodo  = $row['periodo'];
        $salario = $row['salario'];
        $escolaridade = $row['escolaridade'];
        $vagas = $row['quantidade'];
        $cep = $row['cep'];
        $endereco = $row['endereco'];
        $numeroend = $row['numero'];
        $complemento = $row['complemento'];
        $cidade = $row['cidade'];
        $bairro = $row['bairro'];
        $estado = $row['estado'];
        $status = $row['status'];
        $indentificador= $row['id_indet_cad'];
        $vaga_exclusiva_pcd = $row['vaga_exclusiva_pcd'];
        $deficiencia_exc = $row['deficiencia_exc'];
        $dados_def_exc = $row['dados_def_exc'];
        $vaga_tambem_pcd = $row['vaga_tambem_pcd'];
        $deficiencia_tbm = $row['deficiencia_tbm'];
        $dados_def_tbm = $row['dados_def_tbm'];
    }


    $adicionais = "SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga_adicionais where id_vaga = '$id'";

    foreach ($pdo->query($adicionais) as $add) {

            $tempo = $add['tempo_experiencia'];
            $idade = $add['idade'];
            $habilitacao = $add['habilitacao'];
            $tipohabi = $add['tipo_habilitacao'];
            $veiculo= $add['veiculo'];
            $viajar = $add['viajar'];
            $mudar = $add['mudar'];
            // $pis_nis = $add['pis_nis'];
    }







?>
