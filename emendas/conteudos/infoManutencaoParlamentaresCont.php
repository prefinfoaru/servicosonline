<?php
session_start();
require_once("../data/conexaoBD.php");
$idE = $_GET['id'];

if ($_SESSION['logado'] == "" || $_SESSION['secretaria'] != "parlamentares") {

    $_SESSION['erro'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'> Acesso não autorizado!</div>";
    echo "<script>window.location='../pages/login.php'</script>";
} else {
    $sec = $_SESSION["secretaria"];
    $sql1 = "SELECT * FROM emendasimpositivas.emendas_parlamentares";
    $resultado = mysqli_query($conexao, $sql1);

    $num_rows = mysqli_num_rows($resultado);

    $row_dados = mysqli_fetch_assoc($resultado);
    $idemenda = $row_dados['id_emenda_parl'];

    if ($num_rows < "1") {
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
                        <h3 class="titulo"> Emenda Parlamentar</h3>
                        <div style="text-align: right;">
                            <a class="btn btn-danger " style="font-size: 12px; " href="../pages/manutencaoParlamentares.php" role="button">Voltar</a>
                        </div>

                    </div>

                    <br>

                    <div class="panel-body">
                        <form class="form-group" method="post" enctype="multipart/form-data" action="../data/update/updateEmendasParlamentares.php">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span id="cad" class="help-block"><strong>Objeto da Emenda:</strong></span>
                                        <input id="cad" name="objeto_emenda" value="<?php $sql = "SELECT * FROM emendasimpositivas.emendas_parlamentares WHERE id_emenda_parl = '$idE'";
                                                                                    foreach ($conexao->query($sql) as $row) {
                                                                                        echo $row['objeto_emenda'];
                                                                                    } ?>" class="form-control" required="" type="text">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <span class="help-block"><strong>Deputado:</strong></span>
                                        <input name="deputado" value="<?php
                                                                        $sql = "SELECT * FROM emendasimpositivas.emendas_parlamentares WHERE id_emenda_parl = '$idE'";
                                                                        foreach ($conexao->query($sql) as $row) {
                                                                            echo $row['deputado'];
                                                                        } ?>" class="form-control" type="text">
                                    </div>
                                    <div class="col-md-3 ">
                                        <span class="help-block"><strong>Valor Emenda:</strong></span>
                                        <input name="valor_emenda" value="<?php
                                                                            $sql = "SELECT * FROM emendasimpositivas.emendas_parlamentares WHERE id_emenda_parl = '$idE'";
                                                                            foreach ($conexao->query($sql) as $row) {
                                                                                echo $row['valor_emenda'];
                                                                            } ?>" class="form-control" type="text">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="help-block"><strong>Tipo Emenda</strong></span>
                                        <input id="liq" name="tipo_emenda" value="<?php
                                                                                    $sql = "SELECT * FROM emendasimpositivas.emendas_parlamentares WHERE id_emenda_parl = '$idE'";
                                                                                    foreach ($conexao->query($sql) as $row) {
                                                                                        echo $row['tipo_emenda'];
                                                                                    } ?>" class="form-control" type="text">
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <input name="id_emendas" type="hidden" value="<?php echo    $idE; ?>">
                                    <div class="col-md-8"> <br>
                                        <button type="submit" class="btn btn-primary btn-sm" role="button" name="btn">Salvar</button>
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