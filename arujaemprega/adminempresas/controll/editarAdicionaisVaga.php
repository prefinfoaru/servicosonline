<link rel="stylesheet" type="text/css" href="assets/css/cadastrarvaga.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php 

include "./data/conexao.php";
$idempresa = $_SESSION['iduser'];

$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numid = explode('id=', $URL_ATUAL, 2);
$id = $numid[1];
    
    
    include('./includes/buscaDados.php');
    
    
    ?>

<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Editar Adicionais da Vaga: <?php echo  $id; ?></a>
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


                        <?php     
                                $Atualiza = "SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga where id_vaga = '$id' and id_empresa = '$idempresa';";
                                $resultado_atualiza = mysqli_query($conn,$Atualiza);
                                $numero = mysqli_num_rows($resultado_atualiza);

                                if($numero == '1'){ ?>
                        <form class="vagas" name="cadastrarvagas" action="./data/update/editaradicional.php"
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
                                                                    id="optexperiencia"
                                                                    <?php echo    $tempo=="" ? "":"checked";?>
                                                                    onClick="optionExpe()" />
                                                                <label class="control-label"> Sim</label>
                                                                <input type="radio" name="optexperiencia" value="Não"
                                                                    <?php echo    $tempo=="" ? "checked":"";?>
                                                                    onClick="optionExp()" />
                                                                <label class="control-label">Não </label>
                                                            </div>

                                                            <div class="form-group" style="display: none" id="exp">
                                                                <label class="control-label">Tempo de
                                                                    Experiência</label>
                                                                <input name="experiencia" maxlength="200" type="text"
                                                                    class="form-control"
                                                                    value="<?php  echo $tempo == "" ? ""  :$tempo ?>"
                                                                    placeholder="Tempo de Experiência" />
                                                            </div>
                                                            <script>
                                                            if (document.getElementById('optexperiencia').checked ==
                                                                true) {
                                                                document.getElementById('exp').style.display = 'block';
                                                            }

                                                            function optionExpe() {

                                                                document.getElementById('exp').style.display = 'block';


                                                            }

                                                            function optionExp() {

                                                                document.getElementById('exp').style.display = 'none';


                                                            }
                                                            </script>

                                                        </div>


                                                    </div>


                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Preferência de
                                                                    idade</label><br>
                                                                <input type="radio" name="optidade" value="Sim"
                                                                    id="optidade"
                                                                    <?php echo    $idade=="" ? "":"checked";?>
                                                                    onClick="optionIdad()" />
                                                                <label class="control-label"> Sim</label>
                                                                <input type="radio" name="optidade" value="Não"
                                                                    <?php echo    $idade=="" ? "checked":"";?>
                                                                    onClick="optionIda()" />
                                                                <label class="control-label">Não </label>
                                                            </div>
                                                            <div class="form-group" style="display: none" id="ida">
                                                                <label class="control-label">Idade Mínima</label>
                                                                <input name="idade" min="12" max="99" type="number"
                                                                    class="form-control col-md-3"
                                                                    value="<?php  echo $idade == "" ? ""  : $idade ?>"
                                                                    placeholder="Idade" />
                                                            </div>
                                                            <script>
                                                            if (document.getElementById('optidade').checked == true) {
                                                                document.getElementById('ida').style.display = 'block';
                                                            }

                                                            function optionIdad() {

                                                                document.getElementById('ida').style.display = 'block';

                                                            }

                                                            function optionIda() {

                                                                document.getElementById('ida').style.display = 'none';

                                                            }
                                                            </script>

                                                            <div class="form-group">
                                                                <label class="control-label">Habilitação</label><br>
                                                                <input type="radio" name="habilitacao" value="Sim"
                                                                    id="habilitacao"
                                                                    <?php echo    $habilitacao=="Sim" ? "checked":""; ?>
                                                                    onClick="optionHabi()" />
                                                                <label class="control-label"> Sim</label>
                                                                <input type="radio" name="habilitacao" value="Não"
                                                                    <?php echo    $habilitacao=="Não" ? "checked":"";?>
                                                                    onClick="optionHab()" />
                                                                <label class="control-label">Não </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group" id="tipo_hab"
                                                                    style="display: none">
                                                                    <label class="control-label" for="Nome">Tipo
                                                                        Habilitação </label>
                                                                    <select class="form-control habilitado" id="sel1"
                                                                        name="categoria" style="width: 85%">
                                                                        <option
                                                                            value="<?php if($tipohabi == ""){ echo "";}else{ echo   $tipohabi;} ?>">
                                                                            <?php if($tipohabi == ""){ echo "";}else{ echo   $tipohabi;} ?>
                                                                        </option>

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
                                                            <script>
                                                            if (document.getElementById('habilitacao').checked ==
                                                                true) {
                                                                document.getElementById('tipo_hab').style.display =
                                                                    'block';
                                                            }

                                                            function optionHabi() {

                                                                document.getElementById('tipo_hab').style.display =
                                                                    'block';

                                                            }

                                                            function optionHab() {

                                                                document.getElementById('tipo_hab').style.display =
                                                                    'none';

                                                            }
                                                            </script>


                                                            <div class="form-group">
                                                                <label class="control-label">Deve possuir veículo
                                                                    próprio</label><br>
                                                                <input maxlength="100" type="radio" name="veiculo"
                                                                    value="Sim"
                                                                    <?php echo    $veiculo=="Sim" ? "checked":"";?> />
                                                                <label class="control-label"> Sim</label>
                                                                <input maxlength="100" type="radio" name="veiculo"
                                                                    value="Não"
                                                                    <?php echo    $veiculo=="Não" ? "checked":"";?> />
                                                                <label class="control-label"> Não</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Ter disponibilidade para
                                                                    viajar</label><br>
                                                                <input maxlength="100" type="radio" name="viajar"
                                                                    value="Sim"
                                                                    <?php echo    $viajar=="Sim" ? "checked":"";?> />
                                                                <label class="control-label"> Sim</label>
                                                                <input maxlength="100" type="radio" name="viajar"
                                                                    value="Não"
                                                                    <?php echo    $viajar=="Não" ? "checked":"";?> />
                                                                <label class="control-label"> Não</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Possibilidade de se mudar
                                                                    para outro local</label><br>
                                                                <input maxlength="100" type="radio" name="mudar"
                                                                    value="Sim"
                                                                    <?php echo    $mudar =="Sim" ? "checked":"";?> />
                                                                <label class="control-label"> Sim</label>
                                                                <input maxlength="100" type="radio" name="mudar"
                                                                    value="Não"
                                                                    <?php echo    $mudar =="Não" ? "checked":"";?> />
                                                                <label class="control-label"> Não</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <input type="hidden" name="idvaga" value="<?=$id;?>">
                                                    <button type="submit" name="cadastrar"
                                                        class="btn btn-primary nextBtn pull-right"
                                                        type="button">Atualizar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <?php }else{?>

                            <script>
                            alert('Acesso não autorizado');
                            window.location.href =
                                "https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=listarvagas";
                            </script>

                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./controll/mensagens/mensagens.php" ?>