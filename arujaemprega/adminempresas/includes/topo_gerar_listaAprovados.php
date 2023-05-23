<?php 

$id_vaga		=	$_GET['id'];

include "./data/banco.php";
$pdo = Banco::conectar();


$select_vaga			=	"SELECT * FROM bd_emprega_aruja.tb_cadastro_vaga where id_vaga = '$id_vaga' ";

//************** FOR PARA BUSCAR O ID DA EMPRESA QUE CADASTROU A VAGA PARA TRAZER O LOGO DA MESMA. ********************//

	foreach($pdo->query($select_vaga)as $cand_vaga){
		
		$id_empresa		= 		$cand_vaga ['id_empresa']		;
			
	}
//*************************** QUERYS DO PDF ******************************//

//$dtnasc 				= date('d-m-Y',strtotime($dtnascimento));


$select_empresa		=	"SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where id_cadastroempresa = '$id_empresa' ";

$select_candidatura	=	"SELECT a.id_candidatura, a.id_solicitante, b.id_solicitante, c.id_solicitante, b.nome, b.cpf, a.id_vaga, c.id_vaga, a.id_empresa, c.data, c.hora, c.local, 
c.entrevistador, a.status_candidatura FROM bd_emprega_aruja.tb_candidatura_vaga as a INNER JOIN bd_emprega_aruja.tb_cadastro_solicitante as b 
INNER JOIN bd_emprega_aruja.tb_candidato_aprovado as c on a.id_solicitante = b.id_solicitante 
and a.id_solicitante = c.id_solicitante and a.id_vaga = c.id_vaga where c.id_vaga = '$id_vaga' and 
status_candidatura = '1' and c.data >= '$data_lista1' and c.data <= '$data_lista2'
order by c.data, c.hora ASC" ;


//*************************** FOR PARA BUSCAR OS DADOS DA EMPRESA QUE CADASTROU A VAGA ******************************//

foreach($pdo->query($select_empresa)as $cad_empresa){
		
		$nome_fantasia				= 		$cad_empresa ['nome_fantasia']				;
		$logotipo					= 		$cad_empresa ['logotipo']					;
		
}



//******************* TABLE DE DADOS DOS CANDIDATOS *******************************************************************//

foreach($pdo->query($select_candidatura)as $dados_candidatura){
	
		$nome			= 		ucfirst(strtolower($dados_candidatura ['nome']))	;
		$cpf 			= 		$dados_candidatura ['cpf']		;
		$data 			= 		$dados_candidatura ['data']		;
		$hora 			= 		$dados_candidatura ['hora']		;
	
		$table .= '<tr>';
		$table .= '<td style="text-align:center">'.$nome							.'</td>';
		$table .= '<td style="text-align:center">'.$cpf								.'</td>';
		$table .= '<td style="text-align:center">'.date('d-m-Y',strtotime($data))	.'</td>';
		$table .= '<td style="text-align:center">'.$hora							.'</td>';
		$table .= '</tr>';
		}


$img = $logotipo;
$imgtrat = explode('./..', $img, 2);
$tratado = './../adminempresas'.$imgtrat[1];


?>