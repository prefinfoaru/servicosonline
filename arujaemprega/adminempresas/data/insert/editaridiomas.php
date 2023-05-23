<?php


   
    $idiomas=isset($_POST['idioma']) ? $_POST['idioma']:null;
    $nivel=isset($_POST['nivel']) ? $_POST['nivel']:null;
    $obrigatorio=isset($_POST['obrigatorio']) ? $_POST['obrigatorio']:null;
    $id=$_POST['idvaga'];
    
    include('../banco.php');
    if(isset($_POST['cadastrar']))
    {
       
                $pdo = Banco::conectar();
                $query_solicitacao =  "INSERT INTO `bd_emprega_aruja`.`tb_cadastro_vaga_idiomas` (`id_vaga`,`nome`,`nivel`,`obrigatorio`) 
                VALUES ($id,'$idiomas','$nivel','$obrigatorio') ";
                
               // var_dump($query_solicitacao);
                $resultado_cadastro = $pdo->query($query_solicitacao);
                if($resultado_cadastro){
                     header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/index.php?p=editarIdiomasVaga&cadidiomas=1&id='.$id);

                }else{


                     header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/index.php?p=editarIdiomasVaga&cadidiomas=0&id='.$id);

                }
                          
            
    }
?>