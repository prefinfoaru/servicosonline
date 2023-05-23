<?php 


              //conexao com banco ********************************************************************************************************************************************************************************

include  "./data/banco.php";
$pdo = Banco::conectar();

//Querys**************************************************************************************************************************************************************************************
  
$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('idempresa=', $URL_ATUAL, 2);
echo $id = $numprot[1];





//***********************************************************************************************************************************************************************
//Tratam valor recebido **********************************************************************************************************************************************************************

//********************************************************************************************************************************************************************************************
$query_con_cpf = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where cnpjcpf= = '$id'";

foreach($pdo->query($query_con_cpf)as $row)
{
							
    $nome   = $row['nome'];	
    $email  = $row['email'];	
    $cpf    =$row['cpf'];
    $tel  = $row['tel'];
    $nivel  = $row['nivel'];
    $funcao  = $row['funcao'];
    $idusu = $id;

    if ($nivel == '1'){
        $tipo = 'Administrador';
    }elseif($nivel == '2'){
        $tipo = 'Atendente';
    }if($nivel == '3'){
        $tipo = 'TI';

    }

}




?>


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
</script>

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
                            <h4 class="card-title">Informações da Empresa</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input type="text" name="usuario" class="form-control" disabled=""
                                                value="<?php  echo   $nome; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>CPF</label>
                                            <input type="text" name="cpf" class="form-control" disabled=""
                                                value="<?php  echo   $cpf; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" name="email" class="form-control"
                                                value="<?php  echo   $email; ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input id="telefone" type="text" name="tele" class="form-control"
                                                maxlength="15" value="<?php  echo   $tel; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Nivel de Acesso</label>
                                            <select name="nivel" class="form-control">
                                                <option value="<?php   echo $nivel;?>"><?php    echo    $tipo;?>
                                                </option>
                                                <?php if($tipo == 'Administrador'){?>
                                                <option value="2">Atendente</option>
                                                <?php }elseif($tipo == 'Atendente'){?>
                                                <option value="1">Administrador</option>
                                                <?php }else{ ?>
                                                <option value="2">Atendente</option>
                                                <option value="1">Administrador</option>
                                                <?php } ?>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Função</label>
                                            <input type="text" name="func" class="form-control"
                                                value="<?php  echo   $funcao; ?>">
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

    <?php  include('./data/update/alterdadousupre.php'); ?>