<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
  <title>Guarda Municipal de Arujá - Contato</title>
</head>

<body>

  <?php 
  
  if (isset($_GET['res'])) {
    if ($_GET['res'] == 1) {
      ?>

      <script>
        Swal.fire({
          title: 'Sucesso!',
          text: 'Sua mensagem foi enviada!',
          icon: 'success',
          showConfirmButton: false,
          timer: 2000
        })
      </script>

      <?php
    } elseif ($_GET['res'] == 2) {
      ?>

      <script>
        Swal.fire({
          title: 'Erro!',
          text: 'Não foi possível enviar a mensagem!',
          icon: 'error',
          showConfirmButton: false,
          timer: 2000
        })
      </script>

      <?php
    }
  }
  
  ?>

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
        <a href="index.php" class="back-link"><i class="bi bi-arrow-left-circle-fill"></i> Voltar</a>
      </div>
    </div>

    <br>

    <div class="row mx-3">
      <div class="col-md-12 text-center text-dark-blue">
        <h2>Serviço de Atendimento ao Cidadão</h2>
      </div>
    </div>

    <br>

    <div class="row mx-3 d-flex justify-content-center">
      <div class="card-contact">
        <div class="row">
          <div class="col-md-7 p-3">
            <h3 class="text-blue-2">Fale <span class="text-blue">Conosco</span></h3><br>
            <form action="data/insert/insertContato.php" method="POST">
              <div class="row mb-2">
                <div class="col-md-6">
                  <input type="text" name="nome" id="nome" class="form-control" placeholder="Qual é o seu nome?" required>
                </div>
                <div class="col-md-6">
                  <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade">
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-6">
                  <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="Whatsapp">
                </div>
                <div class="col-md-6">
                  <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-12">
                  <textarea name="mensagem" id="mensagem" cols="30" rows="5" class="form-control" placeholder="Mensagem" required></textarea>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-5 bg-blue text-light rounded-end p-3 d-flex jusitfy-content-center align-items-center">
            <div class="row p-4">
              <div class="col-md-12">
                <h4 class="lh-lg">
                  <i class="bi bi-telephone-forward-fill text-gold"></i> 
                  <span class="contact mx-3"><span class="fw-bold text-gold">Emergência:</span> (99) 99999-9999</span>
                </h4>
              </div>
              <div class="col-md-12">
                <h4 class="lh-lg">
                  <i class="bi bi-telephone-forward-fill text-gold"></i>
                  <span class="contact mx-3"><span class="fw-bold text-gold">Administrativo:</span> (99) 99999-9999</span>
                </h4>
              </div>
              <div class="col-md-12">
                <h4 class="lh-lg">
                  <i class="bi bi-telephone-forward-fill text-gold"></i>
                  <span class="contact mx-3"><span class="fw-bold text-gold">Ouvidoria:</span> (99) 99999-9999</span>
                </h4>
              </div>
              <div class="col-md-12">
                <h4 class="lh-lg">
                  <i class="bi bi-telephone-forward-fill text-gold"></i>
                  <span class="contact mx-3"><span class="fw-bold text-gold">Corregedoria:</span> (99) 99999-9999</span>
                </h4>
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