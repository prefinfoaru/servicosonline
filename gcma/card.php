<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/card.css" />
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
            <h5 class="card-header">Editar Cards</h5>
            <div class="card-body">
              <form action="data/insert/insertCard.php" method="POST">
                <div class="row mb-3">
                  <div class="col-md-4">
                    <label for="icone" class="form-label">Ícone</label>
                    <select name="icone" id="icone" class="form-select">
                      <option value="bi bi-shield-fill-check">Escudo</option>
                      <option value="bi bi-person-fill">Pessoa</option>
                      <option value="bi bi-chat-left-fill">Chat</option>
                      <option value="bi bi-camera-video-fill">Câmera</option>
                      <option value="bi bi-exclamation-triangle-fill">Exclamação</option>
                      <option value="bi bi-info-circle-fill">Informação</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="texto" class="form-label">Texto</label>
                    <textarea name="texto" id="texto" cols="30" rows="4" class="form-control"></textarea>
                  </div>
                  <div class="col-md-4">
                    <label for="url" class="form-label">É um link?</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="optlink" id="optlink1" value="sim">
                      <label class="form-check-label" for="optlink1">
                        Sim
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="optlink" id="optlink2" value="não" checked>
                      <label class="form-check-label" for="optlink2">
                        Não
                      </label>
                    </div>
                    <input type="url" name="url" id="url" class="form-control mt-3" placeholder="https://example.com">
                  </div>
                </div>
                <div class="row justify-content-center mb-4">
                  <div class="col-md-4">
                    <div class="d-grid">
                      <button class="btn btn-primary btn-block">Adicionar</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="row justify-content-center text-center mb-4">
                <div class="col-md-3">
                  <h5 class="text-muted">Prévia do card: </h5>
                  <div class="card card-index">
                    <div class="card-body text-center rounded">
                      <span class="text-dark-blue"><i id="exibeIcone" class="bi bi-shield-fill-check"></i></span>
                      <div class="card-text" id="exibeTexto">
                        Texto
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <?php

              $sql = $pdo->query("SELECT * FROM bd_gcma.tb_card");

              ?>

              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ícone</th>
                        <th scope="col">Texto</th>
                        <th scope="col">Excluir</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      foreach ($sql as $card) {
                        echo '
                          <tr>
                            <th scope="row">1</th>
                            <td class="text-center"><span class="text-dark-blue"><i class="' . $card['icone'] . '"></i></span></td>
                            <td>' . $card['texto'] . '</td>
                            <td>
                              <div class="d-grid gap-2">
                                <a href="data/delete/deleteCard.php?cod=' . $card['id'] . '" class="btn btn-danger btn-block"><i class="bi bi-trash3-fill"></i></a>
                              </div>
                            </td>
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
  <script src="assets/js/icone.js"></script>
</body>

</html>