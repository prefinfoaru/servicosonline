<?php 
if(!isset($_SESSION['prefeitura'])){
    $_SESSION['prefeitura'] = "vazio";
}
?>


  
  <div class="wrapper">
        <div class="sidebar" data-image="assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper" >
                <div class="logo">
                    <a href="?p=cadastrarvaga" class="simple-text">
                    <!-- antes dash -->
                      <img src="../imagens/Sem título-6.png" width="100%" height="100%">
                    </a>
                </div>
                <ul class="nav">
                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="?p=dash">
                            <i class="nc-icon nc-chart-pie-36"></i>
                            <p >Dashboard</p>
                        </a>
                    </li> -->
                    <li>
                        <a class="nav-link" href="?p=cadastrarvaga">
                            <i class="nc-icon nc-vector"></i>
                            <p>Cadastrar Vagas</p>
                        </a>
                    </li>
                    
                     <li>
                        <a class="nav-link" href="?p=menu_vagas">
                            <i class="nc-icon nc-notes"></i>
                            <p>LISTA DE VAGAS</p>
                        </a>
                    </li>
                    
                    <li>
                        <a class="nav-link" href="?p=sala_entrevista">
                            <i class="nc-icon nc-tv-2"></i>
                            <p>SALA DE ENTREVISTA</p>
                        </a>
                    </li>
                  
                   
                    
                    <?php 
                    
                    
                    if($_SESSION['prefeitura'] != "56901275000150"){?>                     
                        <li>
                            <a class="nav-link" href="?p=configuracoes">
                                <i class="nc-icon nc-settings-gear-64"></i>
                                <p>CONFIGURAÇÕES</p>
                            </a>
                        </li>
                    <?php } ?>

                    <li>
                        <a class="nav-link" href="includes/sair_destroy_session.php">
                            <i class="nc-icon nc-button-power" style="color:#F9E8E8"></i>
                            <p style="color:#F9E8E8">SAIR</p>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
      