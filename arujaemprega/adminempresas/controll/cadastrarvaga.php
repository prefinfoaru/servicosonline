

<?php 

include "./data/conexao.php";
$idempresa = $_SESSION['iduser'];
@$sigla =  $_SESSION['sigla']; 
?>


<link rel="stylesheet"  type="text/css" href="assets/css/select2.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="assets/js/select2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/pt-BR.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.tiny.cloud/1/d7mf8inz10za7x62gz4c3g9zny7wl7gk3hnswc2nj5r77wun/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="main-panel">
   <!-- Navbar -->
	
  <nav class="navbar navbar-expand-lg " color-on-scroll="100">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">Menu Cadastrar Vagas</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                   <?php echo $sigla == "empresa"? "":$sigla; ?>
                </div>
            </nav>
            <!-- End Navbar -->
            <!-- Navbar -->
        <link rel="stylesheet"  type="text/css" href="assets/css/cadastrarvaga.css" />
        <script src="./assets/js/jsjs.js"></script>
        <script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>    
	
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">


                        <?php     
                            $Atualiza = "SELECT * FROM bd_emprega_aruja.tb_cadastro_empresa where id_cadastroempresa = '$idempresa' and status='0';";
                            $resultado_atualiza = mysqli_query($conn,$Atualiza);
                            $numero = mysqli_num_rows($resultado_atualiza);
    
                            if($numero == '1'){ ?>
                            <div class="row">
                                        
                                <div class="col-md-12">
                                   <h1>Por Favor, aguarde enquanto seu cadastro é validado!</h1>
                                   <h2>Caso tenha alguma dúvida entrar em contato: (11)4653-4057 / (11)4653-1230 </h2>
                                </div>
                            </div>
                                
                              
                                <?php   }else{ ?>
 				         
							<form class="vagas" name="cadastrarvagas" action="./data/insert/cadastrarvaga.php" method="POST">
                            <div class="header">
                                <h4 class="title">Cadastrar Vaga id: <label><input type="text" style="background-color:#DCA0A1" class="form-control" disabled placeholder="<?php echo $protocoloentrada = date("Ymd") . mt_rand(); ?>" value="<?php echo $protocoloentrada = date("Ymd") . mt_rand(); ?>"></label></h4>
                            </div>
                            <div class="content">
                                    <?php
                                    if($idempresa == "70"){?>


                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="anonimo">&nbsp;Deixar vaga anônima</label>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    
                                    
                                    <?php
                                    }
                                    ?>
									<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Título da Vaga</label>
                                                <input name="titulo" type="text" class="form-control"  placeholder="Título da Vaga" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Profissão</label>
                       
                                                <select class="selectpicker form-control" name="profissao" data-live-search="true" required>
                                                    <option value="" selected>Selecione a profissão</option>
                                                    <?php
                                                        include('./data/banco.php');
                                                        $pdo=Banco::conectar();
                                                        $buscaprof  =  $pdo->query("SELECT * FROM bd_emprega_aruja.tb_pre_profissao");
                                                        $dataprof = $buscaprof->fetchAll(); 
                                                        foreach ($dataprof as $value) { ?>
                                                           <option value="<?php echo $value['profissao'];?>"><?php echo $value['profissao'];?>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cargo</label>
                                                <select class="form-control" name="cargo" required>
                                                    <option value="" selected>Selecione o Cargo</option>
                                                    <?php
                                                         $buscanivel  =  $pdo->query("SELECT * FROM bd_emprega_aruja.tb_pre_nivel_profissao order by tb_nivel_hierarquico asc ");
                                                         $datanivel= $buscanivel->fetchAll(); 
                                                         foreach ($datanivel as $value) {?>
                                                            <option value="<?php echo $value['tb_nivel_hierarquico'];?>"><?php echo $value['tb_nivel_hierarquico'];?>
                                                     <?php
                                                         }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Descrição</label>
                                                <textarea name="descricao" rows="10" class="form-control" id="basic-example" placeholder="Preencha a Descrição da Vaga" ></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
												<label class="control-label" for="instituicao">Salário </label><br>
												<label><input type="radio" id="combinar" value="Sim" name="combinar" onClick="optionSalario()">&nbsp;A Combinar</label>&nbsp;
												<label><input type="radio" name="combinar" value="Nao" id="salario_check" onClick="optionSalario()">&nbsp;Informar Salário</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2" id="div_salario" style="display: none;">
                                            <div class="form-group">
                                                <label class="control-label" for="instituicao">R$ </label><br>
                                               <input  name="salario" id="salario" onkeyup="valor(this);" type="text" class="form-control" placeholder="Digite o Salário" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Periodo</label>
                                                <select class="form-control" name="periodo" required>
                                                    <option value="" selected>Selecione o Periodo</option>
                                                    <?php
                                                         $buscaper  =  $pdo->query("SELECT * FROM bd_emprega_aruja.tb_pre_jornada order by jornada asc");
                                                         $dataper= $buscaper->fetchAll(); 
                                                         foreach ($dataper as $value) {?>
                                                            <option value="<?php echo $value['jornada'];?>"><?php echo $value['jornada'];?>
                                                     <?php
                                                         }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Escolaridade</label>
                                                <select class="form-control" name="escolaridade" required>
                                                    <option  value="" selected>Selecione a escolaridade</option>
                                                    <?php
                                                         $buscaesco=  $pdo->query("SELECT * FROM bd_emprega_aruja.tb_pre_nivel_escolaridade");
                                                         $dataesco= $buscaesco->fetchAll(); 
                                                         foreach ($dataesco as $value) {?>
                                                            <option value="<?php echo $value['escolaridade'];?>"><?php echo $value['escolaridade'];?>
                                                     <?php
                                                         }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Nº de Vagas</label>
                                                <input name="vagas" type="number" class="form-control" placeholder="Nº" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Cep</label>
                                                <input id="cep" name="cep" placeholder="Apenas números" class="form-control input-md" required="" value="" type="search" maxlength="8" pattern="[0-9]+$">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <br>
                                                <button type="button" class="btn btn-primary2" onclick="pesquisacep()">Pesquisar</button>   
                                            </div>
                                        </div>
                                    </div>      
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Endereço</label>
                                                <input id="rua" name="endereco" class="form-control" placeholder="" readonly="readonly" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label>Nº</label>
                                                <input id="numero" name="numero" class="form-control" placeholder="" required=""type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Complemento</label>
                                                <input  name="complemento" class="form-control" placeholder="" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Cidade</label>
                                                <input id="cidade" name="cidade" class="form-control" placeholder="" required=""  readonly="readonly" type="text" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Bairro</label>
                                                <input id="bairro" name="bairro" class="form-control" placeholder="" readonly="readonly" type="text"  >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <input id="estado" name="estado" class="form-control" placeholder="" required=""  readonly="readonly" type="text" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!--//PCD -->
									<div class="row">
                                    	<div class="col-md-4">
                                        	<div class="form-group">
												<label class="control-label" for="instituicao">Vaga exclusiva para PCD </label><br>
												<label><input type="radio" id="def_check" value="Sim" name="def" onClick="optionDef()" required>&nbsp;Sim</label>&nbsp;
												<label><input type="radio" value="Não" name="def" id="def" onClick="optionDef()">&nbsp;Não</label>
                                       		</div>
                                       	</div>
										<div class="col-md-4">
                                            <div class="form-group" id="def_div" style="display: none">
                                                <label class="control-label" for="Nome">&nbsp;&nbsp;Deficiência </label>
												<select name="defselect" id="defselect" class="form-control" onChange="optionDados()">
												
												<?php 
													$sql_def = "SELECT * FROM bd_emprega_aruja.tb_pre_deficiencias; ";
													foreach($pdo->query($sql_def) as $def){
													echo    '<option value="'   .$def['deficiencia'].'">'    .$def['deficiencia']   .'</option>';
													}
												?>
												</select>
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group" style="display: none" id="Audi_div">
												<label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def" id="Audi" class="form-control" disabled>
												<?php 
													$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '1' ";
													foreach($pdo->query($sql_dados_def) as $dados_def){
													echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
													}
												?>
												</select>
                                            </div>
											<div class="form-group" style="display: none" id="fisica_div">
												<label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def" id="fisica" class="form-control" disabled>
												<?php 
													$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '2' ";
													foreach($pdo->query($sql_dados_def) as $dados_def){
													echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
													}
												?>
												</select>
                                            </div>
											<div class="form-group" style="display: none" id="Visual_div">
												<label class="control-label" for="Nome">Qual?</label>
												<select name="dados_def" id="Visual" class="form-control" disabled>
												<?php 
													$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '3' ";
													foreach($pdo->query($sql_dados_def) as $dados_def){
													echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
													}
												?>
												</select>
											</div>
											<div class="form-group" style="display: none" id="Intelectual_div">
												<label class="control-label" for="Nome">Qual?</label>
												<select name="dados_def" id="Intelectual" class="form-control" disabled>
												<?php 
													$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '4' ";
													foreach($pdo->query($sql_dados_def) as $dados_def){
													echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
													}
												?>
												</select>
											</div>
											<div class="form-group" style="display: none" id="Deficiencia_div">
												<label class="control-label" for="Nome">Qual?</label>
												<select name="dados_def" id="Deficiencia" class="form-control" disabled>
												<?php 
													$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '5' ";
													foreach($pdo->query($sql_dados_def) as $dados_def){
													echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
													}
												?>
												</select>
											</div>
											<div class="form-group" style="display: none" id="Reabilitados_div">
												<label class="control-label" for="Nome">Qual?</label>
												<select name="dados_def" id="Reabilitados" class="form-control" disabled>
												<?php 
													$sql_dados_def = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '6' ";
													foreach($pdo->query($sql_dados_def) as $dados_def){
													echo    '<option value="'   .$dados_def['dados'].'">'    .$dados_def['dados']   .'</option>';
													}
												?>
												</select>
											</div>
                                        </div>
                                    </div>
									
									<div class="row">
                                    	<div class="col-md-4">
                                        	<div class="form-group" style="display: none" id="vgtbpcd">
												<label class="control-label" for="instituicao">Vaga disponível também para PCD </label><br>
												<label><input type="radio" id="def_check2" value="Sim" name="def2" onClick="optionDef2()">&nbsp;Sim</label>&nbsp;
												<label><input type="radio" value="Não" name="def2" id="def2" onClick="optionDef2()">&nbsp;Não</label>
                                       		</div>
                                       	</div>
										
										<div class="col-md-4">
                                            <div class="form-group" id="def_div2" style="display: none">
                                                <label class="control-label" for="Nome">&nbsp;&nbsp;Deficiência </label>
												<select name="defselect2" id="defselect2" class="form-control" onChange="optionDados2()">
												
												<?php 
													$sql_def2 = "SELECT * FROM bd_emprega_aruja.tb_pre_deficiencias; ";
													foreach($pdo->query($sql_def2) as $def2){
													echo    '<option value="'   .$def2['deficiencia'].'">'    .$def2['deficiencia']   .'</option>';
													}
												?>
												</select>
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group" style="display: none" id="Audi_div2">
												<label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def2" id="Audi2" class="form-control" disabled>
												<?php 
													$sql_dados_def2 = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '1' ";
													foreach($pdo->query($sql_dados_def2) as $dados_def2){
													echo    '<option value="'   .$dados_def2['dados'].'">'    .$dados_def2['dados']   .'</option>';
													}
												?>
												</select>
                                            </div>
											<div class="form-group" style="display: none" id="fisica_div2">
												<label class="control-label" for="Nome">Qual?</label>
                                                <select name="dados_def2" id="fisica2" class="form-control" disabled>
												<?php 
													$sql_dados_def2 = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '2' ";
													foreach($pdo->query($sql_dados_def2) as $dados_def2){
													echo    '<option value="'   .$dados_def2['dados'].'">'    .$dados_def2['dados']   .'</option>';
													}
												?>
												</select>
                                            </div>
											<div class="form-group" style="display: none" id="Visual_div2">
												<label class="control-label" for="Nome">Qual?</label>
												<select name="dados_def2" id="Visual2" class="form-control" disabled>
												<?php 
													$sql_dados_def2 = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '3' ";
													foreach($pdo->query($sql_dados_def2) as $dados_def2){
													echo    '<option value="'   .$dados_def2['dados'].'">'    .$dados_def2['dados']   .'</option>';
													}
												?>
												</select>
											</div>
											<div class="form-group" style="display: none" id="Intelectual_div2">
												<label class="control-label" for="Nome">Qual?</label>
												<select name="dados_def2" id="Intelectual2" class="form-control" disabled>
												<?php 
													$sql_dados_def2 = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '4' ";
													foreach($pdo->query($sql_dados_def2) as $dados_def2){
													echo    '<option value="'   .$dados_def2['dados'].'">'    .$dados_def2['dados']   .'</option>';
													}
												?>
												</select>
											</div>
											<div class="form-group" style="display: none" id="Deficiencia_div2">
												<label class="control-label" for="Nome">Qual?</label>
												<select name="dados_def2" id="Deficiencia2" class="form-control" disabled>
												<?php 
													$sql_dados_def2 = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '5' ";
													foreach($pdo->query($sql_dados_def2) as $dados_def2){
													echo    '<option value="'   .$dados_def2['dados'].'">'    .$dados_def2['dados']   .'</option>';
													}
												?>
												</select>
											</div>
											<div class="form-group" style="display: none" id="Reabilitados_div2">
												<label class="control-label" for="Nome">Qual?</label>
												<select name="dados_def2" id="Reabilitados2" class="form-control" disabled>
												<?php 
													$sql_dados_def2 = "SELECT * FROM bd_emprega_aruja.tb_pre_dados_deficiencias where id_pre_deficiencias = '6' ";
													foreach($pdo->query($sql_dados_def2) as $dados_def2){
													echo    '<option value="'   .$dados_def2['dados'].'">'    .$dados_def2['dados']   .'</option>';
													}
												?>
												</select>
											</div>
                                        </div>
                                    </div>


                                    <input type="submit" class="btn btn-info btn-fill pull-right" name="cadastrar" value="Cadastrar Vaga">
								
                                    <div class="clearfix"></div>
								
									<input type="hidden" name="identificador" value="<?php echo $protocoloentrada ?>">
                                    <input type="hidden" name="sigla" value="<?php echo $sigla ?>">
                                </form>
                               <?php } ?>
                           </div>
						<!-- End of Main Content -->
					</div>
					<!-- End of Content Wrapper -->
				</div>
                <!-- End of Page Wrapper -->
                <div class="col-md-12">
                     <?php
                        include('./controll/mensagens/mensagens.php');
                    ?> 
                </div>
                            <div>
                        </div>
                    </div>
                </div>
            </div> 
            <script>
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
                
<?php include "./controll/mensagens/mensagens.php"; ?>
<?php include "./includes/condicao_deficiencias.php"; ?>
<?php include "./includes/condicao_salario.php"; ?>
<?php include "./includes/condicao_dados_deficiencia.php"; ?>          
   
