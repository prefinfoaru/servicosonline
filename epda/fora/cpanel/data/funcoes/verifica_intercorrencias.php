<?php

// select para intercorrências com algum tipo de consulta preliminar para liberação.


//1º query para quantidade de abonos solicitados no ano.

//busca a função. 

$select = $pdo->query("select count(*) as quant from bd_sol_hr.bd_solicitacao where id_func = '21'");
$result = $select->fetch(PDO::FETCH_OBJ);
echo $result->quant;

if ( $result == 1) { $consulta_1_int =  "SELECT * FROM bd_sol_hr.bd_solicitacao where id_func !='21'";
echo "<script>alert('teste msg abono')</script>";
}
// sai e consulta, trazendo todas as intercorrências 
else{ $consulta_1_int = 'SELECT * FROM bd_sol_hr.bd_intercorrencia order by nome_func' ;} 

//

?>


