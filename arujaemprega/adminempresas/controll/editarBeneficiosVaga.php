<link rel="stylesheet" type="text/css" href="assets/css/cadastrarvaga.css" />
<!-- <link href="./assets/css/multi-select.css" media="screen" rel="stylesheet" type="text/css"> -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php 

$idempresa = $_SESSION['iduser'];
    $URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $numid = explode('id=', $URL_ATUAL, 2);
    if(isset($numid[1])){
        $id=$numid[1];
    }
    



include('./data/banco.php');
include('./data/conexao.php');
?>

<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">Editar Benefícios da Vaga: <?php echo  $id; ?></a>
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

                        <form class="vagas" name="cadastrarvagas" action="./data/update/editarbeneficio.php"
                            method="POST">
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form role="form">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Benefícios da Vaga</h3>
                                                </div> <br>
                                                <?php  $sql ="SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga_beneficios where id_vaga = $id";
                                                        
                                                        $sql_beneficios = "SELECT * FROM bd_emprega_aruja.tb_pre_beneficios ";

                                                        $resultado = mysqli_query($conn, $sql);
                                                        $numero = mysqli_num_rows( $resultado );
                                                        
                                                        ?>
                                                <div class="content">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">A vaga tem
                                                                    beneficios?</label><br>
                                                                <input name="perbeneficios" type="radio"
                                                                    name="beneficios" value="Sim" id="beneficios"
                                                                    <?php   echo  $numero >= 1 ? "checked":"";       ?>
                                                                    onClick="optionBenef()" />
                                                                <label class="control-label"> Sim</label>
                                                                <input name="perbeneficios" type="radio"
                                                                    name="beneficios" value="Não"
                                                                    <?php  echo $numero == 0 ? "checked":"";            ?>
                                                                    onClick="optionBene()" />
                                                                <label class="control-label">Não </label>
                                                            </div>
                                                        </div>


                                                        <div id="escolhas" style="display: none">



                                                            <?php
                                                               
                                                                      
                                                                      

                                                                        foreach($pdo->query($sql_beneficios) as $beneficios){
                                                                         
                                                                           ?>
                                                            <input type="checkbox"
                                                                value="<?php echo $beneficios["nome"]?>"
                                                                name="beneficios[]" <?php
                                                                           foreach($pdo->query($sql) as $beneficiosvaga){
                                                                                echo  $beneficios["nome"] == $beneficiosvaga["nome"] ? "checked":"";
                                                                           }
                                                                           
                                                                           ?>>




                                                            <label
                                                                class="form-check-label"><?php echo $beneficios["nome"];?></label><br>

                                                            <?php    
                                                                    
                                                                        }
                                                                
                                                                         
                                                                    ?>


                                                        </div>

                                                        <script>
                                                        if (document.getElementById('beneficios').checked == true) {
                                                            document.getElementById('escolhas').style.display = 'block';
                                                        }

                                                        function optionBenef() {

                                                            document.getElementById('escolhas').style.display = 'block';


                                                        }

                                                        function optionBene() {

                                                            document.getElementById('escolhas').style.display = 'none';


                                                        }
                                                        </script>
                                                    </div>
                                                    <input type="hidden" name="idvaga" value="<?=$id;?>">
                                                    <button type="submit" name="cadastrar"
                                                        class="btn btn-primary pull-right"
                                                        type="button">Próximo</button>
                                                </div>
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
<?php include "./controll/mensagens/mensagens.php" ?>