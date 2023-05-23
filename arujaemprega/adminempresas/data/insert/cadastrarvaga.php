<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

    session_start();
    include('./variaveis.php');
    include('../banco.php');
    if(isset($_POST['cadastrar']))
    
    {
        $iduser=$_SESSION['iduser'];
        if(empty($titulo)||empty($profissao)||empty($cargo)||
        empty($descricao)||empty($periodo)||empty($salario)||
        empty($escolaridade)||empty($quantidade)||empty($cep) ||empty($numero)||empty($cidade)||
        empty($estado) || empty($iduser)
        ){

            header("Location: ../../index.php?p=cadastrarvaga");
            $_SESSION['msgcad']=0; 
        }
        else{
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query_solicitacao =  $pdo->prepare("INSERT INTO `bd_emprega_aruja`.`tb_cadastro_vaga` (`titulo`,`profissao`,`hierarquia`,`descricao`,`periodo`,`salario`,`escolaridade`,`quantidade`,
            `cep`,`endereco`,`numero`,`complemento`,`cidade`,`bairro`,`estado`,`status`,`data`,`id_empresa`,`vaga_exclusiva_pcd`,`deficiencia_exc`,`dados_def_exc`,`vaga_tambem_pcd`,
            `deficiencia_tbm`,`dados_def_tbm`,`id_indet_cad`,`sigla`,`anonimo`,`dias_vaga`) 
            VALUES (:titulo, :profissao, :cargo, :descricao, :periodo, :salario, :escolaridade, :quantidade, :cep, :endereco, :numero, :complemento,
             :cidade, :bairro, :estado, :status, :data, :iduser, :def, :defselect, :dados_def, :def2, :defselect2, :dados_def2, :identificador, :sigla, :anonimo, :dias_vaga)");
			
            $query_solicitacao->bindValue(":titulo", $titulo);
            $query_solicitacao->bindValue(":profissao", $profissao);
            $query_solicitacao->bindValue(":cargo", $cargo);
            $query_solicitacao->bindValue(":descricao", $descricao);
            $query_solicitacao->bindValue(":periodo", $periodo);
            $query_solicitacao->bindValue(":salario", $salario);
            $query_solicitacao->bindValue(":escolaridade", $escolaridade);
            $query_solicitacao->bindValue(":quantidade", $quantidade);
            $query_solicitacao->bindValue(":cep", $cep);
            $query_solicitacao->bindValue(":endereco", $endereco);
            $query_solicitacao->bindValue(":numero", $numero);
            $query_solicitacao->bindValue(":complemento", $complemento);
            $query_solicitacao->bindValue(":cidade", $cidade);
            $query_solicitacao->bindValue(":bairro", $bairro);
            $query_solicitacao->bindValue(":estado", $estado);
            $query_solicitacao->bindValue(":status", 0);
            $query_solicitacao->bindValue(":data", $data);
            $query_solicitacao->bindValue(":iduser", $iduser);
            $query_solicitacao->bindValue(":def", $def);
            $query_solicitacao->bindValue(":defselect", $defselect);
            $query_solicitacao->bindValue(":dados_def", $dados_def);
            $query_solicitacao->bindValue(":def2", $def2);
            $query_solicitacao->bindValue(":defselect2", $defselect2);
            $query_solicitacao->bindValue(":dados_def2", $dados_def2);
            $query_solicitacao->bindValue(":identificador", $identificador);
            $query_solicitacao->bindValue(":sigla", $sigla);
            $query_solicitacao->bindValue(":anonimo", $anonimo);
            $query_solicitacao->bindValue(":dias_vaga", 0);

            if($query_solicitacao->execute()){
                $idvaga=$pdo->lastInsertId();
                 echo 	"<script>window.location.href ='../../index.php?p=dadosAdicionaisVaga&identificador=".$identificador."&cad=1&vaga=".$idvaga."'</script>";
                exit();
                header('Location: ../../index.php?p=listarvagas&cad=1');
            }
            else{
                // var_dump($query_solicitacao);
                // exit();
                header("Location: ../../index.php?p=cadastrarvaga");
                $_SESSION['msgcad']=0; 
            }

        }
    }
