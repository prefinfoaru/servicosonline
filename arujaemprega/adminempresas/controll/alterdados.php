<?php 
$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('res=', $URL_ATUAL, 2);
if(isset($numprot[1])){

$res    =   $numprot[1];

}else{

    $res = "";

}

//conexao com banco ********************************************************************************************************************************************************************************

include  "./data/banco.php";
$pdo = Banco::conectar();
//Querys**************************************************************************************************************************************************************************************
//***********************************************************************************************************************************************************************
//Tratam valor recebido **********************************************************************************************************************************************************************

//********************************************************************************************************************************************************************************************
$query_con_cpf = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where id_cadastroempresa =  " .$_SESSION['iduser'].";";

foreach($pdo->query($query_con_cpf)as $row)
{
    $cnpj =$row['cnpjcpf'];
    $nome =$row['nome_fantasia'];
    $razao=$row['razao_social'];
    $cep =$row['cep'];
    $rua =$row['rua'];
    $numero =$row['numero'];
    $bairro =$row['bairro'];
    $cidade =$row['cidade'];
    $estado =$row['estado'];
    $complemento =$row['complemento'];
    $ramo = $row['ramo'];
    $celular =$row['celular'];
    $telefone =$row['telefone'];
    $email =$row['email'];
    $responsavel = $row['responsavel'];
 $idusu = $_SESSION['iduser'];   
}




?>

<script src="./assets/js/sweetalert.js" type="text/javascript"></script>
<link href="./assets/css/sweetalert.css" rel="stylesheet">

<?php
        if ($res == 1  ){ ?>

<script>
swal.fire({
    title: 'Dados atualizados com Sucesso!',
    icon: "success",
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=configuracoes">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }  
        
        if ($res  == 2 ){?>

<script>
swal.fire({
    icon: 'error',
    title: 'Não foi possivel atualizar os dados!',
    text: 'Por favor, tente novamente.',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=configuracoes">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>

<?php  }  if ($res  == 3 ){?>

<script>
swal.fire({
    icon: 'error',
    title: 'Formato de Imagem não aceito!',
    text: 'Por favor, tente novamente.',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=configuracoes">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>





<?php }?>



<script>
function mascara(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmascara()", 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function mtel(v) {
    v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}

function id(el) {
    return document.getElementById(el);
}
window.onload = function() {
    id('telefone').onkeyup = function() {
        mascara(this, mtel);
    }
}

function mascara(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmascara()", 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function mtel(v) {
    v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}

function id(el) {
    return document.getElementById(el);
}
window.onload = function() {
    id('telefone2').onkeyup = function() {
        mascara(this, mtel);
    }
}
</script>
<script src="./assets/js/jsjs.js"></script>
<div class="main-panel">
    <!-- Navbar -->
    <br>
    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Alterar Dados</h4>
                        </div>
                        <div class="card-body">
                            <form action="./data/update/alterdado.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>Nome Fantasia</label>
                                            <input type="text" name="nome" class="form-control" disabled=""
                                                value="<?php  echo   $nome; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>CPF/CNPJ</label>
                                            <input type="text" name="cnpj" class="form-control" disabled=""
                                                value="<?php  echo   $cnpj; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Razão Social</label>
                                            <input type="email" name="razao" class="form-control"
                                                value="<?php  echo   $razao; ?>" disabled="">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-2  pr-1">
                                        <div class="form-group">
                                            <label>Cep</label>
                                            <input id="cep" name="cep" placeholder="Apenas números"
                                                class="form-control input-md" required="" value="<?php  echo    $cep;?>"
                                                type="search" maxlength="8" pattern="[0-9]+$">
                                        </div>
                                    </div>
                                    <div class="col-md-2  pr-1">
                                        <div class="form-group">
                                            <br>
                                            <button type="button" class="btn btn-primary"
                                                onclick="pesquisacep(cep.value)">Pesquisar</button>

                                        </div>
                                    </div>
                                    <div class="col-md-6  pr-1">
                                        <div class="form-group">
                                            <label>Rua</label>
                                            <input id="rua" name="endereco" class="form-control" required=""
                                                readonly="readonly" type="text" value="<?php    echo    $rua;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2  pr-1">
                                        <div class="form-group">
                                            <label>Nº</label>
                                            <input id="numero" name="numero" class="form-control"
                                                value="<?php   echo    $numero;?>" required="" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6  pr-1">
                                        <div class="form-group">
                                            <label>Complemento</label>
                                            <input name="complemento" class="form-control"
                                                value="<?php echo $complemento;   ?>" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6  pr-1">
                                        <div class="form-group">
                                            <label>Cidade</label>
                                            <input id="cidade" name="cidade" class="form-control"
                                                value="<?php   echo    $cidade;?>" required="" readonly="readonly"
                                                type="text">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bairro</label>
                                            <input id="bairro" name="bairro" class="form-control"
                                                value="<?php   echo  $bairro;  ?>" required="" readonly="readonly"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input id="estado" name="estado" class="form-control"
                                                value="<?php   echo    $estado;?>" required="" readonly="readonly"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" class="form-control" value="<?php   echo    $email;?>"
                                                required="" type="email">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Ramo de Atividade</label>

                                        <select name="ramo" required="" class="form-control">
                                            <option value="<?php echo    $ramo;?>"><?php echo    $ramo;?></option>
                                            <?php $sql = "SELECT * FROM bd_emprega_aruja.tb_ramoatividade";

                                                    foreach($pdo->query($sql) as $sql){
                                                        
                                                
                                                    echo    '<option value="'   .$sql['descricao'].'">'    .$sql['descricao']   .'</option>';
                                                    }
                                                    ?>
                                        </select>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Celular</label>
                                            <input id="telefone2" name="cel" class="form-control"
                                                value="<?php   echo    $celular;?>"
                                                placeholder="Informe o número do celular" type="text" maxlength="15"
                                                style="width: 100%">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Telefone</label>

                                            <input id="telefone" name="tel" value="<?php   echo    $telefone;?>"
                                                class="form-control" placeholder="Informe o número do telefone"
                                                type="text" required="" maxlength="14" style="width: 100%">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Responsável para contato</label>
                                            <input name="responsavel" class="form-control"
                                                value="<?php   echo    $responsavel;?>"
                                                placeholder="Informe o nome do responsável para contato" type="text"
                                                style="width: 100%">

                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <label class="col-md-6 control-label" for="instituicao">Alterar Logo da
                                            Empresa</label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" name="imagem" id="imgInp"
                                                accept=".jpg,.png,.jpeg"
                                                style="background-color: #58B0EA ; color: #141E4D ; font-size: 11px; width: 98%"><br>

                                        </div>

                                    </div>
                                </div>





                                <div class="row">
                                    <div class="col-md-12 ">
                                        <input type="hidden" name="id" value="<?php echo    $idusu;?>">
                                        <button type="submit" name="button"
                                            class="btn btn-info btn-fill pull-right">Atualizar</button>
                                    </div>

                                </div>




                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php // include(''); ?>