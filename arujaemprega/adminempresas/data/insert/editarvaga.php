<?php
    include('./variaveis.php');
    include('../banco.php');
    if(isset($_POST['editar']))
    {
        $id=$_POST['id'];
        if(empty($titulo)||empty($profissao)||empty($cargo)||
        empty($descricao)||empty($periodo)||empty($salario)||
        empty($escolaridade)||empty($quantidade)||empty($cep)||
        empty($endereco)||empty($numeroend)||empty($cidade)||
        empty($bairro)||empty($estado) || empty($id)
        ){
           
            echo "preencha todos os campos";
        }
        else{
            
            $pdo = Banco::conectar();
            $query_solicitacao =  "UPDATE `bd_emprega_aruja`.`tb_cadastro_vaga` SET 
            `titulo`='$titulo',`profissao`='$profissao',`hierarquia`='$cargo',`descricao`='$descricao',`periodo`='$periodo', 
            `salario`='$salario', `escolaridade`= '$escolaridade',`quantidade`= $quantidade, `cep`='$cep',`endereco`='$endereco',
            `numero`='$numeroend',`complemento`='$complemento',`cidade`='$cidade',`bairro`='$bairro',`estado`='$estado',`vaga_exclusiva_pcd`='$def',`deficiencia_exc`='$defselect',
            `dados_def_exc`='$dados_def',`vaga_tambem_pcd`='$def2',`deficiencia_tbm`='$defselect2',`dados_def_tbm`='$dados_def2'  WHERE id_vaga=$id";
            // var_dump($query_solicitacao);
            $resultado_cadastro = $pdo->query($query_solicitacao);
            if( $resultado_cadastro){
                  header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/index.php?p=dadosEditarVaga&?edit=1&id='.$id);
            }
            else{
                 header('Location: https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/index.php?p=dadosEditarVaga&?edit=0&id='.$id);
            }
        }
    }
?>