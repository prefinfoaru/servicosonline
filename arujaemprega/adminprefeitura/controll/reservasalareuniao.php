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
$query_con_cpf = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where cnpjcpf= '$cpf'";

foreach($pdo->query($query_con_cpf)as $row){
							
$razaosocial   = $row['razao_social'];	
$fantasia  	= $row['nome_fantasia'];	
$logo     = $row['logotipo'];	
$id     = $row['id_cadastroempresa'];	

}
if (empty($razaosocial)){
    $bloqueia = '1';
}else{
    $bloqueia = '2';
}
?>






<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Menu Empresas -> Reservar Sala de Entrevista</a>
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
                            <h4 class="card-title">Consultar Empresas</h4>
                            <p class="card-category">Àrea para acesso do responsavél pelo Arujá Emprega.
                            </p>
                        </div>

                        <div class="container">
                            <br>
                            <p style="color: #3E3E3E">Por favor digite o CNPJ cadastrado para que possamos buscar a
                                empresa.</p>
                            <form action="" method="post">
                                <div class="form-input">
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CNPJ</label>
                                            <input type="text" name="cpf" id="cpf" class="form-control"
                                                placeholder="Digite o CNPJ sem pontos ou barras">
                                        </div>

                                        <button type="submit" class="btn btn-info btn-fill pull-right"
                                            onclick="">Consultar
                                    </div></button>
                                </div>

                                <br>
                                <br>
                        </div>
                        </form><br>


                        <div class="container">
                            <p style="color:#44A865"><i class="nc-icon nc-zoom-split" style="color:#44A865"> Resultado
                                    da Busca</i></p>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Razão Social</label>
                                        <input type="text" class="form-control" disabled=""
                                            value="<?php  if (empty($razaosocial)){echo "..." ;}else {echo $razaosocial;} ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Nome Fantasia</label>
                                        <input type="text" class="form-control" placeholder="Username"
                                            value="<?php if (empty($fantasia)){echo "..." ;}else {echo $fantasia;}  ?>"
                                            disabled="">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Menu</label>

                                    </div>
                                    <?php   if($bloqueia == '1'){echo   'Sem registro';}else{?>
                                    <a href="?p=listavagareserva&id=<?php echo $id   ; ?>">
                                        <i class="nc-icon nc-zoom-split" style="color: #235168 ; font-family:">Listar
                                            Vagas</i></a>
                                    <?php } ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>