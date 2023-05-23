<?php
session_start();
require_once("../data/conexaoBD.php");




if ($_SESSION['logado'] == "") {

    $_SESSION['erro'] = "<br><br><div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'> Favor efetuar o login. Obrigado!</div>";
    echo "<script>window.location='../pages/login.php'</script>";
} else {

    $secretaria = $_SESSION['secretaria'];
}
?>

<script>
    setTimeout(function() {
        $('#timemsg').fadeOut('slow');
    }, 3000);
</script>


<div id="timemsg">
    <br>
    <?php

    if (isset($_SESSION['loginOff'])) {
        echo $_SESSION['loginOff'];
        unset($_SESSION['loginOff']);
    }
    ?>
</div>

<body>

    <div class="container" style="background:#ffff">
        <div class="row">
            <div class="col-md-12">
                <div class="form-title">
                    <div style="text-align: center;">
                        <h1>Emendas Parlamentares</h1>
                        <br>
                        <h3><?php echo  $secretaria; ?></h3>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div style="text-align: right">
                    <a class="btn btn-success " style="font-size: 15px" href="../pages/formEmendasParlamentares.php" role="button">Incluir Emenda</a>
                    <a class="btn btn-danger " style="font-size: 15px" href="../data/destruir.php" role="button">Sair</a>
                </div>
            </div><br>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-advance table-hover">
                        <hr>
                        <thead>
                            <tr>
                                <th> Deputado</th>
                                <th>Valor</th>
                                <th>Tipo</th>
                                <th>Objeto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!------------------Conteudo--------------WHERE secretaria = '02.03.00 - Secretaria Municipal de Finanças'--------->
                            <?php
                            $sql = "SELECT * FROM emendasimpositivas.emendas_parlamentares ";
                            foreach ($conexao->query($sql) as $row) {
                                $id = "../pages/infomanutencaoParlamentares.php?id=" . $id = $row['id_emenda_parl'];
                                // $iddetalhes = "exibe_docs.php?id=" .$id = $row['id_emendas'];
                                echo '<tr style="font-size: 15px;  " >';
                                echo '<td ">'                             . $row['deputado']     . '</td>';
                                echo '<td ">R$'                             . $row['valor_emenda']     . '</td>';
                                echo '<td ">'                             . $row['tipo_emenda']     . '</td>';
                                echo '<td ">'                            . $row['objeto_emenda'] . '</td>';
                                // echo '<td><a href="'       .$iddetalhes.   '"<button class="btn btn-default btn-xs"  title="Adicionar status Atual"><i class="fas fa-file-alt"></i></button></a></td>';	   
                                echo '<td><a href="'       . $id .   '"> <button class="btn btn-default btn-xs"  title="Abrir PDF" ><i class="fa fa-edit"></i></button></a></td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>