<?php
    
    session_start();
    $peridiomas=isset($_POST['optidioma'])? $_POST['optidioma']:null;
    $idiomas=isset($_POST['idioma'])? $_POST['idioma']:null;
    $nivel=isset($_POST['nivel'])? $_POST['nivel']:null;
    $obrigatorio=isset($_POST['obrigatorio'])? $_POST['obrigatorio']:null;
    $id=$_POST['idvaga'];
    
    include('../banco.php');
    if(isset($_POST['cadastrar']))
    {
        if(empty($peridiomas))
        {
               
                 header("Location: ../../index.php?p=dadosIdiomasVaga&id=$id");
                $_SESSION['msgidio']=0;   
                    
        }
        else if($peridiomas == "Não")
        {
            header("Location: ../../index.php?p=dadosInformaticaVaga&id=$id");
        }
        else{
            $qtdidiomas=count($_POST['idioma']);
            //var_dump($idiomas);
            for($i=0;$i< $qtdidiomas;$i++)
            {
  
                
                $pdo = Banco::conectar();
                $query_solicitacao =  "INSERT INTO `bd_emprega_aruja`.`tb_cadastro_vaga_idiomas` (`id_vaga`,`nome`,`nivel`,`obrigatorio`) 
                VALUES ($id,'$idiomas[$i]','$nivel[$i]','$obrigatorio[$i]') ";
                
               // var_dump($query_solicitacao);
                $resultado_cadastro = $pdo->query($query_solicitacao);
                          
            }
            if( $pdo->lastInsertId()){
                 header("Location: ../../index.php?p=dadosInformaticaVaga&id=$id");
                $_SESSION['msgidio']=1; 
            }
            else{
                header("Location: ../../index.php?p=dadosIdiomasVaga&id=$id");
                $_SESSION['msgidio']=0; 
            }
        }
    }
?>