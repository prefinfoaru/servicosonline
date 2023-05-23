<?php
//CALCULO VALOR DA HORA ESTRA CON CONDIÇÕES 

$qtdHorasSol  = "10";
$diaDomingo   = "0" ;
$he_est ;
//calculo para saber valores em horas
 $valorHora = round ($salario / 220, 2) ; //ok
 $valortratHora = str_replace("," ,".", $valorHora);
 $vcalculohr = str_replace("," ,".", $he_est);

    if ( $numeroSemana == $diaDomingo) {
//calcular 100% em cima do salario
   $Valorcemporcento =  $valortratHora * 2;
   $ValorfinalCalculado     = $Valorcemporcento * $vcalculohr ;  
    $calculo = '100%'  ;  
       
} 
    else {  
        
  $Valorcemporcento =  $valortratHora * 1.5;
  $ValorfinalCalculado     = $Valorcemporcento * $vcalculohr ; 
    $calculo = '50%'  ;  
    }


?>