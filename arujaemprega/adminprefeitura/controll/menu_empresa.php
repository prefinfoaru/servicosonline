<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Menu Empresas</a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
                            <h4 class="card-title">Acesso para Cadastro de Empresa e Cadadatro de Vagas</h4>
                            <p class="card-category">Àrea para acesso do responsavél pelo Arujá Emprega

                            </p>
                        </div>

                        <div class="card-body all-icons">
                            <div class="row">
                                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                    <a href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/pages/cadastroempresa.php"
                                        target="_blank">
                                        <div class="font-icon-detail">
                                            <i class="nc-icon nc-bank"></i>
                                            <p>Cadastrar Empresa</p>
                                        </div>
                                    </a>
                                </div>

                                <?php if(($_SESSION['nivel'] == 1) || ($_SESSION['nivel'] == 3)){ ?>

                                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                    <a href="?p=aprovarempresa">
                                        <div class="font-icon-detail">
                                            <i class="nc-icon nc-credit-card"></i>
                                            <p>Aprovar Empresa</p>
                                        </div>
                                    </a>
                                </div>

                                <?php } ?>


                                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                    <a href="?p=consultarempresapref" target="_blank">
                                        <div class="font-icon-detail">
                                            <i class="nc-icon nc-credit-card"></i>
                                            <p>Acessar Empresa</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                    <a href="?p=alterarsenhaempresa">
                                        <div class="font-icon-detail">
                                            <i class="nc-icon nc-lock-circle-open"></i>
                                            <p>Alterar Senha</p>
                                        </div>
                                    </a>
                                </div>

                                <?php if(($_SESSION['nivel'] == 1) || ($_SESSION['nivel'] == 3)){ ?>

                                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                    <a href="?p=reservasalareuniao">
                                        <div class="font-icon-detail">
                                            <i class="nc-icon nc-time-alarm"></i>
                                            <p>Sala de Entrevista</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                    <a href="?p=listadados_secretarias">
                                        <div class="font-icon-detail">
                                            <i class="nc-icon nc-time-alarm"></i>
                                            <p>Dados Secretarias</p>
                                        </div>
                                    </a>
                                </div>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>