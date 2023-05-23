<?php

/**
 * @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar e Bootstrap 4,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 */
include 'banco.php';
$pdo = Banco::conectar();
// $query_events = "SELECT id, title, color, start, end FROM events";
$query_events = "SELECT * FROM bd_emprega_aruja.tb_reservasala where status = 1";
// $resultado_events = $conn->prepare($query_events);
// $resultado_events->execute();

$eventos = [];

foreach($pdo->query($query_events)as $row_events){
    $id = $row_events['id_reservasala'];
    $title = $row_events['nome_empresa'];
    $color = $row_events['color'];
    $responsavel = $row_events['responsavel'];
    $horain = $row_events['data_agenda'].' '.$row_events['horario_inicio'].':00';
    $horafi = $row_events['data_agenda'].' '.$row_events['horario_fim'].':00';
    $data = $row_events['data_agenda'];
    $sala = $row_events['sala'];
    // $start =   date("Y-m-d H:i:s", strtotime("2021-04-08 14:00:00"));
    // $end =  date("Y-m-d H:i:s", strtotime("2021-04-08 14:00:00"));



    $eventos[] = [
        'id' => $id,
        'title' => $title,
        'color' => $color,
        'start' => $horain,
        'end' =>  $horafi,
        'responsavel' => $responsavel,
        'data' => $data,
        'sala' => $sala,
    ];

    header('Content-type: application/json');
}

echo json_encode($eventos);
