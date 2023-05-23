<?php
session_start();
require_once("../data/conexaoBD.php");


$idE = $_GET['id'];

if ($_SESSION['logado'] == "") {

    $_SESSION['erro'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'> Acesso não autorizado!</div>";
    echo "<script>window.location='../pages/login.php'</script>";
} else {
    $sec = $_SESSION["secretaria"];
    $sql1 = "SELECT * FROM emendasimpositivas.emendas WHERE id_emendas = '$idE' and secretaria = '$sec';";
    $resultado = mysqli_query($conexao, $sql1);

    $num_rows = mysqli_num_rows($resultado);

    $row_dados = mysqli_fetch_assoc($resultado);
    $idemenda = $row_dados['numero_emenda'];
    $status = $row_dados['status_emendas'];
    $valorEmpenhado = $row_dados['valor_empenhado'];
    $valorLiquidado = $row_dados['valor_liquidado'];

    if ($num_rows < "1" &&  $_SESSION["secretaria"] != "impositivas") {
        $_SESSION['erro'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'> Acesso não autorizado!</div>";
        echo "<script>window.location='../pages/login.php'</script>";
    }
}





?>



<body>
    <div class="container" style="background:#ffff">
        <div class="row">
            <div class="col-md-12">


                <div class="panel panel-primary">


                    <div class="panel-heading">
                        <h3 class="titulo">Número Emenda: <?php echo $idemenda ?></h3>
                        <!-- <div style="text-align: right;">
                            <a class="btn btn-danger " style="font-size: 12px; " href="../pages/manutencaoImpositivas.php" role="button">Voltar</a>
                        </div> -->

                    </div>

                    <br>

                    <div class="panel-body">
                        <form class="form-group" method="post" enctype="multipart/form-data"
                            action="../data/update/update_emendas.php">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span id="cad" class="help-block"><strong>Status Atual da
                                                Emenda:</strong></span>
                                        <textarea id="cad" name="status_emendas" class="form-control" required=""
                                            rows="4" maxlength="2000"><?php echo $status;?></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <span class="help-block"><strong>Valor Empenhado:</strong></span>
                                        <input name="valor_empenhado" value="<?php
                                                                               echo  $valorEmpenhado;?>"
                                            class="form-control" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <span class="help-block"><strong>Valor Liquidado</strong></span>
                                        <input id="liq" name="valor_liquidado" value="<?php
                                                                                        echo $valorLiquidado; ?>"
                                            class="form-control" type="text">
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-8">
                                        <form enctype="multipart/form-data" action="upload_docs.php" method="POST">
                                            <input name="id_emendas" type="hidden" value="30000">
                                            <label for="exampleFormControlFile1"><strong>Pedido de compra ou nota de
                                                    empenho</strong></label>
                                            <input type="file" class="form-control-file" name="arquivo"
                                                id="envardocumentos">
                                        </form>
                                        <br>
                                    </div>
                                    <input name="id_emendas" type="hidden" value="<?php echo    $idE; ?>">
                                    <div class="col-md-12" align="right">
                                        <button type="submit" class="btn btn-primary btn-sm" role="button"
                                            name="btn">Salvar</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>