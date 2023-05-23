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
                        <h1>Emendas Impositivas</h1>
                        <br>
                        <h3><?php echo  $secretaria; ?></h3>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div style="text-align: right">
                    <a class="btn btn-success " style="font-size: 15px" href="../pages/formEmendasImpositivas.php" role="button">Incluir Emenda</a>
                    <a class="btn btn-danger " style="font-size: 15px" href="../data/destruir.php" role="button">Sair</a>
                </div>
            </div><br>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-advance table-hover">
                        <hr>
                        <thead>
                            <tr>
                                <th>Número Emenda</th>
                                <th>Vereador</th>
                                <th>Valor</th>
                                <th>Objeto</th>
                                <th>Unidade Executora</th>
                                <th>Categoria Econômica</th>
                                <th>Valor Empenhado</th>
                                <th>Valor Liquidado</th>
                                <th>Status Atual</th>
                                <th>Atualizar</th>

                            </tr>
                        </thead>
                        <tbody>
                            <!------------------Conteudo--------------WHERE secretaria = '02.03.00 - Secretaria Municipal de Finanças'--------->
                            <?php
                            $sql = "SELECT * FROM emendasimpositivas.emendas ";
                            foreach ($conexao->query($sql) as $row) {
                                $id = "../pages/infomanutencao.php?id=" . $id = $row['id_emendas'];
                                $justify = $row['justificativa_inicial'];
                                // $iddetalhes = "exibe_docs.php?id=" .$id = $row['id_emendas'];
                                echo '<tr style="font-size: 15px;  " >';
                                echo '<td ">'                             . $row['numero_emenda']     . '</td>';
                                echo '<td ">'                             . $row['vereador']     . '</td>';
                                echo '<td ">R$'                             . $row['valor_emenda']     . '</td>';
                                echo '<td ">'                             . $row['justificativa_inicial']     . '</td>';
                                echo '<td ">'                            . $row['unid_executora'] . '</td>';
                                echo '<td ">'                             . $row['categoria_economica'] . '</td>';
                                echo '<td ">R$'                            . $row['valor_empenhado'] . '</td>';
                                echo '<td ">R$'                            . $row['valor_liquidado'] . '</td>';
                                echo '<td ">'             . $row['status_emendas']     . '</td>';
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