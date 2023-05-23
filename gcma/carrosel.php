<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
  <title>Guarda Municipal de Arujá - Editar Carrosel</title>
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
            <h5 class="card-header">Editar Carrosel</h5>
            <div class="card-body">
              <div class="row mb-5">
                <div class="col-md-12">
                  <form action="data/insert/insertCarrosel.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-9">
                        <input type="file" name="imagem" id="imagem" class="form-control">
                      </div>
                      <div class="col-md-3 d-grid">
                        <button type="submit" class="btn btn-primary btn-block">Adicionar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <?php

              $sql = $pdo->query("SELECT * FROM bd_gcma.tb_carrosel");

              ?>

              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Excluir</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      foreach ($sql as $img) {
                        echo '
                          <tr>
                            <th scope="row">1</th>
                            <td>
                              <div class="d-grid gap-2">
                                <a data-bs-toggle="modal" data-bs-target="#modal-' . $img['id'] . '" class="btn btn-secondary btn-block">
                                  Ver Imagem 
                                  <i class="bi bi-image-fill"></i>
                                </a>
                              </div>
                            </td>
                            <td>
                              <div class="d-grid gap-2">
                                <a href="data/delete/deleteCarrosel.php?cod=' . $img['id'] . '" class="btn btn-danger btn-block">Excluir Imagem <i class="bi bi-trash3-fill"></i></a>
                              </div>
                            </td>
                          </tr>

                          <div class="modal fade" id="modal-' . $img['id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <img src="' . $img['imagem'] . '" class="img-fluid" />
                                </div>
                              </div>
                            </div>
                          </div>
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
</body>

</html>