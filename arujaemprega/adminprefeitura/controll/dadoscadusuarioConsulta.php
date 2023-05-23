<script src="./assets/js/sweetalert.js" type="text/javascript"></script>
<link href="./assets/css/sweetalert.css" rel="stylesheet" >

<?php
include "./../adminprefeitura/include/topo_consultarCurriculo.php ";
?>

<div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="100">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">Menu Empresas</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
                                    <h4 class="card-title">Consultar Curriculo </h4>
                                    <p class="card-category">Àrea para acesso do responsavél pelo Arujá Emprega
                                        
                                    </p>
                                </div>
                                
 <div class="container">
 <br>
  <p style="color: #3E3E3E">Por favor Digite um CPF válido para verificarmos o cadastro em nosso banco de dados </p>
  <form action="" method="post">
    <div class="form-input">
                             <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">CPF</label>
                                                    <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="14" style="width: 98%">
                                                </div>               
                       <button type="submit" name="Cadastrar" class="btn btn-info btn-fill pull-right" >Consultar </div>
        </button>
                        </div>
                                
                            <br>
                            <br>
                                </div>
     </form><br>

                              
                                <div class="container">
                                <p style="color:#44A865"><i class="nc-icon nc-zoom-split" style="color:#44A865">  Resultado da Busca</i></p>                                
                                </div> <div class="card-body">
                                   
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Nome</label>
                                                    <input type="text" class="form-control" disabled=""  value="<?php  if (empty($nome)){echo "..." ;}else {echo $nome;} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>E-mail</label>
                                                    <input type="text" class="form-control" placeholder="Username" value="<?php if (empty($email)){echo "..." ;}else {echo $email;}  ?>" disabled="">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Menu</label>
                                                   
                                                </div>
                                                <?php   if($bloqueia == '1'){echo   'Sem registro';}else{?>
                                                <a href="?p=dadoscadusuario&idcpfcon=<?php echo $id ; ?>">
                                                <i class="nc-icon nc-zoom-split" style="color: #BB5153 ; font-family:" > Editar </i></a>
                                                <?php } ?>
                                                
                                            </div>
                                           
                                        </div>
                                          </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
              
       
              
              
              