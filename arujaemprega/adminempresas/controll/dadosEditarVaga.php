    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/css/select2.css" />
    <script src="assets/js/select2.js"></script>
    <script src="https://cdn.tiny.cloud/1/d7mf8inz10za7x62gz4c3g9zny7wl7gk3hnswc2nj5r77wun/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

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
                <a class="navbar-brand" href="#pablo">Editar Dados Gerais da Vaga: <?php echo  $id; ?></a>
                <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>

            </div>
        </nav>
        <!-- End Navbar -->
        <link rel="stylesheet" type="text/css" href="assets/css/cadastrarvaga.css" />
        <script src="./assets/js/jsjs.js"></script>
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

                            <div class="header">
                                <h4 class="title">Atualizar Vaga</h4>
                            </div>
                            <div class="content">
                                <form class="vagas" name="editarvaga" action="./data/insert/editarvaga.php"
                                    method="POST">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Título da Vaga</label>
                                                <input name="titulo" type="text" class="form-control"
                                                    placeholder="Título da Vaga" value="<?=$titulo;?>">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Profissão</label>

                                                <select class="selectpicker form-control" name="profissao"
                                                    data-live-search="true" required>
                                                    <option selected value="<?=$profissao;?>"><?=$profissao;?></option>
                                                    <?php
                                                        $buscaprof  =  $pdo->query("SELECT * FROM bd_emprega_aruja.tb_pre_profissao where profissao <>'$profissao'");
                                                        $dataprof = $buscaprof->fetchAll(); 
                                                        foreach ($dataprof as $value) {?>
                                                    <option value="<?php echo $value['profissao'];?>">
                                                        <?php echo $value['profissao'];?>
                                                        <?php
                                                        }
                                                    ?>
                                                </select>
                                                <!-- <select class="form-control" name="profissao">
                                                    <option selected value="<?=$profissao;?>"><?=$profissao;?></option>
                                                    <?php
                                                        $buscaprof  =  $pdo->query("SELECT * FROM bd_emprega_aruja.tb_pre_profissao where profissao <>'$profissao'");
                                                        $dataprof = $buscaprof->fetchAll(); 
                                                        foreach ($dataprof as $value) {?>
                                                           <option value="<?php echo $value['profissao'];?>"><?php echo $value['profissao'];?>
                                                    <?php
                                                        }
                                                    ?>
                                                </select> -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cargo</label>
                                                <select class="form-control" name="cargo">
                                                    <option selected value="<?=$hierarquia;?>"><?=$hierarquia;?>
                                                    </option>
                                                    <?php
                                                         $buscanivel  =  $pdo->query("SELECT * FROM bd_emprega_aruja.tb_pre_nivel_profissao where tb_nivel_hierarquico <> '$hierarquia'");
                                                         $datanivel= $buscanivel->fetchAll(); 
                                                         foreach ($datanivel as $value) {?>
                                                    <option value="<?php echo $value['tb_nivel_hierarquico'];?>">
                                                        <?php echo $value['tb_nivel_hierarquico'];?>
                                                        <?php
                                                         }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Descrição</label>
                                                <textarea name="descricao" rows="10" class="form-control"
                                                    id="basic-example"
                                                    placeholder="Preencha a Descrição da Vaga"><?=$descricao;?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Periodo</label>
                                                <select class="form-control" name="periodo">
                                                    <option selected value="<?=$periodo;?>"><?=$periodo;?></option>
                                                    <?php
                                                         $buscaper  =  $pdo->query("SELECT * FROM bd_emprega_aruja.tb_pre_jornada where jornada <> '$periodo' ");
                                                         $dataper= $buscaper->fetchAll(); 
                                                         foreach ($dataper as $value) {?>
                                                    <option value="<?php echo $value['jornada'];?>">
                                                        <?php echo $value['jornada'];?>
                                                        <?php
                                                         }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Salário</label>
                                                <input name="salario" id="salario" onkeyup="valor(this);" type="text"
                                                    class="form-control" placeholder="Digite o Salário"
                                                    value="<?=$salario;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Escolaridade</label>
                                                <select class="form-control" name="escolaridade">
                                                    <option selected value="<?=$escolaridade;?>"><?=$escolaridade;?>
                                                    </option>
                                                    <?php
                                                         $buscaesco=  $pdo->query("SELECT * FROM bd_emprega_aruja.tb_pre_nivel_escolaridade where escolaridade <> '$escolaridade'");
                                                         $dataesco= $buscaesco->fetchAll(); 
                                                         foreach ($dataesco as $value) {?>
                                                    <option value="<?php echo $value['escolaridade'];?>">
                                                        <?php echo $value['escolaridade'];?>
                                                        <?php
                                                         }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label>Nº de Vagas</label>
                                                <input name="vagas" type="number" class="form-control" placeholder="Nº"
                                                    value="<?=$vagas;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Cep</label>
                                                <input id="cep" name="cep" placeholder="Apenas números"
                                                    class="form-control input-md" required="" type="search"
                                                    maxlength="8" pattern="[0-9]+$" value="<?=$cep;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <br>
                                                <button type="button" class="btn btn-primary2"
                                                    onclick="pesquisacep(cep.value)">Pesquisar</button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Endereço</label>
                                                <input id="rua" name="endereco" class="form-control" placeholder=""
                                                    required="" readonly="readonly" type="text" value="<?=$endereco;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label>Nº</label>
                                                <input id="numero" name="numero" class="form-control" placeholder=""
                                                    required="" type="text" value="<?=$numeroend;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Complemento</label>
                                                <input name="complemento" class="form-control" placeholder=""
                                                    type="text" value="<?=$complemento;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Cidade</label>
                                                <input id="cidade" name="cidade" class="form-control" placeholder=""
                                                    required="" readonly="readonly" type="text" value="<?=$cidade;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Bairro</label>
                                                <input id="bairro" name="bairro" class="form-control" placeholder=""
                                                    required="" readonly="readonly" type="text" value="<?=$bairro;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <input id="estado" name="estado" class="form-control" placeholder=""
                                                    required="" readonly="readonly" type="text" value="<?=$estado;?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="instituicao">Vaga exclusiva para PCD
                                                </label><br>
                                                <label><input type="radio" id="def_check" value="Sim" name="def"
                                                        <?php echo $vaga_exclusiva_pcd=='Sim' ? "checked" : "";?>
                                                        onClick="optionDef()">&nbsp;Sim</label>&nbsp;
                                                <label><input type="radio" value="Não" name="def" id="def"
                                                        <?php echo $vaga_exclusiva_pcd=='Não' ? "checked" : "";?>
                                                        onClick="optionDef()">&nbsp;Não</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" id="def_div"
                                                <?php echo $vaga_exclusiva_pcd=='Sim' ? "style='display: block'" : "style='display: none'";?>>
                                                <label class="control-label" for="Nome">&nbsp;&nbsp;Deficiência </label>
                                                <select name="defselect" id="defselect" class="form-control"
                                                    onChange="optionDados()">

                                                    <?php 
                                             
                                                    echo $deficiencia_exc<>'' ?   '<option selected value="'.$deficiencia_exc.'">'.$deficiencia_exc.'</option>' : '';
													$sql_def = "SELECT * FROM bd_emprega_aruja.tb_pre_deficiencias  ";
													foreach($pdo->query($sql_def) as $def){
													    echo    '<option value="'   .$def['deficiencia'].'">'    .$def['deficiencia']   .'</option>';
													}
												?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" style="display: none" id="Audi_div">
                                                <label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def" id="Audi" class="form-control" disabled>
                                                    <?php 
                                                    echo $dados_def_exc<>'' ?   '<option selected value="'.$dados_def_exc.'">'.$dados_def_exc.'</option>' : '';
													$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '1' AND dados<>'$dados_def_exc'  ";
													foreach($pdo->query($sql_dados_def) as $dados_def){
													echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
													}
												?>
                                                </select>
                                            </div>
                                            <div class="form-group" style="display: none" id="fisica_div">
                                                <label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def" id="fisica" class="form-control" disabled>
                                                    <?php 
                                                    echo $dados_def_exc<>'' ?   '<option selected value="'.$dados_def_exc.'">'.$dados_def_exc.'</option>' : '';
													$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '2'  AND dados<>'$dados_def_exc'";
													foreach($pdo->query($sql_dados_def) as $dados_def){
													echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
													}
												?>
                                                </select>
                                            </div>
                                            <div class="form-group" style="display: none" id="Visual_div">
                                                <label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def" id="Visual" class="form-control" disabled>
                                                    <?php 
                                                     echo $dados_def_exc<>'' ?   '<option selected value="'.$dados_def_exc.'">'.$dados_def_exc.'</option>' : '';
													$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '3' AND dados<>'$dados_def_exc' ";
													foreach($pdo->query($sql_dados_def) as $dados_def){
													echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
													}
												?>
                                                </select>
                                            </div>
                                            <div class="form-group" style="display: none" id="Intelectual_div">
                                                <label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def" id="Intelectual" class="form-control" disabled>
                                                    <?php 
                                                    echo $dados_def_exc<>'' ?   '<option selected value="'.$dados_def_exc.'">'.$dados_def_exc.'</option>' : '';
													$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '4' AND dados<>'$dados_def_exc' ";
													foreach($pdo->query($sql_dados_def) as $dados_def){
													echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
													}
												?>
                                                </select>
                                            </div>
                                            <div class="form-group" style="display: none" id="Deficiencia_div">
                                                <label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def" id="Deficiencia" class="form-control" disabled>
                                                    <?php 
                                                    echo $dados_def_exc<>'' ?   '<option selected value="'.$dados_def_exc.'">'.$dados_def_exc.'</option>' : '';
													$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '5' AND dados<>'$dados_def_exc' ";
													foreach($pdo->query($sql_dados_def) as $dados_def){
													echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
													}
												?>
                                                </select>
                                            </div>
                                            <div class="form-group" style="display: none" id="Reabilitados_div">
                                                <label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def" id="Reabilitados" class="form-control"
                                                    disabled>
                                                    <?php 
                                                     echo $deficiencia_exc<>'' ?   '<option selected value="'.$deficiencia_exc.'">'.$deficiencia_exc.'</option>' : '';
													$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '6' AND dados<>'$dados_def_exc' ";
													foreach($pdo->query($sql_dados_def) as $dados_def){
													echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
													}
												?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" style="display: none" id="vgtbpcd">
                                                <label class="control-label" for="instituicao">Vaga disponível também
                                                    para PCD </label><br>
                                                <label><input type="radio" id="def_check2" value="Sim" name="def2"
                                                        <?php echo $vaga_tambem_pcd=='Sim' ? "checked" : "";?>
                                                        onClick="optionDef2()">&nbsp;Sim</label>&nbsp;
                                                <label><input type="radio" value="Não" name="def2" id="def2"
                                                        <?php echo $vaga_tambem_pcd=='Não' ? "checked" : "";?>
                                                        onClick="optionDef2()">&nbsp;Não</label>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group" id="def_div2"
                                                <?php echo $vaga_tambem_pcd=='Sim' ? "style='display: block'" : "style='display: none'";?>>
                                                <label class="control-label" for="Nome">&nbsp;&nbsp;Deficiência </label>
                                                <select name="defselect2" id="defselect2" class="form-control"
                                                    onChange="optionDados2()">

                                                    <?php 
                                                     echo $deficiencia_tbm<>'' ?   '<option selected value="'.$deficiencia_tbm.'">'.$deficiencia_tbm.'</option>' : '';
													$sql_def2 = "SELECT * FROM bd_emprega_aruja.tb_pre_deficiencias where deficiencia <>'$deficiencia_tbm'; ";
													foreach($pdo->query($sql_def2) as $def2){
													echo    '<option value="'   .$def2['deficiencia'].'">'    .$def2['deficiencia']   .'</option>';
													}
												?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" style="display: none" id="Audi_div2">
                                                <label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def2" id="Audi2" class="form-control" disabled>
                                                    <?php 
                                                    echo $dados_def_tbm<>'' ?   '<option selected value="'.$dados_def_tbm.'">'.$dados_def_tbm.'</option>' : '';
													$sql_dados_def2 = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '1' AND dados <>'$dados_def_tbm'";
													foreach($pdo->query($sql_dados_def2) as $dados_def2){
													echo    '<option value="'   .$dados_def2['dados'].'">'    .$dados_def2['dados']   .'</option>';
													}
												?>
                                                </select>
                                            </div>
                                            <div class="form-group" style="display: none" id="fisica_div2">
                                                <label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def2" id="fisica2" class="form-control" disabled>
                                                    <?php 
                                                     echo $dados_def_tbm<>'' ?   '<option selected value="'.$dados_def_tbm.'">'.$dados_def_tbm.'</option>' : '';
													$sql_dados_def2 = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '2' AND dados <>'$dados_def_tbm'";
													foreach($pdo->query($sql_dados_def2) as $dados_def2){
													echo    '<option value="'   .$dados_def2['dados'].'">'    .$dados_def2['dados']   .'</option>';
													}
												?>
                                                </select>
                                            </div>
                                            <div class="form-group" style="display: none" id="Visual_div2">
                                                <label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def2" id="Visual2" class="form-control" disabled>
                                                    <?php 
                                                    echo $dados_def_tbm<>'' ?   '<option selected value="'.$dados_def_tbm.'">'.$dados_def_tbm.'</option>' : '';
													$sql_dados_def2 = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '3' AND dados <>'$dados_def_tbm' ";
													foreach($pdo->query($sql_dados_def2) as $dados_def2){
													echo    '<option value="'   .$dados_def2['dados'].'">'    .$dados_def2['dados']   .'</option>';
													}
												?>
                                                </select>
                                            </div>
                                            <div class="form-group" style="display: none" id="Intelectual_div2">
                                                <label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def2" id="Intelectual2" class="form-control"
                                                    disabled>
                                                    <?php 
                                                     echo $dados_def_tbm<>'' ?   '<option selected value="'.$dados_def_tbm.'">'.$dados_def_tbm.'</option>' : '';
													$sql_dados_def2 = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '4' AND dados <>'$dados_def_tbm' ";
													foreach($pdo->query($sql_dados_def2) as $dados_def2){
													echo    '<option value="'   .$dados_def2['dados'].'">'    .$dados_def2['dados']   .'</option>';
													}
												?>
                                                </select>
                                            </div>
                                            <div class="form-group" style="display: none" id="Deficiencia_div2">
                                                <label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def2" id="Deficiencia2" class="form-control"
                                                    disabled>
                                                    <?php 
                                                     echo $dados_def_tbm<>'' ?   '<option selected value="'.$dados_def_tbm.'">'.$dados_def_tbm.'</option>' : '';
													$sql_dados_def2 = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '5' AND dados <>'$dados_def_tbm'";
													foreach($pdo->query($sql_dados_def2) as $dados_def2){
													echo    '<option value="'   .$dados_def2['dados'].'">'    .$dados_def2['dados']   .'</option>';
													}
												?>
                                                </select>
                                            </div>
                                            <div class="form-group" style="display: none" id="Reabilitados_div2">
                                                <label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def2" id="Reabilitados2" class="form-control"
                                                    disabled>
                                                    <?php 
                                                     echo $dados_def_tbm<>'' ?   '<option selected value="'.$dados_def_tbm.'">'.$dados_def_tbm.'</option>' : '';
													$sql_dados_def2 = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '6' AND dados <>'$dados_def_tbm'";
													foreach($pdo->query($sql_dados_def2) as $dados_def2){
													echo    '<option value="'   .$dados_def2['dados'].'">'    .$dados_def2['dados']   .'</option>';
													}
												?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="identificador" value="<?=$identificador;?>">
                                    <input type="hidden" name="id" value="<?=$id;?>">
                                    <input type="submit" class="btn btn-info btn-fill pull-right" name="editar"
                                        value="Atualizar Vaga">

                                </form>
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




        <?php include "./includes/condicao_deficiencias.php"; ?>
        <?php include "./includes/condicao_dados_deficiencia.php"; ?>
        <?php include "./controll/mensagens/mensagens.php" ?>
        <script>
        window.onload = function() { // same as window.addEventListener('load', (event) => {
            optionDef();
            optionDados();
            optionDef2();
            optionDados2();
        };
        $('.selectpicker').select2();





        tinymce.init({
            selector: 'textarea#basic-example',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
        </script>