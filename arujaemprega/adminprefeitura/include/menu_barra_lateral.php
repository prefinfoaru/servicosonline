  <?php 
    if(isset($_SESSION['nivel'])){
        $_SESSION['nivel'] = $_SESSION['nivel'];
    }else{
        $_SESSION['nivel'] = "";
    }
  ?>
  <div class="wrapper">
      <div class="sidebar" data-image="assets/img/sidebar-5.jpg">
          <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
          <div class="sidebar-wrapper">
              <div class="logo">
                  <a href="?p=dash" class="simple-text">
                      <img src="../imagens/Sem título-6.png" width="100%" height="100%">
                  </a>
              </div>
              <ul class="nav">
                  <li class="nav-item ">
                      <a class="nav-link" href="?p=dash">
                          <i class="nc-icon nc-chart-pie-36"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>


                  <?php

                    if ($_SESSION['nivel'] == 3 || $_SESSION['nivel'] == 1) {

                        echo " <li>
                        <a class='nav-link' href='?p=admin'>
                            <i class='nc-icon nc-settings-tool-66'></i>
                            <p>ADMINISTRAÇÃO </p>
                        </a>
                    </li>   ";
                    } ?>





                  <li>
                      <a class="nav-link" href="?p=curriculo">
                          <i class="nc-icon nc-circle-09"></i>
                          <p>CURRICULO</p>
                      </a>
                  </li>

                  <li>
                      <a class="nav-link" href="?p=empresa">
                          <i class="nc-icon nc-bank"></i>
                          <p>EMPRESAS</p>
                      </a>
                  </li>

                  <!-- <li>
                        <a class="nav-link" href="#">
                            <i class="nc-icon nc-vector"></i>
                            <p>VAGAS</p>
                        </a>
                    </li> -->

                  <li>
                      <a class="nav-link" href="?p=listarvagas">
                          <i class="nc-icon nc-notes"></i>
                          <p>LISTA DE VAGAS</p>
                      </a>
                  </li>

                  <?php if(($_SESSION['nivel'] == 1) || ($_SESSION['nivel'] == 3)){ ?> 

                  <li>
                      <a class="nav-link" href="?p=entrevista">
                          <i class="nc-icon nc-tv-2"></i>
                          <p>SALA DE ENTREVISTA</p>
                      </a>
                  </li>

                  <?php } ?>

                  <li>

                      <!--                                         
                    <li>
                        <a class="nav-link" href="#">
                            <i class="nc-icon nc-settings-gear-64"></i>
                            <p>CONFIGURAÇÕES</p>
                        </a>
                    </li> -->
                  <li>
                      <a class="nav-link" href="include/sair_destroy_session.php">
                          <i class="nc-icon nc-button-power" style="color:#F9E8E8"></i>
                          <p style="color:#F9E8E8">SAIR</p>
                      </a>
                  </li>
                  <!--     <li class="nav-item active active-pro">
                        <a class="nav-link active" >
                            <i><img src="./../imagens/logotipo_jobs.png" width="80%" height="80%"></i>
                            <p>ARUJÁ EMPREGA</p>
                        </a>
                    </li> -->
              </ul>
          </div>
      </div>