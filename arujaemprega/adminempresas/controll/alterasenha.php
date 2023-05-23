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


$query_con_cpf = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where id_cadastroempresa = "   .$_SESSION['iduser'].";";

foreach($pdo->query($query_con_cpf)as $row)
{
							
$nome   = $row['nome_fantasia'];	
$cpf    =$row['cnpjcpf'];
$razao = $row['razao_social'];


$idusu = $_SESSION['iduser'];
}

?>

  <style>
.eye {
    cursor: pointer;
    left: 765px;
    top: 45px;
    font-size: 17px;
    position: absolute;
    color: #3498db;
}
  </style>

  <script src="./assets/js/sweetalert.js" type="text/javascript"></script>
  <link href="./assets/css/sweetalert.css" rel="stylesheet">

  <?php
        if ($res == 1  ){ ?>

  <script>
swal.fire({
    title: 'Senha atualizada com Sucesso!',
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
    title: 'Não foi possivel atualizar a senha!',
    text: 'Por favor, tente novamente.',
    html: '<hr><button  class="btn btn-default"><a style="color:#000" href="?p=configuracoes">OK</button></a>',
    showConfirmButton: false,
    allowOutsideClick: false
});
  </script>

  <?php  } ?>


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
                              <h4 class="card-title">Alterar Senha</h4>
                          </div>
                          <div class="card-body">
                              <form method="POST" action="#">
                                  <div class="row">
                                      <div class="col-md-3 pr-1">
                                          <div class="form-group">
                                              <label>Nome Fantasia</label>
                                              <input type="text" name="usuario" class="form-control" disabled=""
                                                  value="<?php  echo   $nome; ?>">
                                          </div>
                                      </div>
                                      <div class="col-md-3 pr-1">
                                          <div class="form-group">
                                              <label>CNPJ/CPF</label>
                                              <input type="text" name="cpf" class="form-control" disabled=""
                                                  value="<?php  echo   $cpf; ?>">
                                          </div>
                                      </div>
                                      <div class="col-md-6 pr-1">
                                          <div class="form-group">
                                              <label>Razão Social</label>
                                              <input type="text" name="email" class="form-control"
                                                  value="<?php  echo   $razao; ?>" disabled>
                                          </div>
                                      </div>

                                  </div>

                                  <div class="row">
                                      <div class="col-md-6 pr-1">
                                          <div class="form-group">
                                              <label>Nova Senha</label>
                                              <input id="password" type="password" name="senha" class="form-control"
                                                  required placeholder="Digite a senha"><i onclick="mostrarSenha()"
                                                  class='fa fa-eye eye' id="eye"></i>
                                          </div>
                                      </div>
                                      <div class="col-md-6 pr-1">
                                          <div class="form-group">
                                              <label>Confirmar Senha</label>
                                              <input id="confirm_password" type="password" class="form-control" required
                                                  placeholder="Confirme a senha" onChange="validatePassword()"><i
                                                  onclick="mostrarSenhaConfirm()" class='fa fa-eye eye'></i>
                                          </div>
                                      </div>

                                  </div>
                                  <input type="hidden" name="id" value="<?php echo    $idusu;?>">
                                  <button type="submit" name="button"
                                      class="btn btn-info btn-fill pull-right">Atualizar</button>

                                  <?php include "includes/valida-senha.php"; ?>
                              </form>
                          </div>
                      </div>
                  </div>


              </div>
          </div>
      </div>


      <script>
      function mostrarSenha() {
          var tipo = document.getElementById("password");
          if (tipo.type == "password") {
              tipo.type = "text";
          } else {
              tipo.type = "password";
          }
      }

      function mostrarSenhaConfirm() {
          var tipo = document.getElementById("confirm_password");
          if (tipo.type == "password") {
              tipo.type = "text";
          } else {
              tipo.type = "password";
          }
      }
      </script>


      <?php   include('data/update/novasenhausu.php');?>