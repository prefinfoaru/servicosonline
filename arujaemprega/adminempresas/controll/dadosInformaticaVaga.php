<link rel="stylesheet" type="text/css" href="assets/css/cadastrarvaga.css" />


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
.cursor {
    cursor: pointer;
}
</style>
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
                        <form class="vagas" name="cadastrarvagas" action="./data/insert/cadastrarinformatica.php"
                            method="POST">
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form role="form" method="post"
                                                action="./data/insert/cadastrarinformatica.php">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Dados de Informática da Vaga</h3>
                                                </div> <br>
                                                <div class="content">
                                                    <div class="form-group">
                                                        <label class="control-label">Necessário Conhecimento em
                                                            informática</label><br>
                                                        <input type="radio" name="optinfo" value="Sim" id="optinfo"
                                                            onClick="optionCheck()" checked />
                                                        <label class="control-label"> Sim</label>
                                                        <input type="radio" name="optinfo" value="Não" id="optinfo"
                                                            onClick="optionCheck()" />
                                                        <label class="control-label">Não </label>
                                                    </div>
                                                    <div id="SimNao_div" style="display: block">
                                                        <div class="row conte">
                                                            <label class="col-md-1 control-label" for="habilidades"
                                                                style="text-align: right">&nbsp;&nbsp;Área <h11>*</h11>
                                                                </label>
                                                            <div class="col-md-2">
                                                                <select name="area" class="form-control" id="area"
                                                                    style="width: 98%" required=""
                                                                    onChange="optionInfor()">
                                                                    <option value="Clique Aqui">Clique Aqui</option>
                                                                    <?php 
                                                                                $sql_area = "SELECT * FROM bd_emprega_aruja.tb_pre_informatica; ";
                                                                                foreach($pdo->query($sql_area) as $row_area){
                                                                                echo    '<option value="'   .$row_area['dados_informatica'].'">'    .$row_area['dados_informatica'].'</option>';
                                                                                }
                                                                            ?>
                                                                </select>
                                                            </div>
                                                            <br>
                                                            <label class="col-md-2 control-label" for="instituicao"
                                                                style="text-align: center">&nbsp;Conhecimentos <h11>*
                                                                </h11></label>

                                                            <div class="col-md-2" id="clique_div" style="display: none">
                                                                <select name="nivel[]" class="form-control" id="clique"
                                                                    style="width: 98%" required="" disabled>
                                                                    <option value="">Clique Aqui</option>
                                                                </select><br>
                                                            </div>

                                                            <div class="col-md-2" id="banco_div" style="display: block">
                                                                <select name="dados_infor" class="form-control"
                                                                    id="banco" style="width: 98%" required="" disabled>
                                                                    <option value="">Clique Aqui</option>
                                                                    <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '1' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                                </select><br>
                                                            </div>

                                                            <div class="col-md-2" style="display: none"
                                                                id="programacao_div">
                                                                <select name="dados_infor" class="form-control"
                                                                    id="programacao" style="width: 98%" required=""
                                                                    disabled>
                                                                    <option value="">Clique Aqui</option>
                                                                    <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '2' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                                </select><br>
                                                            </div>

                                                            <div class="col-md-2" style="display: none"
                                                                id="graficos_div">
                                                                <select name="dados_infor" class="form-control"
                                                                    id="graficos" style="width: 98%" required=""
                                                                    disabled>
                                                                    <option value="">Clique Aqui</option>
                                                                    <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '3' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                                </select><br>
                                                            </div>

                                                            <div class="col-md-2" style="display: none"
                                                                id="escritorio_div">
                                                                <select name="dados_infor" class="form-control"
                                                                    id="escritorio" style="width: 98%" required=""
                                                                    disabled>
                                                                    <option value="">Clique Aqui</option>
                                                                    <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '4' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                                </select><br>
                                                            </div>

                                                            <div class="col-md-2" style="display: none"
                                                                id="operacionais_div">
                                                                <select name="dados_infor" class="form-control"
                                                                    id="operacionais" style="width: 98%" required=""
                                                                    disabled>
                                                                    <option value="">Clique Aqui</option>
                                                                    <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '5' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                                </select><br>
                                                            </div>

                                                            <div class="col-md-2" style="display: none" id="outros_div">
                                                                <select name="dados_infor" class="form-control"
                                                                    id="outros" style="width: 98%" required="" disabled>
                                                                    <option value="">Clique Aqui</option>
                                                                    <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '6' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                                </select><br>
                                                            </div>

                                                            <label class="col-md-2 control-label" for="obrigatorio"
                                                                style="text-align: center">Obrigatório <h11>*</h11>
                                                                </label>
                                                            <div class="col-md-2">
                                                                <select name="obrigatorio" class="form-control"
                                                                    id="obrigatorio" style="width: 98%" required="">
                                                                    <option value="">Clique Aqui</option>
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select><br>
                                                            </div>



                                                        </div>
                                                        <div class="form-group" align="center">
                                                            <button id="btnSave" name="btnSave"
                                                                class="btn btn-info cursor"
                                                                type="submit">Cadastrar</button>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <input type="hidden" name="idvaga" value="<?=$id;?>">
                                            </form>
                                            <br><br>

                                            <table class="table table-hover" style="text-align: center;">
                                                <tr>
                                                    <th style="text-align: center">Área</th>
                                                    <th style="text-align: center">Conhecimento</th>
                                                    <th style="text-align: center">Obrigatório</th>
                                                    <th style="text-align: center">Excluir</th>
                                                </tr>
                                                <?php 
						$select_formacao = "SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga_informatica where id_vaga = '$id'  ";

						foreach ($pdo->query($select_formacao) as $formacao){
							$id_informatica	=	$formacao['id_vaga_informatica'];
						echo '<tr style="font-size: 14px;">';
						echo '<td>'	.	 	$formacao['area']				. 	'</td>';	
						echo '<td>'	. 		$formacao['conhecimento']		. 	'</td>';
						echo '<td>'	. 		$formacao['obrigatorio']		.	'</td>';
						echo '<td><a data-toggle="modal" data-target="#myModal1'.$id_informatica.'"><i class="fa fa-trash cursor" title="Clique Para Escluir Essas Informações" style="color:red"></i></a></td>';
						echo '</tr>';
						
						include "./includes/modal_excluir_informatica.php";
							
						};	

						?>
                                            </table><br><br>



                                            <a
                                                href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=listarvagas&cadinforconcluida=1"><button
                                                    type="button" name="cadastrar"
                                                    class="btn btn-primary nextBtn pull-right cursor"
                                                    type="button">Concluir Cadastro</button></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
    function optionCheck() {

        if (document.getElementById('optinfo').checked == true) {

            document.getElementById('SimNao_div').style.display = 'block';
            document.getElementById("area").disabled = false;
            document.getElementById("obrigatorio").disabled = false;

        } else {

            document.getElementById('SimNao_div').style.display = 'none';
            document.getElementById("area").disabled = true;
            document.getElementById("obrigatorio").disabled = true;
        }
    }
    </script>

    <?php include "./includes/condicao_dados_informatica.php" ?>
    <?php include "./controll/mensagens/mensagens.php" ?>


    <script src="./assets/js/habilitacao.js"></script>
</div>