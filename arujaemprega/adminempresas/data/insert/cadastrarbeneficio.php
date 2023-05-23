<?php
    
    session_start();
    $perbeneficios=isset($_POST['perbeneficios'])? $_POST['perbeneficios']:null;
    $beneficios=isset($_POST['beneficios'])? $_POST['beneficios']:null;
    $id=$_POST['idvaga'];
    
    include('../banco.php');
    if(isset($_POST['cadastrar']))
    {
        if(empty($perbeneficios))
        {
               
                 header("Location: ../../index.php?p=dadosBeneficiosVaga&id=$id");
                $_SESSION['msgbene']=0;   
                    
        }
        else{
            $qtdbeneficios=count($_POST['beneficios']);
            if(empty($beneficios))
            {
                header("Location: ../../index.php?p=dadosIdiomasVaga&id=$id");
                $_SESSION['msgbene']=1;
            }
            else
            {
                for($i=0;$i< $qtdbeneficios;$i++)
                {
                    $pdo = Banco::conectar();
                    $query_solicitacao =  "INSERT INTO `bd_emprega_aruja`.`tb_cadastro_vaga_beneficios` (`id_vaga`,`nome`) 
                    VALUES ($id,'$beneficios[$i]') ";
                    
                    //var_dump($query_solicitacao);
                    $resultado_cadastro = $pdo->query($query_solicitacao);
                            
                }
                if( $pdo->lastInsertId()){
                    header("Location: ../../index.php?p=dadosIdiomasVaga&id=$id");
                    $_SESSION['msgbene']=1; 
                }
                else{
                    header("Location: ../../index.php?p=dadosBeneficiosVaga&id=$id");
                    $_SESSION['msgbene']=0; 
                }
            }
        }
    }
?>