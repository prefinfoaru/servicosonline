	<div class="container">
	<h2>Digite aqui o nome da escola que queira os dados</h2>

	<input class="form-control " id="myInput" type="text" placeholder="Buscar.">

	<br>
	<script>
	$(document).ready(function(){
	$("#myInput").on("keyup", function() {
	var value = $(this).val().toLowerCase();
	$("#myList tr").filter(function() {
	$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	});
	});
	});
	</script>          

	<br>
	<table class="table table-striped ; table-bordered"  style="margin-left: -50px" id="myList" >
	<thead id="menu">
	<tr style="font-size: 10px">
	<!--  <th style="text-align: center;">Id</th> -->
	<th style="text-align: left;">Escola</th>
	<th style="text-align: left;">Endereço</th>
	<th style="text-align: left;">Nº</th>
	<th style="text-align: left;">Bairro</th> 
	<th style="text-align: left;">CEP</th>
	<th style="text-align: left;">Tel</th>
	<th style="text-align: left;">email</th>
	<th style="text-align: left;">Gestor</th> 


	</tr>
	</thead>
	<tbody style="font-size: 10px;"> 
	<?php 

	include'conexao.php';

	$pdo = Banco::conectar();

	$sql = 'SELECT * FROM ged_educ.bd_escolas;';

	foreach($pdo->query($sql)as $row)
	{

	echo utf8_encode('<td style="text-align: left;">'									. $row['nome']						 . '</td>');	  
	echo utf8_encode('<td style="text-align: left;">'									. $row['endereco']					 . '</td>');	
	echo utf8_encode('<td style="text-align: left;">'									. $row['numero']					 . '</td>');	  
	echo utf8_encode('<td style="text-align: left;">'									. $row['bairro']					 . '</td>');
	echo utf8_encode('<td style="text-align: left;">'									. $row['cep']						 . '</td>');	  
	echo utf8_encode('<td style="text-align: left;">'									. $row['tel1']." - ".$row['tel2']	 . '</td>');	
	echo utf8_encode('<td style="text-align: left;">'									. $row['email']  					 . '</td>');	  
	echo utf8_encode('<td style="text-align: left;">'									. $row['gestor']					 . '</td>');	 				  

	echo '<tr>';	}
	?>
	</table>