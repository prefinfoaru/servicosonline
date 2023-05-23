<?php
    
    session_start();
    $beneficios= $_POST['perbeneficios'] == 'Sim' ? $_POST['beneficios'] : null;
  
    $id=$_POST['idvaga'];
    
    include('../banco.php');
    include('../conexao.php');
   
    if(isset($_POST['cadastrar']))
    {

    
         if(empty($beneficios))
         {
              $deleteben = "DELETE FROM `bd_emprega_aruja`.`tb_cadastro_vaga_beneficios` WHERE `id_vaga`='$id'";

            $deletebeneficios = mysqli_query($conn,$deleteben);

             if($deletebeneficios){

                header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/index.php?p=editarBeneficiosVaga&edtbeneficios=1&id='.$id);
             }else{
                header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/index.php?p=editarBeneficiosVaga&edtbeneficios=0&id='.$id);
             }
            
                    
        }
        else{
            $deleteben = "DELETE FROM `bd_emprega_aruja`.`tb_cadastro_vaga_beneficios` WHERE `id_vaga`='$id'";

            $deletebeneficios = mysqli_query($conn,$deleteben);

             if($deletebeneficios){
                 $qtdbeneficios = count($_POST['beneficios']);
            
                for($i=0;$i< $qtdbeneficios;$i++)
                {
                    
                    $query_solicitacao =  "INSERT INTO `bd_emprega_aruja`.`tb_cadastro_vaga_beneficios` (`id_vaga`,`nome`) 
                    VALUES ($id,'$beneficios[$i]') ";
                    
                    // var_dump($query_solicitacao);
                    $resultado_cadastro = $pdo->query($query_solicitacao);
                            
                }
                if( $pdo->lastInsertId()){
                    header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/index.php?p=editarBeneficiosVaga&edtbeneficios=1&id='.$id);
                }
                else{
                    header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/index.php?p=editarBeneficiosVaga&edtbeneficios=0&id='.$id);
                }
            }else{

                header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/index.php?p=editarBeneficiosVaga&edtbeneficios=0&id='.$id);
            }
        }
    }
?>