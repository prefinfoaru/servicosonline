<link rel="stylesheet" type="text/css" href="assets/css/cadastrarvaga.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php

$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numid = explode('id=', $URL_ATUAL, 2);
if (isset($numid[1])) {
    $idvaga = $numid[1];
}


$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$msgid = explode('cad=', $URL_ATUAL, 2);
$cad = isset($msgid[1]);

$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numvaga = explode('vaga=', $URL_ATUAL, 3);
if (isset($numvaga[1])) {
    $idvaga = $numvaga[1];
}



include('./data/banco.php');
if ($cad == 1) { ?>
<script>
swal.fire({
    icon: 'success',
    title: '<strong>Vaga Cadastrada com Sucesso.</strong>',
    html: '<p>Você será redirecionado para informar se a vaga possui algum adicional. Para liberação da vaga é preciso preencher esses dados.</p><hr><button  class="btn btn-default"></button>',
    showConfirmButton: true,
    allowOutsideClick: true
});
</script>
<?php } ?>

<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Menu Administração</a>
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
                        <form class="vagas" name="cadastrarvagas" action="./data/insert/cadastraradicional.php"
                            method="POST">
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form role="form">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Informações Adicionais</h3>
                                                </div> <br>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="control-label">Necessário
                                                                    experiência</label><br>
                                                                <input type="radio" name="optexperiencia" value="Sim"
                                                                    id="optexperiencia" onClick="optionExp()" />
                                                                <label class="control-label"> Sim</label>
                                                                <input type="radio" name="optexperiencia" value="Não"
                                                                    id="optexperiencia" onClick="optionExp()" />
                                                                <label class="control-label">Não </label>
                                                            </div>
                                                            <div class="form-group" style="display: none" id="exp">
                                                                <label class="control-label">Tempo de Experiência em
                                                                    meses</label>
                                                                <input name="experiencia" min="1" max="6" type="number"
                                                                    class="form-control"
                                                                    placeholder="Tempo de Experiência"
                                                                    onblur="validaTempo(this)" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Preferência de
                                                                    idade</label><br>
                                                                <input type="radio" name="optidade" value="Sim"
                                                                    id="optidade" onClick="optionIda()" />
                                                                <label class="control-label"> Sim</label>
                                                                <input type="radio" name="optidade" value="Não"
                                                                    id="optidade" onClick="optionIda()" />
                                                                <label class="control-label">Não </label>
                                                            </div>
                                                            <div class="form-group" style="display: none" id="ida">
                                                                <label class="control-label">Idade Mínima</label>
                                                                <input name="idade" min="12" max="99" type="number"
                                                                    class="form-control col-md-3" placeholder="Idade" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Habilitação</label><br>
                                                                <input type="radio" name="habilitacao" value="Sim"
                                                                    id="habilitacao" onClick="optionHab()" />
                                                                <label class="control-label"> Sim</label>
                                                                <input type="radio" name="habilitacao" value="Não"
                                                                    id="habilitacao" onClick="optionHab()" />
                                                                <label class="control-label">Não </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group" id="tipo_hab"
                                                                    style="display: none">
                                                                    <label class="control-label" for="Nome">Tipo
                                                                        Habilitação </label>
                                                                    <select class="form-control habilitado" id="sel1"
                                                                        name="categoria" style="width: 85%">
                                                                        <option value=""></option>
                                                                        <option value="A">A</option>
                                                                        <option value="B">B</option>
                                                                        <option value="C">C</option>
                                                                        <option value="A-B">A-B</option>
                                                                        <option value="A-C">A-C</option>
                                                                        <option value="A-D">A-D</option>
                                                                        <option value="A-E">A-E</option>
                                                                        <option value="B-C">B-C</option>
                                                                        <option value="B-D">B-D</option>
                                                                        <option value="B-E">B-E</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Deve possuir veículo
                                                                    próprio</label><br>
                                                                <input maxlength="100" type="radio" name="veiculo"
                                                                    value="Sim" />
                                                                <label class="control-label"> Sim</label>
                                                                <input maxlength="100" type="radio" name="veiculo"
                                                                    value="Não" />
                                                                <label class="control-label"> Não</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Ter disponibilidade para
                                                                    viajar</label><br>
                                                                <input maxlength="100" type="radio" name="viajar"
                                                                    value="Sim" />
                                                                <label class="control-label"> Sim</label>
                                                                <input maxlength="100" type="radio" name="viajar"
                                                                    value="Não" />
                                                                <label class="control-label"> Não</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Possibilidade de se mudar
                                                                    para outro local</label><br>
                                                                <input maxlength="100" type="radio" name="mudar"
                                                                    value="Sim" />
                                                                <label class="control-label"> Sim</label>
                                                                <input maxlength="100" type="radio" name="mudar"
                                                                    value="Não" />
                                                                <label class="control-label"> Não</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="idvaga" value="<?= $idvaga; ?>">
                                                    <button type="submit" name="cadastrar"
                                                        class="btn btn-primary nextBtn pull-right"
                                                        type="button">Próximo</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/habilitacao.js"></script>
    <script src="./assets/js/experiencia.js"></script>
    <?php include "./controll/mensagens/mensagens.php" ?>