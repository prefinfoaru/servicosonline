<link rel="stylesheet" type="text/css" href="assets/css/cadastrarvaga.css" />


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
.cursor {
    cursor: pointer;
}
</style>
<?php 

include "./data/conexao.php";
$idempresa = $_SESSION['iduser'];
    $URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $numid = explode('id=', $URL_ATUAL, 2);
    if(isset($numid[1])){
        $id=$numid[1];
    }
    

	

include('./data/banco.php');
?>

<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Editar Informações de Informática da Vaga: <?php echo  $id; ?></a>
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
                        <div class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form role="form" method="post" action="./data/insert/editarinformatica.php">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Dados de Informática da Vaga</h3>
                                            </div> <br>
                                            <div class="content">


                                                <div class="row ">
                                                    <label class="col-md-1 control-label" for="habilidades"
                                                        style="text-align: right">&nbsp;&nbsp;Área <h11>*</h11></label>
                                                    <div class="col-md-2">
                                                        <select name="area" class="form-control" id="area"
                                                            style="width: 98%" required="" onChange="optionInfor()">
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
                                                        style="text-align: center">&nbsp;Conhecimentos <h11>*</h11>
                                                        </label>

                                                    <div class="col-md-2" id="clique_div" style="display: none">
                                                        <select name="nivel[]" class="form-control" id="clique"
                                                            style="width: 98%" required="" disabled>
                                                            <option value="">Clique Aqui</option>
                                                        </select><br>
                                                    </div>

                                                    <div class="col-md-2" id="banco_div" style="display: block">
                                                        <select name="dados_infor" class="form-control" id="banco"
                                                            style="width: 98%" required="" disabled>
                                                            <option value="">Clique Aqui</option>
                                                            <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '1' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                        </select><br>
                                                    </div>

                                                    <div class="col-md-2" style="display: none" id="programacao_div">
                                                        <select name="dados_infor" class="form-control" id="programacao"
                                                            style="width: 98%" required="" disabled>
                                                            <option value="">Clique Aqui</option>
                                                            <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '2' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                        </select><br>
                                                    </div>

                                                    <div class="col-md-2" style="display: none" id="graficos_div">
                                                        <select name="dados_infor" class="form-control" id="graficos"
                                                            style="width: 98%" required="" disabled>
                                                            <option value="">Clique Aqui</option>
                                                            <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '3' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                        </select><br>
                                                    </div>

                                                    <div class="col-md-2" style="display: none" id="escritorio_div">
                                                        <select name="dados_infor" class="form-control" id="escritorio"
                                                            style="width: 98%" required="" disabled>
                                                            <option value="">Clique Aqui</option>
                                                            <?php 
                                                                                $sql_infor = "SELECT * FROM bd_emprega_aruja.tb_pre_conhecimentos_informatica where tipo_conhecimento = '4' ";
                                                                                foreach($pdo->query($sql_infor) as $row_infor){
                                                                                echo    '<option value="'   .$row_infor['dados_infor'].'">'    .$row_infor['dados_infor'].'</option>';
                                                                                }
                                                                            ?>

                                                        </select><br>
                                                    </div>

                                                    <div class="col-md-2" style="display: none" id="operacionais_div">
                                                        <select name="dados_infor" class="form-control"
                                                            id="operacionais" style="width: 98%" required="" disabled>
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
                                                        <select name="dados_infor" class="form-control" id="outros"
                                                            style="width: 98%" required="" disabled>
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
                                                        style="text-align: center">Obrigatório <h11>*</h11></label>
                                                    <div class="col-md-2">
                                                        <select name="obrigatorio" class="form-control" id="obrigatorio"
                                                            style="width: 98%" required="">
                                                            <option value="">Clique Aqui</option>
                                                            <option value="Sim">Sim</option>
                                                            <option value="Não">Não</option>
                                                        </select><br>
                                                    </div>



                                                </div>
                                                <div class="form-group" align="center">
                                                    <button id="btnSave" name="btnSave" class="btn btn-info cursor"
                                                        type="submit">Cadastrar</button>
                                                </div>
                                            </div>
                                            <br>

                                            <input type="hidden" name="idvaga" value="<?=$id;?>">
                                        </form>

                                        <div class="card-header"><br>
                                            <h4 class="card-title"> Dados Já Cadastrados</h4><br>
                                        </div>


                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">Área</th>
                                                    <th style="text-align: center">Conhecimento</th>
                                                    <th style="text-align: center">Obrigatório</th>
                                                    <th style="text-align: center">Excluir</th>
                                                </tr>
                                            </thead>

                                            <?php 
                                                                $select_formacao = "SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga_informatica where id_vaga = '$id'  ";

                                                                foreach ($pdo->query($select_formacao) as $formacao){
                                                                    
                                                                    ?>

                                            <form action="./data/delete/deleteinformatica.php" method="POST">
                                                <tbody>
                                                    <tr>


                                                        <td><?php echo	$formacao['area']	;		?></td>
                                                        <td><?php echo	$formacao['conhecimento']	;	?></td>
                                                        <td><?php 	echo	$formacao['obrigatorio']; ?></td>
                                                        <td><button type="submit" class="btn btn-danger"><i
                                                                    class="fa fa-trash" aria-hidden="true"
                                                                    style="color:red; font-size:20px"></i></button></td>
                                                    </tr>
                                                </tbody>
                                                <input type="hidden" name="idvaga" value="<?=$id;?>">
                                                <input type="hidden" name="id"
                                                    value="<?=$formacao['id_vaga_informatica'];?>">

                                            </form>
                                            <?php   
                                                                }	

                                                                ?>
                                        </table><br><br>




                                    </div>
                                </div>
                                <a
                                    href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminempresas/?p=menu_editarvagas&?id=<?php echo $id;?>"><button
                                        type="button" class="btn btn-primary  pull-right cursor"
                                        type="button">VOLTAR</button></a>
                                <br>
                            </div>
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



    <?php include "./includes/condicao_dados_informatica.php" ?>
    <?php include "./controll/mensagens/mensagens.php" ?>


</div>