  <?php 
              
              //conexao com banco ********************************************************************************************************************************************************************************

include  "./data/banco.php";
$pdo = Banco::conectar();

//Querys**************************************************************************************************************************************************************************************
  
$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('idusu=', $URL_ATUAL, 2);
$id = $numprot[1];
//***********************************************************************************************************************************************************************
//Tratam valor recebido **********************************************************************************************************************************************************************

//********************************************************************************************************************************************************************************************
$query_con_cpf = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa WHERE id_cadastroempresa = '$id'";

foreach($pdo->query($query_con_cpf)as $row)
{
							
$razao_social   = $row['razao_social'];	
$email  = $row['email'];	
$cnpjcpf    =$row['cnpjcpf'];
$idempresa = $id;
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
                                              <label>Usuario</label>
                                              <input type="text" name="usuario" class="form-control" disabled=""
                                                  value="<?php  echo   $razao_social; ?>">
                                          </div>
                                      </div>
                                      <div class="col-md-3 pr-1">
                                          <div class="form-group">
                                              <label>CNPJ / CPF</label>
                                              <input type="text" name="cpf" class="form-control" disabled=""
                                                  value="<?php  echo   $cnpjcpf; ?>">
                                          </div>
                                      </div>
                                      <div class="col-md-6 pr-1">
                                          <div class="form-group">
                                              <label>E-mail</label>
                                              <input type="text" name="email" class="form-control"
                                                  value="<?php  echo   $email; ?>" disabled>
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
                                  <input type="hidden" name="id" value="<?php echo    $idempresa;?>">
                                  <button type="submit" name="button"
                                      class="btn btn-info btn-fill pull-right">Atualizar</button>

                                  <?php include "include/valida-senha.php"; ?>
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

      <?php   include('data/update/novasenhaempresa.php');?>