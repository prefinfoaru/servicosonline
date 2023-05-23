<?php
            
            include('../banco.php');
           
            $vaga=$_POST['id'];
			$data	=	date("Y-m-d H:i:s");
        
            $pdo  = Banco::conectar();
            $sql  = "UPDATE `bd_emprega_aruja`.`tb_cadastro_vaga` SET `status`='4', `data`='$data' WHERE `id_vaga`='$vaga' ";
            $exec = $pdo->query($sql);
    
            if($exec){
                header('Location: ../../index.php?p=listarvagas&pausado=1');
            }
            else{
                header('Location: ../../index.php?p=listarvagas&pausado=0');
            }
    
?>