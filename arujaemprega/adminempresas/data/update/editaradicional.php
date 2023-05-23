<?php
    
    session_start();
    $optexperiencia=$_POST['optexperiencia'] == 'Sim' ? $_POST['experiencia']: '';
    $optidade= $_POST['optidade'] == "Sim" ? $_POST['idade']:'';
    // $experiencia=isset($_POST['experiencia'])? $_POST['experiencia']:null;
    // $idade=isset($_POST['idade'])? $_POST['idade']:null;
    $habilitacao= $_POST['habilitacao'];
    $tipohabilitacao= $_POST['habilitacao'] == "Sim" ? $_POST['categoria']:"";
    $veiculo=isset($_POST['veiculo'])? $_POST['veiculo']:null;
    $viajar=isset($_POST['viajar'])? $_POST['viajar']:null;
    $mudar=isset($_POST['mudar'])? $_POST['mudar']:null;
    $id=($_POST['idvaga']);
    include('../banco.php');
    if(isset($_POST['cadastrar']))
    {
       
            $pdo = Banco::conectar();
            $query_solicitacao = "UPDATE `bd_emprega_aruja`.`tb_cadastro_vaga_adicionais` SET `tempo_experiencia`='$optexperiencia', `idade`='$optidade', `habilitacao`='$habilitacao', `tipo_habilitacao`='$tipohabilitacao', `veiculo`='$veiculo', `viajar`='$viajar', `mudar`='$mudar' WHERE `id_vaga`='$id'";
           
            //var_dump($query_solicitacao);
            $resultado_cadastro = $pdo->query($query_solicitacao);
            if( $resultado_cadastro){
            header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/index.php?p=editarAdicionaisVaga&edtadicionais=1&id='.$id);
          
            }
            else{
                header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/index.php?p=editarAdicionaisVaga&edtadicionais=0&id='.$id);
           
            }
        
    }
?>