<?php
session_start();
include('..\conexao.php');
$pdo =  Banco::conectar();

if (isset($_POST['enviar'])) {
    $deputado = $_POST['deputado'];
    $valor = $_POST['valor'];
    $tipo = $_POST['emenda'];
    $objeto = $_POST['objeto'];
    $data = date("Y-m-d H:i:s");
    $usuario = $_SESSION['secretaria'];



    if (empty($deputado) || empty($valor) || empty($objeto) || empty($tipo)) {
    } else {
        $insereEmenda = $pdo->prepare('INSERT INTO emendas_parlamentares (deputado,valor_emenda,tipo_emenda,objeto_emenda,ultima_atualizacao,usuario_atualizacao) 
        VALUES(:deputado,:valor,:tipo,:objeto,:atualizacao,:usuario)');
        $insereEmenda->bindValue(":deputado", $deputado);
        $insereEmenda->bindValue(":valor", $valor);
        $insereEmenda->bindValue(":tipo", $tipo);
        $insereEmenda->bindValue(":objeto", $objeto);
        $insereEmenda->bindValue(":atualizacao", $data);
        $insereEmenda->bindValue(":usuario", $usuario);
        if ($insereEmenda->execute()) {
            header("Location: ../../pages/formEmendasParlamentares.php?res=1");
        } else {
            header("Location: ../../pages/formEmendasParlamentares.php?res=2");
        }
    }
}
