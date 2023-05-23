<div class="container">

	<!-- Modal - 1 - movimentação-->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h6 align="center">ALTERAR SECRETÁRIA.</h6>





					<button type="button" class="close" data-dismiss="modal">&times;</button>

				</div>
				<div class="modal-body">
					<label for="sel2"><b>Alterar para :</b></label>
					<form action="controll/movimentos.php" method="post">
						<select class="form-control" name='mov_sec'>
							<option>Selecione a Secretária</option>
							<?php
						
		try {

			$Conexao    = Conexao::getConnection();
			$query      = $Conexao->query("SELECT distinct(Secretaria)
      ,[Secretaria]
      
  FROM [ARUJADB].[dbo].[vwHoraExtra] order by 'Secretaria' ;");
			$produtos   = $query->fetchAll();
		} catch (Exception $e) {

			echo $e->getMessage();
			exit;
		} ?>


							<?php

						foreach ($produtos as $user) : ?>

							<option value="<?php echo $user['Secretaria'] ?>"><?php echo $user['Secretaria']; ?></option>

						<?php endforeach; ?>



						</select>
						<label for="sel2"><b>Motivo da Alteração:</b></label>
						<textarea class="form-control" rows="5" name="mov_obs" required></textarea>

						<input type="hidden" value="<?php echo $row['id_solicitacao'] ?>" name="idsolicitacao">
						<input type="hidden" value="<?php echo $row['tb_secretaria_funcionario'] ?>" name="secretaria">
						<input type="hidden" value="<?php echo $_SESSION[id_cad_user] ?>" name="usuario">
						<input type="hidden" value="<?php echo $row['tb_numprotocolo'] ?>" name="protocolo">




				</div>
				<div class="modal-footer">
					<button type="submit" name="salvar" value="salvar" class="btn btn-success">Salvar</button></form>
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>

		</div>
	</div>

	<!-- Modal - 2 - Indeferido-->
	<div class="modal fade" id="myModall" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h6 align="center">Deferir Movimentação</h6>
					<button type="button" class="close" data-dismiss="modal">&times;</button>

				</div>
				<div class="modal-body">
					<p>Sr.(a) <?php echo $_SESSION[nome] ?> você está deferindo uma solicitação de hora extra, por favor, justifique a solicitação das horas.</p>
					<form action="controll/movimentos.php" method="post">
						<textarea class="form-control" rows="5" name="mov_obs" id="obsmovum"></textarea>
						<input type="hidden" value="<?php echo $row['id_solicitacao'] ?>" name="idsolicitacao">
						<input type="hidden" value="<?php echo $row['tb_secretaria_funcionario'] ?>" name="secretaria">
						<input type="hidden" value="<?php echo $_SESSION[id_cad_user] ?>" name="usuario">
						<input type="hidden" value="<?php echo $row['tb_numprotocolo'] ?>" name="protocolo">
				</div>
				<div class="modal-footer">
					<button type="submit" name="deferir" value="deferir" class="btn btn-success">Salvar</button></form>
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</form>
				</div>
			</div>

		</div>
	</div>

	<div class="modal fade" id="myModalll" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h6 align="center">Indeferir Movimentação</h6>
					<button type="button" class="close" data-dismiss="modal">&times;</button>

				</div>
				<div class="modal-body">
					<p>Sr.(a) <?php echo $_SESSION[nome] ?> você está indeferindo uma Solicitação, por favor detalhar abaixo, o motivo da reprova.</p>
					<form action="controll/movimentos.php" method="post">
						<textarea class="form-control" rows="5" name="mov_obs" id="obsmovum"></textarea>
						<input type="hidden" value="<?php echo $row['id_solicitacao'] ?>" name="idsolicitacao">
						<input type="hidden" value="<?php echo $row['tb_secretaria_funcionario'] ?>" name="secretaria">
						<input type="hidden" value="<?php echo $_SESSION[id_cad_user] ?>" name="usuario">
						<input type="hidden" value="<?php echo $row['tb_numprotocolo'] ?>" name="protocolo">
				</div>
				<div class="modal-footer">
					<button type="submit" name="indeferir" value="indeferir" class="btn btn-success">Salvar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</form>
				</div>
			</div>

		</div>
	</div>