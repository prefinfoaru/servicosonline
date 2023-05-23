<?php 

//variavéis post ********************************************************************************************************/

$data_int 	= $_POST['date']	    ; //ok
$descricao  = $_POST['descricao']	; //ok
$matricula  = $_POST['matricula']	; //ok
$matriculafunc		= $_POST['matriculafunc']		; //ok
//$nomefunc   = $_POST['  funcao']      ; 
$funcao		= $_POST['funcao']      ; //ok   	
$email		= $_POST['email'] 		; //ok
$id_cad		= $_POST['id_cad']		; //ok
$he_est     = $_POST['hr_estimada'] ; //ok
$data_calc  = date('Y-m-d')         ; //ok
$dtAtualCa  = date ('d/m/Y')	    ; //ok
$nomesol    = $_POST['nomeSol']     ; //ok
$idfunc     = $_POST['id_funci'];
$statusSolc = 1;

///******************************************************************************************************************************************* ******/


//tratamento de variaveis ********************************************************************************************************/
$data_int_ano		= substr($data_int , -10,4)  ;
$data_int_mes1		= substr($data_int , 5,2)    ;
$data_int_dia		= substr($data_int , 8,2)    ;
$dataint		    = $data_int_dia."/".$data_int_mes1."/".$data_int_ano ; // data tartada /
$dataint2			= $data_int_ano."-".$data_int_mes1."-".$data_int_dia ; // data tartada -

///******************************************************************************************************************************************* ******/


//variaveis definida para geração do protocolo********************************************************************************************************/
$dataatual       = date("Y-m-d H:i:s"); 
$datamesano		 = date('Ymd');
$ano       	     = date('Y');
$dataseg		 = date('s');
$datamin		 = date('i');
$soma2           = $dataseg+$datamin+$id_cad+$data_int_mes1+$data_int_ano+$data_int_ano;
$soma            = $soma2 ;
$protocolo 		 = 'SHR'.$data_int_ano.$soma;
///******************************************************************************************************************************************* ******/
