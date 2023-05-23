        <!-- Resultado da pesquisa -->

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

// //Querys**************************************************************************************************************************************************************************************
if(!empty($_POST)){ 
     $cpf = $_POST['cpf'];
     } else {
     $cpf = '';
}
    
    
// //***********************************************************************************************************************************************************************
// //Tratam valor recebido **********************************************************************************************************************************************************************
 $cpf_s_p     = $valor_recebido	= str_replace("." ,"", $cpf);
 $cpf_s_t     = $valor_recebido	= str_replace("-" ,"", $cpf_s_p);
 $cpf_tratado = $valor_recebido	= str_replace("/" ,"", $cpf_s_t);
// //********************************************************************************************************************************************************************************************
 $query_con_cpf = "SELECT * FROM bd_emprega_aruja.tb_cadastrousuario_restrito where cpf = '$cpf_tratado'";

 foreach($pdo->query($query_con_cpf )as $row){
							
$nome   = $row['nome'];	
$email  = $row['email'];	
$id     = $row['id_cadastrorestrito'];	

}
if (empty($nome)){
    $bloqueia = '1';
}else{
    $bloqueia = '2';
}

?>

        <script src="./assets/js/sweetalert.js" type="text/javascript"></script>
        <link href="./assets/css/sweetalert.css" rel="stylesheet">

        <?php
        if ($res == 1  ){ ?>

        <script>
swal.fire({
    title: 'Senha atualizada com Sucesso!',
    icon: "success",
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=altersenhausup">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
        </script>

        <?php  }  
        
        if ($res  == 2 ){?>

        <script>
swal.fire({
    icon: 'error',
    title: 'Não foi possivel atualizar a senha!',
    text: 'Por favor, tente novamente.',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=altersenhausup">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
        </script>

        <?php  } ?>



        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="100">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">Menu Administração</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>

                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Consultar Usuário da Prefeitura (Alterar senha) </h4>
                                    <p class="card-category">Àrea para acesso do responsavél pelo Arujá Emprega, onde é
                                        possivel alterar a senha e consultar o nome de usuario.

                                    </p>
                                </div>

                                <div class="container">
                                    <br>
                                    <p style="color: #3E3E3E">Por favor Digite um CPF válido para verificarmos o
                                        cadastro em nosso banco de dados </p>
                                    <form action="" method="post">
                                        <div class="form-input">
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">CPF</label>
                                                    <input type="text" name="cpf" id="cpf" class="form-control"
                                                        placeholder="Digite um CPF sem pontos ou barras">
                                                </div>

                                                <button type="submit" class="btn btn-info btn-fill pull-right">Consultar
                                            </div>
                                            </button>
                                        </div>

                                        <br>
                                        <br>
                                </div>
                                </form><br>


                                <div class="container">
                                    <p style="color:#44A865"><i class="nc-icon nc-zoom-split" style="color:#44A865">
                                            Resultado da Busca</i></p>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>Usuário</label>
                                                <input type="text" class="form-control" disabled=""
                                                    value="<?php  if (empty($nome)){echo "..." ;}else {echo $nome;} ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="text" class="form-control" placeholder="Username"
                                                    value="<?php if (empty($email)){echo "..." ;}else {echo $email;}  ?>"
                                                    disabled="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Menu</label>

                                            </div>
                                            <?php   if($bloqueia == '1'){echo   'Sem registro';}else{?>
                                            <a href="?p=dadosaltersenhausu&idusu=<?php echo $id ; ?>">
                                                <i class="nc-icon nc-zoom-split" style="color: #BB5153 ; font-family:">
                                                    Editar </i></a>
                                            <?php } ?>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>