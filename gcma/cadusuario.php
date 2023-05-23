<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/cadusuario.css" />
  <script src="assets/js/valida_cpf_cnpj.js"></script>
  <script src="assets/js/corrige_cpf_cnpj.js"></script>
  <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
  <title>Guarda Municipal de Arujá - Editar Card</title>
</head>

<?php

session_start();
include('includes/includeValidacao.php');
include('data/conexao.php');

?>

<body>
  <nav class="nav bg-blue">
    <div class="container p-1">
      <div class="row">
        <div class="col-md-4 p-2">
          <a href="https://www.prefeituradearuja.sp.gov.br/" class="link-light top-link mx-2">Prefeitura Municipal de Arujá</a>
          <a href="restrito.php" class="link-light top-link mx-2">Acesso Restrito</a>
        </div>
        <div class="col-md-8 d-flex p-2 justify-content-end">
          <a href="#" class="link-light icon-link mx-1"><i class="bi bi-whatsapp circle-icon"></i></a>
          <a href="#" class="link-light icon-link mx-1"><i class="bi bi-facebook circle-icon"></i></a>
          <a href="#" class="link-light icon-link mx-1"><i class="bi bi-instagram circle-icon"></i></a>
        </div>
      </div>
    </div>
  </nav>

  <nav class="nav bg-light">
    <div class="container p-3">
      <div class="row">
        <div class="col-md-5 d-flex justify-content-center align-items-center">
          <a href="index.php" class="fs-5 main-link mx-3">HOME</a>
          <a href="" class="fs-5 main-link mx-3">NOTÍCIAS</a>
        </div>
        <div class="col-md-2 position-relative">
          <img src="assets/img/logo.png" class="logo position-absolute start-50 top-50 translate-middle" alt="Logo">
        </div>
        <div class="col-md-5 d-flex justify-content-center align-items-center">
          <a href="sobre.php" class="fs-5 main-link mx-3">SOBRE</a>
          <a href="contato.php" class="fs-5 main-link mx-3">CONTATO</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container mt-1 p-4">

    <div class="row mx-3">
      <div class="col-md-12">
        <a href="restrito.php" class="back-link"><i class="bi bi-arrow-left-circle-fill"></i> Voltar</a>
      </div>
    </div>

    <br>

    <div class="row mx-3">
      <div class="col-md-12 text-center text-dark-blue">
        <h2>Acesso Restrito</h2>
      </div>
    </div>

    <br>

    <div class="row mx-3">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <h5 class="card-header">Cadastrar Usuário</h5>
            <div class="card-body">
              <form action="data/insert/insertUsuario.php" method="post">
                <div class="row mb-3">
                  <div class="col-md-4">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite o CPF que deseja cadastrar" required>
                  </div>
                  <div class="col-md-8">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o nome completo" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Digite o email" required>
                  </div>
                  <div class="col-md-4">
                    <label for="setor" class="form-label">Setor</label>
                    <select name="setor" id="setor" class="form-select" required>
                      <option value="">Selecione o setor</option>
                      <?php

                      $setores = $pdo->query("SELECT * FROM bd_restrito.tb_departamentos ORDER BY nome_departamento ASC");

                      foreach ($setores as $setor) {
                        echo '<option value="' . $setor['nome_departamento'] . '">' . $setor['nome_departamento'] . '</option>';
                      }

                      ?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="funcao" class="form-label">Função</label>
                    <input type="text" name="funcao" id="funcao" class="form-control" placeholder="Digite a função" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" name="tel" id="tel" class="form-control" placeholder="Digite o telefone">
                  </div>
                  <div class="col-md-4">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="text" name="cel" id="cel" class="form-control" placeholder="Digite o celular" required>
                  </div>
                  <div class="col-md-4">
                    <label for="usuario" class="form-label">Usuário</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Digite o nome de usuário" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-5" id="div-senha-1">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite a senha" required>
                  </div>
                  <div class="col-md-5" id="div-senha-2">
                    <label for="senha_repetida" class="form-label">Repita a senha</label>
                    <input type="password" name="senha_repetida" id="senha_repetida" class="form-control" placeholder="Repita a senha digitada" required>
                  </div>
                  <div class="col-md-2" id="submit-btn">
                    <div class="d-grid">
                      <label class="form-label" style="opacity: 0;">_</label>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="assets/js/cadusuario.js"></script>
</body>

</html>