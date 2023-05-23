<?php

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

$ano = $_POST['ano'];


//Pesquisa de filtro na tabela
$searchQuery = " ";
if ($searchValue != '') {
    $searchQuery = " AND ((numero_emenda LIKE :numero_emenda) OR
     (vereador LIKE :vereador) OR
     (justificativa_inicial LIKE :justificativa_inicial) OR
     (secretaria LIKE :secretaria) OR
     (valor_emenda LIKE :valor))";
    $searchArray = array(
        'numero_emenda' => "%$searchValue%",
        'vereador' => "%$searchValue%",
        'justificativa_inicial' => "%$searchValue%",
        'secretaria' => "%$searchValue%",
        'valor' => "%$searchValue%",
    );
}

//Consulta para listar e ordernar a tabela
$consulta = $pdo->prepare("SELECT COUNT(*) AS allcount FROM emendasimpositivas.emendas WHERE ano = $ano");
$consulta->execute();
$records = $consulta->fetch();
$totalRecords = $records['allcount'];

if ($rowperpage == -1){
    $rowperpage = $totalRecords;
}
//Consulta para filtrar a tabela
$consulta = $pdo->prepare("SELECT COUNT(*) AS allcount FROM emendasimpositivas.emendas WHERE ano = $ano AND 1" . $searchQuery);
$consulta->execute($searchArray);
$records = $consulta->fetch();
$totalRecordsWithFilter = $records['allcount'];


//Consulta para preencher a tabela com os dados
$consulta = $pdo->prepare("SELECT  * FROM emendasimpositivas.emendas WHERE 1 " . $searchQuery . " AND ano = $ano ORDER BY " . $columnName . " " . $columnSortOrder . " LIMIT :limit,:offset");


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

    $arquivo =   $row->arquivos == null ? 'Sem Anexo'   :  '<a href="'.$row->arquivos.'" target="_blank"><button class="btn btn-default btn-sm btn-center" style="color: #CB4335" title="Comprovantes"><i class="fa fa-file-pdf-o"></i></button></a>';


    $data[] = array(
        "numero_emenda" => $row->numero_emenda,
        "vereador" => $row->vereador,
        "valor" => number_format(intval($row->valor_emenda), 2, ",", "."),
        "justificativa_inicial" => $row->justificativa_inicial,
        "secretaria" => $row->secretaria,
        "categoria_economica" => $row->categoria_economica,
        "valor_empenhado" => $row->valor_empenhado,
        "valor_liquidado" => $row->valor_liquidado,
        "status_emendas" => $row->status_emendas,
        "arquivo" => $arquivo,

    );
}

$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordsWithFilter,
    "aaData" => $data
);

echo json_encode($response);