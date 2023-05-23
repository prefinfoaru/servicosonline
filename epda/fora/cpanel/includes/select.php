
<?php
include 'conexao.php';
//busca a função. 
$pdo = Banco::conectar();
$sql =  'SELECT * FROM ged_educ.bd_escolas;';
$sql2 = 'SELECT * FROM ged_educ.bd_carga_horaria';
$sql3 = 'SELECT *FROM ged_educ.bd_solicitacao where matricula = "123" order by data_solicitacao;';

?>
        				      