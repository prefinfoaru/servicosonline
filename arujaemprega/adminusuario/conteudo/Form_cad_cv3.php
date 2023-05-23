<?php include "../includes/topo_cad_cv3.php"; ?>

<link rel="stylesheet"  type="text/css" href="../assets/css/select2.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="../assets/js/select2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/pt-BR.js"></script>

<script src="https://cdn.tiny.cloud/1/d7mf8inz10za7x62gz4c3g9zny7wl7gk3hnswc2nj5r77wun/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


<div class="container">
	


 <!--CABEÇARIO -->   
<div class="panel panel-default">
  <h2><i class='fas fa-address-book' style='font-size:36px'></i>Dados Curricular </h2><i style="color: #E77577"><h11>* Campo Obrigatório</h11></i>
<h5 style='text-align: right; color: #3498db; font-size: 16px;'> 3/5 &nbsp;&nbsp;&nbsp; </h5>
   <hr>
<div class="col-md-12">	
  <h3>Dados da experiência profissional </h3><br><br>
</div>
	
<form class="form-horizontal" method="post" action="../data/insert/inset_dados_profissionais.php">
<!-- GRUPO **************************************************************************************************************************************************************************-->
<div class="form-group" align="center">
  <label class="col-md-2 control-label" for="instituicao">&nbsp;&nbsp;Nome da Empresa</label>  
  <div class="col-md-9">
  <input id="empresa" name="empresa" placeholder="Informe o nome da empresa" class="form-control input-md" type="text" style="width: 98%" required="">
  </div> 
</div>
	
<div class="form-group" align="center">
  <label class="col-md-2 control-label" for="instituicao">&nbsp;&nbsp;Indique seu cargo</label>  
  <div class="col-md-3">
  <input id="cargo" name="cargo" placeholder="Informe seu cargo" class="form-control input-md" type="text" style="width: 98%" required="">
  </div> 
  
  <label class="col-md-3 control-label" for="instituicao">&nbsp;&nbsp;Salário</label> 
  <div class="col-md-3">
  <input id="valor" onkeyup="k(this);" name="salario" placeholder="Informe o salário R$" class="form-control input-md" type="text" style="width: 98%" required="">
  </div> 
</div>
	


<div class="form-group" align="center">
  <label class="col-md-2 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;Nível Hierárquico</label>  
  <div class="col-md-2">
	<select name="herarquia" id="herarquia" class="form-control" style="width: 98%" required="">
			
		<?php 
			$sql_hierarquico = "SELECT * FROM bd_emprega_aruja.tb_pre_nivel_profissao ";
			
			foreach($pdo->query($sql_hierarquico) as $hierarquico){
			echo    '<option value="'   .$hierarquico['tb_nivel_hierarquico'].'">'    .$hierarquico['tb_nivel_hierarquico'].'</option>';
			}
		?>
												
	</select>
  </div>
  
  <label class="col-md-1 control-label" for="instituicao">&nbsp;&nbsp;Área</label>  
  <div class="col-md-6">
  		<select class="selectpicker form-control" name="profissao" data-live-search="true">
            <option selected>Selecione a profissão</option>
            <?php
                
                $buscaprof  =  $pdo->query("SELECT * FROM bd_emprega_aruja.tb_pre_profissao");
                $dataprof = $buscaprof->fetchAll(); 
                foreach ($dataprof as $value) {?>
                     <option value="<?php echo $value['profissao'];?>"><?php echo $value['profissao'];?>
                 <?php
            	 }
            ?>
        </select>
  </div>
	
  
	
	<br><br><br>
	
<div class="container col-md-12" align="left">
 <div class="form-group" align="center">
	
  <label class="col-md-2 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;Início</label>  
  <div class="col-md-2">
  	<input id="inicio_mes" name="inicio_mes" class="form-control input-md" type="number" min="1" max="12" style="width: 98%" placeholder="mm" required=""><br>
  </div>
	 
  <div class="col-md-2">
  	<input id="inicio_ano" name="inicio_ano" class="form-control input-md" type="number" min="1" max="<?php echo date('Y') ?>" style="width: 98%" placeholder="aaaa" required=""><br>
  </div>	 
	 
  <label class="col-md-1 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp</label>  
  <div class="col-md-2">
  	<input id="conclusao_mes" name="conclusao_mes" class="form-control input-md" type="number" min="1" max="12" style="width: 98%" placeholder="mm" required=""><br>
  </div>
	 
  <div class="col-md-2">
  	<input id="conclusao_ano" name="conclusao_ano" class="form-control input-md" type="number" min="1" max="<?php echo date('Y') ?>" style="width: 98%" placeholder="aaaa" required=""><br>
  </div>
	 
  <div class="form-group col-md-2" align="center"></div>	 
  <div class="form-group col-md-8" align="center"></div>	 
	
  <div class="form-group col-md-2" align="center">
   <br>
  	<input type="checkbox" id="atual" name="atual" onClick="optionProfissional()" value="Sim">
 	<span>&nbsp;&nbsp; Atualidade</span>	
  </div>

  
  
</div>
	
<div class="form-group" align="center">
  <label class="col-md-2 control-label" for="atividade" style="text-align: right">&nbsp;&nbsp;Atividades</label>  
  <div class="col-md-9">
  	<textarea class="form-control" rows="5" name="atividade" id="basic-example"  id="comment" style="width: 98%" placeholder="Descreva as atividades que você realizava nesta empresa..." require></textarea>
  </div>
</div>

<div class="form-group" align="center">	
  <label class="col-md-2 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;País</label>  
  <div class="col-md-2">
	<select name="pais" id="pais" onChange="optionPais()" class="form-control" style="width: 98%" required="">
		<option value="Brasil">Brasil</option>	
		<?php 
			$sql_paises = "SELECT * FROM bd_emprega_aruja.tb_pre_paises ";
			foreach($pdo->query($sql_paises) as $paises){
			echo    '<option value="'   .$paises['pais'].'">'    .$paises['pais']   .'</option>';
			}
		?>
												
	</select>
  </div>

	
  <label class="col-md-1 control-label" for="Nome" style="text-align: center">Estados</label>  
  <div class="col-md-2" id="estado_div">
	<select name="estado" id="estado" onChange="optionCidade()"  class="form-control" style="width: 98%" required="">
		<option>Clique Aqui</option>
		<?php 
			$sql_estados = "SELECT * FROM bd_emprega_aruja.tb_pre_estados; ";
			foreach($pdo->query($sql_estados) as $estados){
			echo    '<option value="'   .$estados['estado'].'">'    .$estados['estado']   .'</option>';
			}
		?>

	</select>
  </div>	
	
  <label class="col-md-1 control-label" for="Nome" style="text-align: center">Cidade</label> 	
  <div class="col-md-3" style="display: none;" id="Acre_div">
	<select name="cidade" class="form-control" id="Acre" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'AC' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
	 	
  <div class="col-md-3" style="display: none;" id="AL_div">
	<select name="cidade" class="form-control" id="AL" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'AL' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
	 	
  <div class="col-md-3" style="display: none;" id="AP_div">
	<select name="cidade" class="form-control" id="AP" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'AP' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
	 	
  <div class="col-md-3" style="display: none;" id="AM_div">
	<select name="cidade" class="form-control" id="AM" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'AM' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="BA_div">
	<select name="cidade" class="form-control" id="BA" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'BA' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="CE_div">
	<select name="cidade" class="form-control" id="CE" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'CE' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="ES_div">
	<select name="cidade" class="form-control" id="ES" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'ES' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="GO_div">
	<select name="cidade" class="form-control" id="GO" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'GO' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="MA_div">
	<select name="cidade" class="form-control" id="MA" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'MA' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
	 	
  <div class="col-md-3" style="display: none;" id="MT_div">
	<select name="cidade" class="form-control" id="MT" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'MT' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
	 	
  <div class="col-md-3" style="display: none;" id="MS_div">
	<select name="cidade" class="form-control" id="MS" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'MS' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
	 	
  <div class="col-md-3" style="display: none;" id="MG_div">
	<select name="cidade" class="form-control" id="MG" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'MG' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
	 	
  <div class="col-md-3" style="display: none;" id="PA_div">
	<select name="cidade" class="form-control" id="PA" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'PA' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
	 	
  <div class="col-md-3" style="display: none;" id="PB_div">
	<select name="cidade" class="form-control" id="PB" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'PB' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
	 	
  <div class="col-md-3" style="display: none;" id="PR_div">
	<select name="cidade" class="form-control" id="PR" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'PR' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="PE_div">
	<select name="cidade" class="form-control" id="PE" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'PE' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="PI_div">
	<select name="cidade" class="form-control" id="PI" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'PI' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
	 	
  <div class="col-md-3" style="display: none;" id="RJ_div">
	<select name="cidade" class="form-control" id="RJ" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'RJ' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="RN_div">
	<select name="cidade" class="form-control" id="RN" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'RN' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="RS_div">
	<select name="cidade" class="form-control" id="RS" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'RS' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="RO_div">
	<select name="cidade" class="form-control" id="RO" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'RO' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="RR_div">
	<select name="cidade" class="form-control" id="RR" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'RR' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="SC_div">
	<select name="cidade" class="form-control" id="SC" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'SC' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="SP_div">
	<select name="cidade" class="form-control" id="SP" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'SP' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="SE_div">
	<select name="cidade" class="form-control" id="SE" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'SE' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="TO_div">
	<select name="cidade" class="form-control" id="TO" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'TO' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>	
		
  <div class="col-md-3" style="display: none;" id="DF_div">
	<select name="cidade" class="form-control" id="DF" style="width: 98%" required="">

		<?php 
			$sql_cidade = "SELECT * FROM bd_emprega_aruja.tb_pre_cidades where uf = 'DF' ";
			foreach($pdo->query($sql_cidade) as $cidade){
			echo    '<option value="'   .$cidade['cidade'].'">'    .$cidade['cidade'].'</option>';
			}
		?>

	</select>
  </div>
</div>
<br>
<div class="col-md-12">
  <label class="col-md-4 control-label" for="instituicao" style="text-align: left">Experiência comprovada em carteira?</label>		
  	<label class="checkbox-inline control-label">
		<input type="radio" value="Sim" name="exp_comprovada" required>Sim
	</label> 
	<label class="checkbox-inline control-label">
		<input type="radio" value="Não" name="exp_comprovada" required>Não
	</label> 
</div>

  <br>
<div class="form-group" align="center">
	<button id="btnSave" name="btnSave" class="btn btn-default" type="Submit">Cadastrar</button>
</div>	
<input id="id_soli" name="id_soli" class="hidden" value="<?php echo $id_soli ?>" type="text">	
</form>	

<div align="center">	
<div class="col-md-12" >
	<table class="table table-hover" style="text-align: center;">
		<tr>
		<th style="text-align: center">Empresa:</th>
		<th style="text-align: center">Cargo:</th>
		<th style="text-align: center">Início:</th>
		<th style="text-align: center">Conclusão:</th>
		</tr>
		
	<?php 
	$select_profissionais = "SELECT * FROM bd_emprega_aruja.tb_dados_profissionais where id_solicitante = '$id_soli' ";
		
	foreach ($pdo->query($select_profissionais) as $profissionais){
		echo '<tr style="font-size: 14px;">';
		echo '<td>'	. $profissionais['nome_empresa']											. '</td>';	
		echo '<td>'	. $profissionais['cargo']													. '</td>';
		echo '<td>'	. $profissionais['inicio_mes']	." - "	. $profissionais['inicio_ano']		. '</td>';
		echo '<td>'	. $profissionais['conclusao_mes']." - "	. $profissionais['conclusao_ano']	. '</td>';
		
	};	
		
	?>

	</table>
	<hr>	
</div>	
</div>	
<script>

function k(i) {
	var v = i.value.replace(/\D/g,'');
	v = (v/100).toFixed(2) + '';
	v = v.replace(".", ",");
	v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
	v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
	i.value = v;
}

	 $('.selectpicker').select2();
	 


	 tinymce.init({
  selector: 'textarea#basic-example',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});


</script>


<?php include "../includes/condicao_ex_profissional.php"; ?>
<?php include "../includes/condicao_pais_estado_cidade.php"; ?>
<?php include "../includes/condicao_cidade.php"; ?>
<?php include "../includes/condicao_especializacao.php"; ?>

	
<!-- Button (Double) -->
<div class="form-group" align="left">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
   <a href="../data/update/baixa_caddadosprofissionais.php?soli=<?php echo $id_soli ?>"><button type="button" class="btn btn-success"> Avançar </button></a>
   <!-- <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button> -->
  </div>
</div>
</div>
</div>	
</div>
