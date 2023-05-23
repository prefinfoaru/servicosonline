<?php 

	$join_dadosEntrevista	=	"SELECT a.id_vaga, b.id_vaga, b.id_solicitante, a.titulo, b.data, b.hora, b.local, b.entrevistador, b.observacoes FROM bd_emprega_aruja.tb_cadastro_vaga as a INNER JOIN bd_emprega_aruja.tb_candidato_aprovado as b on a.id_vaga = b.id_vaga where b.id_vaga = '$id_vaga' and b.id_solicitante = '$id_solicitante' ";

?>
<div class="modal fade  modal-primary" id="myModal1<?php echo $id_solicitante.$id_vaga ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
            </div>
            <div class="modal-body text-center">
            <form method="post" action="./data/insert/candidato_reprovado.php">
				<h4>DADOS DA ENTREVISTA</h4><br>
				<div class="text-left">
					<?php
					foreach($pdo->query($join_dadosEntrevista )as $dadosEntrevista){
					echo '<u><h5>Vaga Para: &nbsp;'.$dadosEntrevista['titulo'].'</h5></u><hr>';	
					if($dadosEntrevista['local'] == ""){ echo '<li><strong><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Local: </strong>  Rua Adhemar de Barros,60, Centro-Arujá (Próximo ao Supermercado DIA) </li>';}else{
					echo '<li><strong><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Local: </strong> '.$dadosEntrevista['local'].'</li>';}	
					echo '<li><strong><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;Data: </strong>'.date('d/m/Y', strtotime($dadosEntrevista['data'])).'</li>';
					echo '<li><strong><i class="far fa-clock"></i>&nbsp;&nbsp;Hora: </strong>'.$dadosEntrevista['hora'].'</li>';
					echo '<li><strong><i class="fas fa-user-alt"></i>&nbsp;&nbsp;Entrevistador(a): </strong>'.$dadosEntrevista['entrevistador'].'</li><hr>';
						
					
					echo '<li><strong><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;Observações: <br></strong>'.$dadosEntrevista['observacoes'].'</li>';
					}
					?>
				</div>	
            </div>
				<div class="col-md-12 text-right">
                	<button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Fechar </button>
				</div><br>
        </div>
	</div>
</div>