<?php
header("Content-type: text/html; charset=utf-8");
session_start();
if (!isset($_SESSION['secretaria'])  && !$_SESSION['secretaria'] == '02.11.00 - Secretaria Municipal de Governo') {
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
    <link href="../assets/css/conteudo/menu.css" rel="stylesheet">
</head>
<style>

</style>
</style>

<body>
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 style="text-align: center">Emendas:</h3>
        </div><br><br>
        <div class="panel-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="our-services-wrapper ">
                        <div class="services-inner">
                            <div class="our-services-text ">
                                <h5>EMENDAS PARLAMENTARES</h5>
                                <img src="../images/documents.png"><br><br>
                                <a href="./formEmendasParlamentares.php" target="_blank"> <button type="button" class="btn btn-default">Acessar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="our-services-wrapper ">
                        <div class="services-inner">
                            <div class="our-services-text ">
                                <h5>EMENDAS IMPOSITIVAS</h5>
                                <img src="../images/documents.png"><br><br>
                                <a href="./formEmendasImpositivas.php" target="_blank"><button type="button" class="btn btn-default">Acessar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br>
    </div><br><br>
</body>

</html>