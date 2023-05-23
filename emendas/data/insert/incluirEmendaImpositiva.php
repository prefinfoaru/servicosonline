<?php
include('..\conexao.php');
$pdo =  Banco::conectar();

if (isset($_POST['enviar'])) {
    $numero = $_POST['numero'];
    $vereador = $_POST['vereador'];
    $valor = $_POST['valor'];
    $secretaria = $_POST['secretaria'];
    $objeto = $_POST['objeto'];
    $unidadeo = $_POST['unidadeo'];
    $categoria = $_POST['categoria'];
    $valor = str_replace(',', '.', $valor);

    if (empty($numero) || empty($vereador) || empty($valor) || empty($objeto) || empty($unidadeo) || empty($categoria)) {
    } else {
        $insereEmenda = $pdo->prepare('INSERT INTO emendas (vereador,numero_emenda,valor_emenda,secretaria,unid_executora,categoria_economica,justificativa_inicial) 
        VALUES(:vereador,:numero,:valor,:secretaria,:unidade,:categoria,:justificativa)');
        $insereEmenda->bindValue(":vereador", $vereador);
        $insereEmenda->bindValue(":numero", $numero);
        $insereEmenda->bindValue(":valor", $valor);
        $insereEmenda->bindValue(":secretaria", $secretaria);
        $insereEmenda->bindValue(":unidade", $unidadeo);
        $insereEmenda->bindValue(":categoria", $categoria);
        $insereEmenda->bindValue(":justificativa", $objeto);
        if ($insereEmenda->execute()) {
            header("Location: ../../pages/formEmendas.php?res=1");
        } else {
            header("Location: ../../pages/formEmendas.php?res=2");
        }
    }
}
