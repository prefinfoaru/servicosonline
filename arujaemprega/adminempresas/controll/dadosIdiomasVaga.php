<link rel="stylesheet" type="text/css" href="assets/css/cadastrarvaga.css" />


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php 

    $URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $numid = explode('id=', $URL_ATUAL, 2);
    if(isset($numid[1])){
        $id=$numid[1];
    }
    

	$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $msgid = explode('cad=', $URL_ATUAL, 2);
    $cad = isset($msgid[1]);

include('./data/banco.php');
?>

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
                        <form class="vagas" name="cadastrarvagas" action="./data/insert/cadastraridiomas.php"
                            method="POST">
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form role="form">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Idiomas da Vaga</h3>
                                                </div> <br>
                                                <div class="content">
                                                    <div class="form-group">
                                                        <label class="control-label">Necessário Conhecimento em algum
                                                            idioma</label><br>
                                                        <input type="radio" name="optidioma" value="Sim" id="optidioma"
                                                            onClick="optionIdio()" />
                                                        <label class="control-label"> Sim</label>
                                                        <input type="radio" name="optidioma" value="Não" id="optidioma"
                                                            onClick="optionIdio()" />
                                                        <label class="control-label">Não </label>
                                                    </div>

                                                    <div class="row conte">

                                                        <label class="col-md-1 control-label" for="Nome"
                                                            style="text-align: right">&nbsp;&nbsp;Idioma <h11>*</h11>
                                                            </label>
                                                        <div class="col-md-2">
                                                            <select name="idioma[]" id="idioma" class="form-control"
                                                                style="width: 98%" required="">
                                                                <option value="Português">Português</option>
                                                                <?php 
                                                                                $sql_idioma = "SELECT * FROM bd_emprega_aruja.tb_pre_idioma ";
                                                                                foreach($pdo->query($sql_idioma) as $idioma){	
                                                                                echo    '<option value="'   .$idioma['idioma'].'">'    .$idioma['idioma'].'</option>';
                                                                                }
                                                                            ?>

                                                            </select><br>
                                                        </div>

                                                        <label class="col-md-1 control-label"
                                                            for="instituicao">&nbsp;Nível <h11>*</h11></label>
                                                        <div class="col-md-2">
                                                            <select name="nivel[]" class="form-control" id="nivel"
                                                                style="width: 98%" required="">
                                                                <option value="">Clique Aqui</option>
                                                                <?php 
                                                                                $sql_nivel = "SELECT * FROM bd_emprega_aruja.tb_pre_nivel_idioma ";
                                                                                foreach($pdo->query($sql_nivel) as $nivel){
                                                                                echo    '<option value="'   .$nivel['nivel'].'">'    .$nivel['nivel'].'</option>';
                                                                                }
                                                                            ?>

                                                            </select><br>
                                                        </div>
                                                        <label class="col-md-1 control-label"
                                                            for="obrigatorio">Obrigatório <h11>*</h11></label>
                                                        <div class="col-md-2">
                                                            <select name="obrigatorio[]" class="form-control"
                                                                id="obrigatorio" style="width: 98%" required="">
                                                                <option value="">Clique Aqui</option>
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select><br>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <button type="button" id="add-idioma"
                                                                class="btn btn-success"> + </button>
                                                        </div>

                                                    </div>

                                                    <div class="form-group" id="idiomas"></div>
                                                    <br>
                                                </div>
                                                <input type="hidden" name="idvaga" value="<?=$id;?>">

                                                <button type="submit" name="cadastrar"
                                                    class="btn btn-primary nextBtn pull-right"
                                                    type="button">Próximo</button>
                                        </div>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "./includes/incluir_campo.php" ?>
<?php include "./controll/mensagens/mensagens.php" ?>
<script src="./assets/js/habilitacao.js"></script>
</div>