<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", '1');

include("../data/conexao.php");
$pdo = Banco::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length'];
$columnIndex = $_POST['order'][0]['column'];
$columnName = 'id_emendas';
$columnSortOrder = 'asc';
$searchValue = $_POST['search']['value'];



$searchArray = array();

// $ano = date("y");
$ano = 2023;
$secretaria = $_SESSION['secretaria'];


//Pesquisa de filtro na tabela
$searchQuery = " ";
if ($searchValue != '') {
    $searchQuery = " AND (numero_emenda LIKE :numero_emenda) OR
     (vereador LIKE :vereador) OR
     (justificativa_inicial LIKE :justificativa_inicial) OR
     (secretaria LIKE :secretaria) OR
     (valor_emenda LIKE :valor) 
    ";
    $searchArray = array(
        'numero_emenda' => "%$searchValue%",
        'vereador' => "%$searchValue%",
        'justificativa_inicial' => "%$searchValue%",
        'secretaria' => "%$searchValue%",
        'valor' => "%$searchValue%",
    );
}

//Consulta para listar e ordernar a tabela
$consulta = $pdo->prepare("SELECT COUNT(*) AS allcount FROM emendasimpositivas.emendas WHERE ano = $ano AND  secretaria = '$secretaria'");
$consulta->execute();
$records = $consulta->fetch();
$totalRecords = $records['allcount'];

if ($rowperpage == -1){
    $rowperpage = $totalRecords;
}
//Consulta para filtrar a tabela
$consulta = $pdo->prepare("SELECT COUNT(*) AS allcount FROM emendasimpositivas.emendas WHERE ano = $ano AND  secretaria = '$secretaria' AND 1" . $searchQuery);
$consulta->execute($searchArray);
$records = $consulta->fetch();
$totalRecordsWithFilter = $records['allcount'];


//Consulta para preencher a tabela com os dados
$consulta = $pdo->prepare("SELECT  id_emendas,numero_emenda,vereador,valor_emenda,justificativa_inicial,unid_executora,categoria_economica,valor_empenhado,valor_liquidado,status_emendas FROM emendasimpositivas.emendas WHERE ano = $ano AND  secretaria = '$secretaria' AND 1 " . $searchQuery . "ORDER BY " . $columnName . " " . $columnSortOrder . " LIMIT :limit,:offset");


foreach ($searchArray as $key => $search) {
    $consulta->bindValue(':' . $key, $search, PDO::PARAM_STR);
}

$consulta->bindValue(':limit', (int)$row, PDO::PARAM_INT);
$consulta->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
$consulta->execute();
$empRecords = $consulta->fetchAll(PDO::FETCH_OBJ);

//Passagem de parâmetro para o vetor
$data = array();

foreach ($empRecords as $row) {

    $edicao =   "../pages/infomanutencao.php?id=" . $row->id_emendas;


    $data[] = array(
        "numero_emenda" => $row->numero_emenda,
        "vereador" => $row->vereador,
        "valor" => number_format(intval($row->valor_emenda), 2, ",", "."),
        "justificativa_inicial" => $row->justificativa_inicial,
        "unid_executora" => $row->unid_executora,
        "categoria_economica" => $row->categoria_economica,
        "valor_empenhado" => $row->valor_empenhado,
        "valor_liquidado" => $row->valor_liquidado,
        "status_emendas" => $row->status_emendas,
        "edicao" =>  '<a href="'.  $edicao.'"> <button class="btn btn-default btn-xs"  title="" ><i class="fa fa-edit"></i></button></a>',

    );
}











$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordsWithFilter,
    "aaData" => $data
);

echo json_encode($response);