<?php
header("Content-type: text/html; charset=utf-8");
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['secretaria']) || $_SESSION['secretaria'] !== '02.11.00 - Secretaria Municipal de Governo') {
    echo 'aqui';
    echo "<script>window.location='../pages/login.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-----JQuery------>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.mask.min.js" type="text/javascript"></script>
    <!---sweer alert---->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../assets/js/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</head>

<body>

    <?php

    if (isset($_GET['res'])) {
        $res = $_GET['res'];
        if ($res == 1) { ?>
            <script>
                swal.fire({
                    title: 'Emenda impositiva inserida com sucesso',
                    icon: "success",
                    html: '<p style="font-size:14px;">Informação Inserida.</p><hr><a style="color:#000" href="formEmendasParlamentares.php"><button  class="btn btn-default">OK</button></a>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            </script>
        <?php }
        if ($res == 2) { ?>
            <script>
                swal.fire({
                    title: 'Ocorreu um erro ao inserir a emenda!',
                    icon: "error",
                    html: '<p style="font-size:14px;">Verifique os campos e tente novamente.</p><hr><a style="color:#000" href="formEmendasParlamentares.php"><button  class="btn btn-default">OK</button></a>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            </script>

        <?php }

        if ($res == 3) { ?>

            <script>
                swal.fire({
                    title: 'Não foi possível realizar a solicitação!',
                    icon: "error",
                    html: '<p style="font-size:14px;">Houve um problema ao salvar o arquivo enviado. Verifique e tente novamente!</p><hr><a style="color:#000" href="formRessarcimento.php"><button  class="btn btn-default">OK</button></a>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            </script>

        <?php }

        if ($res == 4) { ?>

            <script>
                swal.fire({
                    title: 'Extensão de arquivo não permitida!',
                    icon: "error",
                    html: '<p style="font-size:14px;">Extensões permitidas: PDF, PNG, JPG e JPEG.</p><hr><a style="color:#000" href="formRessarcimento.php"><button  class="btn btn-default">OK</button></a>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            </script>

    <?php }
    }

    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <br><br>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="titulo">Inclusão de Emendas Parlamentares</h4>
                    </div>
                    <div class="panel-body">
                        <form method="POST" enctype="multipart/form-data" action="../data/insert/incluirEmendaParlamentar.php" accept-charset="utf-8" onsubmit="return checkBeforeSubmit();">
                            <fieldset>
                                <div class=" row">
                                    <div class="col-md-4">
                                        <span id="numero" class="help-block"><strong>Deputado:</strong></span>
                                        <input id="deputado" name="deputado" placeholder="Digite o nome do deputado" class="form-control" required="" type="text">
                                    </div>
                                    <div class="col-md-4">
                                        <span id="value" class="help-block"><strong>Valor:</strong></span>
                                        <input class="form-control" type="text" id="valor" name="valor" placeholder=" Digite o Valor" required onkeyup="formatarMoeda(this)">
                                    </div>
                                    <div class="col-md-4">
                                        <span id="value" class="help-block"><strong>Tipo da Emenda:</strong></span>
                                        <input class="form-control" type="text" id="emenda" name="emenda" placeholder=" Digite o tipo da emenda" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span for="cad" class="help-block"><strong>Objeto:</strong></span>
                                        <input id="objeto" name="objeto" class="form-control" placeholder="Digite o objeto" type="text" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" id='enviar' class="btn btn-primary" name="enviar" value="Cadastrar"></input>
                                        <a href="../pages/manutencaoParlamentares.php"><input type="button" class="btn btn-primary" name="Listar" value="Listar Emendas"></a>
                                    </div>
                                </div>
                    </div>
                    <hr>
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


</body>
<script>
    function formatarMoeda() {
        var elemento = document.getElementById('valor');
        var valor = elemento.value;

        valor = valor + '';
        valor = parseInt(valor.replace(/[\D]+/g, ''));
        valor = valor + '';
        valor = valor.replace(/([0-9]{2})$/g, ",$1");

        if (valor.length > 6) {
            valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
        }

        elemento.value = valor;
        if (valor == 'NaN') elemento.value = '';

    }
    var wasSubmitted = false;

    function checkBeforeSubmit() {
        if (!wasSubmitted) {
            wasSubmitted = true;
            return wasSubmitted;
        }
        return false;
    }
</script>

</html>