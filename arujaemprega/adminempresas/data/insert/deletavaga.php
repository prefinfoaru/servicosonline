<?php
            
            include('../banco.php');
           
            $vaga=$_GET['id'];
        
            $pdo  = Banco::conectar();
            $sql  = "DELETE FROM  tb_cadastro_vaga  WHERE id_vaga =$vaga ";
            $exec = $pdo->query($sql);
    
            if($exec){
                header('Location: ../../index.php?p=listarvagas&del=1');
            }
            else{
                header('Location: ../../index.php?p=listarvagas&del=0');
            }
    
?>