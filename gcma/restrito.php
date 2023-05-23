<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
  <title>Guarda Municipal de Arujá - Restrito</title>
</head>

<?php

session_start();
include('includes/includeValidacao.php');

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
        <!-- <a href="index.php" class="back-link"><i class="bi bi-arrow-left-circle-fill"></i> Voltar</a> -->
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
        <div class="col-md-3">
          <div class="card card-restrito">
            <h5 class="card-header">Editar Carrosel</h5>
            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-image-fill"></i></h5>
              <p class="card-text">Aqui você pode alterar as imagens do carrosel da página principal.</p>
              <a href="carrosel.php" class="btn btn-primary">Editar</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-restrito">
            <h5 class="card-header">Editar Cards</h5>
            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-card-text"></i></h5>
              <p class="card-text">Criar ou excluir cards informativos da página principal.</p>
              <a href="card.php" class="btn btn-primary">Editar</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-restrito">
            <h5 class="card-header">Solicitações de Contato</h5>
            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-chat-dots-fill"></i></h5>
              <p class="card-text">Visualizar todas as solicitações de contato realizadas.</p>
              <a href="listaContato.php" class="btn btn-primary">Visualizar</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-restrito">
            <h5 class="card-header">Cadastrar Usuário</h5>
            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-person-fill"></i></h5>
              <p class="card-text">Cadastrar novas credenciais para acessar o menu restrito</p>
              <a href="cadusuario.php" class="btn btn-primary">Cadastrar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>