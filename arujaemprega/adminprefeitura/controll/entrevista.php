  <style>
      .cursor {
          cursor: pointer;
      }
  </style>

  <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg " color-on-scroll="100">
          <div class="container-fluid">
              <a class="navbar-brand" href="">Sala de Entrevista</a>
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
                              <h4 class="card-title">Administração do Site - Usuário Responsável</h4>
                              <p class="card-category">Àrea para acesso do responsavél pelo Arujá Emprega

                              </p>
                          </div>

                          <div class="card-body all-icons">
                              <div class="row">
                                  <?php
                                    include("./agendasalareuniao/index.php");
                                    ?>
                              </div>
                             
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  