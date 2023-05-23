<?php       

include ("../conexao.php");



$sala = $_POST['sala'];
$responsavel = utf8_decode($_POST['responsavel']);
$horariofim = $_POST['horariofim'];
$horarioinicio = $_POST['horarioinicio'];
$data = $_POST['data'];
$nomeempresa = utf8_decode($_POST['nomeempresa']);
$idvaga = $_POST['idvaga'];
$idempresa = $_POST['idempresa'];



if((empty($sala))||(empty($responsavel))||(empty($horariofim))||(empty($horarioinicio))||(empty($data))||(empty($nomeempresa))||(empty($idvaga))||(empty($idempresa))){

	echo 	"<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminprefeitura/?p=listavagareserva&res=0&id=$idempresa'</script>"; 
			exit();

}else{



	$cadastra = "INSERT INTO `bd_emprega_aruja`.`tb_reservasala` (`data_agenda`, `horario_inicio`, `horario_fim`, `id_vaga`, `id_empresa`, `nome_empresa`, `responsavel`, `sala`, `status`) VALUES ('$data', '$horarioinicio', '$horariofim', '$idvaga', '$idempresa', '$nomeempresa', '$responsavel', '$sala', 1);";
		
		$resultado_cad = mysqli_query($conn, $cadastra);

		if(mysqli_insert_id($conn)){
 
			echo 	"<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminprefeitura/?p=listavagareserva&res=1&id=$idempresa'</script>"; 
			 exit();
			
		}
		else{
		
			echo 	"<script>window.location.href ='https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminprefeitura/?p=listavagareserva&res=0&id=$idempresa'</script>"; 
			exit();
		}
	




}


	

		






?>