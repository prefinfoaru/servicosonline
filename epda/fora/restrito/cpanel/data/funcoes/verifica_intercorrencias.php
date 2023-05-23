<?php

// select para intercorrências com algum tipo de consulta preliminar para liberação.


//1º query para quantidade de abonos solicitados no ano.

//busca a função. 

$select = $pdo->query("select count(*) as quant from ged_educ.bd_solicitacao where id_cod_inter = '21'");
$result = $select->fetch(PDO::FETCH_OBJ);
$result->quant;

if ( $result == 1) { $consulta_1_int =  "SELECT * FROM ged_educ.bd_solicitacao where id_cod_inter !='21'";
echo "<script>alert('teste msg abono')</script>";
}
// sai e consulta, trazendo todas as intercorrências 
else{ $consulta_1_int = 'SELECT * FROM ged_educ.bd_intercorrencia order by descricao' ;} 

//

?>


