<?php include'conexao.php';

$pdo = Banco::conectar();

$sql = 'SELECT * FROM ged_educ.bd_contato;';

foreach($pdo->query($sql)as $row)
                      {
							
$secretariaresp = $row['responsavel'];	
							

				 }
