<?php

session_start();

include_once './conexao.php';


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


$motivo = utf8_decode($_POST['motivo']);


if (!empty($id)) {
    $query_event = "UPDATE `bd_emprega_aruja`.`tb_reservasala` SET `status`='3', `motivo`='$motivo' WHERE `id_reservasala`='$id';";
    $delete_event = $conn->prepare($query_event);
    

    
    if($delete_event->execute()){

        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">A reserva foi cancelada com sucesso!</div>';
        header("Location: ../?p=entrevista");

    }else{

        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro: Não foi possível cancelar a reserva!</div>';
        header("Location: ../?p=entrevista");
        
    }


} else {
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro: Não foi possível cancelar a reserva!</div>';
    header("Location: ../?p=entrevista");
}
?>