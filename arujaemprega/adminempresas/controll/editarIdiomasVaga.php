<link rel="stylesheet" type="text/css" href="assets/css/cadastrarvaga.css" />


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
            <a class="navbar-brand" href="#pablo">Editar Idiomas da Vaga: <?php echo  $id; ?></a>
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
                        <form class="vagas" name="cadastrarvagas" action="./data/insert/editaridiomas.php"
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


                                                    <div class="row">

                                                        <label class="col-md-1 control-label" for="Nome"
                                                            style="text-align: right">&nbsp;&nbsp;Idioma <h11>*</h11>
                                                            </label>
                                                        <div class="col-md-2">
                                                            <select name="idioma" id="idioma" class="form-control"
                                                                style="width: 98%" required="">
                                                                <option value="">Clique Aqui</option>
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
                                                            <select name="nivel" class="form-control" id="nivel"
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
                                                            <select name="obrigatorio" class="form-control"
                                                                id="obrigatorio" style="width: 98%" required="">
                                                                <option value="">Clique Aqui</option>
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select><br>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <button name="cadastrar" class="btn btn-primary cursor"
                                                                type="Submit" title="Cadastrar Dados">Cadastrar</button>
                                                        </div>
                                                        <hr>
                                                        <hr>

                                                    </div>
                                                    <input type="hidden" name="idvaga" value="<?=$id;?>">
                                            </form>

                                            <div class="card-header"><br>
                                                <h4 class="card-title"> Dados Já Cadastrados</h4><br>
                                            </div>


                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Idioma</th>
                                                        <th>Nível</th>
                                                        <th>Obrigatório</th>
                                                        <th>Excluir</th>

                                                    </tr>
                                                </thead>
                                                <?php 
                                                                        $select	=	"SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga_idiomas where id_vaga = '$id' ";	
                                                                        foreach($pdo->query($select)as $idioma){
                                                                        ?>
                                                <tbody>
                                                    <form action="./data/delete/deleteidiomas.php" method="POST">
                                                        <tr>

                                                            <td><?php echo $idioma['nome'] ?></td>
                                                            <td><?php echo $idioma['nivel'] ?></td>
                                                            <td><?php echo $idioma['obrigatorio'] ?></td>
                                                            <td><button type="submit" class="btn btn-danger"><i
                                                                        class="fa fa-trash" aria-hidden="true"
                                                                        style="color:red; font-size:20px"></i></button>
                                                            </td>
                                                        </tr>
                                                        <input type="hidden" name="idvaga" value="<?=$id;?>">
                                                        <input type="hidden" name="id"
                                                            value="<?=$idioma['id_vaga_idioma'];?>">
                                                    </form>
                                                </tbody>
                                                <?php } ?>
                                            </table>


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

        <?php include "./controll/mensagens/mensagens.php" ?>

    </div>