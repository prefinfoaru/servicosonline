<link rel="stylesheet" type="text/css" href="assets/css/cadastrarvaga.css" />
<link href="./assets/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">

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
                        <form class="vagas" name="cadastrarvagas" action="./data/insert/cadastrarbeneficio.php"
                            method="POST">
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form role="form">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Benefícios da Vaga</h3>
                                                </div> <br>
                                                <div class="content">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">A vaga tem
                                                                    beneficios?</label><br>
                                                                <input name="perbeneficios" type="radio"
                                                                    name="beneficios" value="Sim" id="beneficios"
                                                                    onClick="optionBene()" />
                                                                <label class="control-label"> Sim</label>
                                                                <input name="perbeneficios" type="radio"
                                                                    name="beneficios" value="Não" id="beneficios"
                                                                    onClick="optionBene()" />
                                                                <label class="control-label">Não </label>
                                                            </div>
                                                        </div>
                                                        <div id="escolhas" style="display: none">
                                                            <select multiple="multiple" id="my-select"
                                                                name="beneficios[]" style="display: none">
                                                                <?php
                                                                        $sql_beneficios = "SELECT * FROM bd_emprega_aruja.tb_pre_beneficios ";
                                                                        foreach($pdo->query($sql_beneficios ) as $beneficios){
                                                                        echo    '<option value="'   .$beneficios['nome'].'">'    .$beneficios['nome'].'</option>';
                                                                        }
                                                                    ?>
                                                            </select>
                                                        </div>
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
</div>
</div>
<?php include "./controll/mensagens/mensagens.php" ?>
<script src="assets/js/habilitacao.js" type="text/javascript"></script>
<script src="assets/js/jquery.multi-select.js" type="text/javascript"></script>
<script>
$('#my-select').multiSelect()
</script>