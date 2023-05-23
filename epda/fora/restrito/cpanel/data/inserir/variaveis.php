<?php 

//variavéis post ********************************************************************************************************/

$data_int 	= $_POST['data_int']	;
$tipo	  	= $_POST['tipo']		;
$escola   	= $_POST['escola']		;
$descricao  = $_POST['descricao']	;
$matricula  = $_POST['matricula']	;
$nome		= $_POST['nome']		;
$funcao		= $_POST['funcao']   	;
$email		= $_POST['email'] 		;
$id_cad		= $_POST['id_cad']		;
$arquivo    = $_POST['anexo']       ;
$data_calc  = date('Y-m-d')         ;
$dtAtualCa  = date ('d/m/Y')	    ;

///******************************************************************************************************************************************* ******/


//tratamento de variaveis ********************************************************************************************************/
$data_int_ano		= substr($data_int , -10,4)  ;
$data_int_mes1		= substr($data_int , 5,2)  ;
$data_int_dia		= substr($data_int , 8,2);
$dataint			= $data_int_dia."/".$data_int_mes1."/".$data_int_ano; // data tartada /
$dataint2			= $data_int_ano."-".$data_int_mes1."-".$data_int_dia; // data tartada -

///******************************************************************************************************************************************* ******/


//variaveis definida para geração do protocolo********************************************************************************************************/
//$dataatual       = date("Y-m-d H:i:s"); 
$dataatual       = date("Y-m-d H:i:s"); 
$datamesano		 = date('Ymd');
$ano       	     = date('Y');
$dataseg		 = date('s');
$datamin		 = date('i');
$soma            = $dataseg+$datamin+$id_cad+$data_int_mes1+$data_int_ano+$data_int_ano;
$protocolo 		 = 'SE'.$datamesano.$soma;
///******************************************************************************************************************************************* ******/


// trata os caracteres de arqvuivos anexos. ********************************************************************************************************/

$arquivo_temp       = $_FILES['arquivo'] ['name'];
$tratamento_posicao = substr($arquivo_temp, 0, 100);
$tratamento_extesao = substr($arquivo_temp, -5);
$trata_arq			= end(explode(".", $tratamento_extesao));
$string =  $arquivo_temp;
$string = iconv( "UTF-8" , "ASCII//TRANSLIT//IGNORE" , $string );
$string = preg_replace( array( '/[ ]/' , '/[^A-Za-z0-9-.\-]/' ) , array( '' , '' ) , $string );

/***************************************************************************************************************************************************/ 




?>