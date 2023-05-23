<?php 

include "./data/conexao.php";
$idempresa = $_SESSION['iduser'];

$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numid = explode('id=', $URL_ATUAL, 2);
$id = $numid[1];
    
    
include('./data/banco.php');   
    
    
    ?>


<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo"> Baixar vaga: <?php echo  $id; ?></a>
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
                        <form action="./data/update/baixar_vaga.php" method="POST">
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="panel-heading">
                                                <h4 class="panel-title">Por favor, responda um pequeno questionário para
                                                    baixar a vaga.</h4>
                                            </div> <br>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h5>Motivo?</h5><br>
                                                            <input type="radio" id="motivo" name="motivo"
                                                                value="arujaemprega" onclick="motivobaixa()">
                                                            <label>Vaga preenchida por candidato Arujá
                                                                Emprega.</label><br>
                                                            <input type="radio" id="motivo2" name="motivo"
                                                                value="outrosite" onclick="motivobaixa()">
                                                            <label>Vaga preenchida por candidato de outro
                                                                site.</label><br>
                                                        </div>
                                                        <br>
                                                        <div class="form-group" style="display: none"
                                                            id="quantidade_candidato">

                                                            <h5>Quantidade de candidatos contratados?</h5> &nbsp
                                                            <input type="number" name="quantidadecand"
                                                                class="form-control"><br>
                                                            <hr>
                                                            <h5>Quem ou Quais foram os candidatos contratados?</h5>
                                                            <?php
										  $sql_area = "SELECT * FROM bd_emprega_aruja.tb_candidato_aprovado a inner join tb_cadastro_solicitante s on a.id_solicitante = s.id_solicitante where id_vaga = '$id' order by nome; ";
                                                                                foreach($pdo->query($sql_area) as $row){
                                                                              echo	' <label class="checkbox-inline"><input type="checkbox" value="'.$row['id_solicitante'].'" name="candidato[]">&nbsp' .$row['nome']. '&nbsp&nbsp</label>';
                                                                                }?>



                                                        </div>

                                                        <div class="form-group" style="display: none"
                                                            id="site_escolhido">
                                                            <label>Site onde os candidatos foram escolhidos.</label>
                                                            <input type="text" name="site" class="form-control">

                                                        </div>
                                                        <br><br>
                                                    </div>

                                                    <input type="hidden" value="<?php echo $id?>" name="id">

                                                    <input type="hidden" value="<?php echo $idempresa?>"
                                                        name="idempresa">

                                                </div>
                                                <div style="text-align:right">
                                                    <button type="submit" class="btn btn-success" type="button">Baixar
                                                        Vaga</button>
                                                </div><br>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>



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

    <script>
    function motivobaixa() {
        var id = document.querySelector('input[name="motivo"]:checked').value;
        if (id == "arujaemprega") {
            document.getElementById('site_escolhido').style.display = 'none';
            document.getElementById('quantidade_candidato').style.display = 'block';

        } else if (id == "outrosite") {

            document.getElementById('site_escolhido').style.display = 'block';
            document.getElementById('quantidade_candidato').style.display = 'none';
        }
    }
    </script>