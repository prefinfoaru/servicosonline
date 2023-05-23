<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
  <title>Guarda Municipal de Arujá - Restrito</title>
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
          <a href="#" class="link-light top-link mx-2">Prefeitura Municipal de Arujá</a>
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

    <div class="row mx-3 d-flex justify-content-center">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <h5 class="card-header">Lista de Mensagens</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <table id="example" class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Cidade</th>
                        <th>WhatsApp</th>
                        <th>Email</th>
                        <th>Mensagem</th>
                        <th>Data</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      
                      $sql = $pdo->query("SELECT * FROM bd_gcma.tb_contato");

                      foreach ($sql as $msg) {
                        echo '
                          <tr>
                            <td>'. $msg['nome'] .'</td>
                            <td>'. $msg['cidade'] .'</td>
                            <td>'. $msg['whatsapp'] .'</td>
                            <td>'. $msg['email'] .'</td>
                            <td>'. $msg['mensagem'] .'</td>
                            <td>'. $msg['data_contato'] .'</td>
                          </tr>
                        ';
                      }
                      
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</body>

</html>