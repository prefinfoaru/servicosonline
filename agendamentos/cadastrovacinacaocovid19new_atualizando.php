


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="../assets/css/conteudo/servidor.css" rel="stylesheet">
     
        <!-----JQuery------>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/js/jquery.mask.min.js" type="text/javascript"></script>
        <script src="../assets/js/covid19.js"></script>
        <script src="../assets/js/validacaocepnew.js"></script>
        <script src="../assets/js/valida_cpf_cnpj.js"></script>
        <script src="../assets/js/corrige_cpf_cnpj.js"></script>
        <!---sweer alert---->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="../assets/js/sweetalert2.all.min.js"></script>
        
    </head>

    <body>
        
        <div class = "container">
            <div class = "row">
                <div class ="col-md-11">
                    <br><br>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="titulo">PRÉ-CADASTRO VACINAÇÃO COVID-19</h4>    
                            
                        </div>
                        <div class="panel-body">
                            <form class="form-group" method="post" enctype="multipart/form-data"  action="../include/variaveisconfirmacovid19.php" accept-charset="utf-8">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-8"> 
                                            <span id="nome" class="help-block"><strong>Nome Completo:</strong></span>
                                            <input id="nome" name="nome" placeholder="Digite seu nome completo" class="form-control" <?=isset($_SESSION['nome'])? "value='$_SESSION[nome]'" : ""?> required="" type="text">
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <span id="nome" class="help-block"><strong>CPF:</strong></span>
                                            <input class="form-control" type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" <?=isset($_SESSION['cpf'])? "value='$_SESSION[cpf]'" : ""?> maxlength="14" required>
                                            
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-8"> 
                                            <span for="manspan" class="help-block"><strong>Nome da Mãe Completo:</strong></span>
                                            <input id="mae" name="mae" placeholder="Digite o nome da mãe completo" <?=isset($_SESSION['mae'])? "value='$_SESSION[mae]'" : ""?>class="form-control" required="" type="text"  >
                                        </div>
                                        
                                        <div class="col-md-3">
                                          <span class="help-block"><strong>Data de Nascimento</strong></span>
                                          <input type="date" id="nascimento" name="nascimento"  class="data form-control"  onblur="calculaIdade(this.value)" <?=isset($_SESSION['nascimento'])? "value='$_SESSION[nascimento]'" : ""?>  required=""  >
                                        </div>
                                        
                                        <div class="col-md-1">
                                        <span class="help-block"><strong> Idade:</strong></span>
                                            <input type="text" name="idade" id='idade'  <?=isset($_SESSION['idade'])? "value='$_SESSION[idade]'" : ""?> class="form-control" readonly >
                                        </div>
                                      
                                    </div>
                                    <br>
                                    <div class="row">
										<div class="col-md-4"> 
                                            <span for="sexo" class="help-block"><strong>Sexo:</strong></span>
                                            <select name="sexo" class="form-control" id="sexo" required="">
                                                <?= isset($_SESSION['sexo'])  ? "<option value='$_SESSION[sexo]'>$_SESSION[sexo]</option>" : "<option value=''>Escolha uma opção</option>"?>
                                                <?= $_SESSION['sexo'] == "Masculino" ? "" : "<option value='Masculino'>Masculino</option>"?>
                                                <?= $_SESSION['sexo'] == "Feminino" ? "" : "<option value='Feminino'>Feminino</option>"?>
                                                <?= $_SESSION['sexo'] == "Ignorado" ? "" : "<option value='Ignorado'>Ignorado</option>"?>
                                            </select>
                                        </div>
                                        <div class="col-md-4"> 
                                            <span for="raca" class="help-block"><strong>Raça:</strong></span>
                                            <select name="raca" class="form-control" id="raca"  required="">
                                                <?= isset($_SESSION['raca'])  ? "<option value='$_SESSION[raca]'>$_SESSION[raca]</option>" : "<option value=''>Escolha uma opção</option>"?>
                                                <?= $_SESSION['raca'] == "Amarela" ? "" : "<option value='Amarela'>Amarela</option>"?>
                                                <?= $_SESSION['raca'] == "Branca" ? "" : "<option value='Branca'>Branca</option>"?>
                                                <?= $_SESSION['raca'] == "Indígena" ? "" : "<option value='Indígena'>Indígena</option>"?>
                                                <?= $_SESSION['raca'] == "Não Informada" ? "" : "<option value='Não Informada'>Não Informada</option>"?>
                                                <?= $_SESSION['raca'] == "Negra" ? "" : "<option value='Negra'>Negra</option>"?>
                                                <?= $_SESSION['raca'] == "Parda" ? "" : "<option value='Parda'>Parda</option>"?>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <span id="cad" class="help-block"><strong>Cep:</strong></span>
                                                <input id="cep" name="cep" placeholder="" class="form-control" <?=isset($_SESSION['cep'])? "value='$_SESSION[cep]'" : ""?>  required="" size="10" maxlength="9" type="text" onblur="pesquisacep(this.value);" >
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-5"> 
                                            <span for="" class="help-block"><strong>Endereço:</strong></span>
                                            <input id="rua" name="rua" class="form-control" placeholder="" required=""  <?=isset($_SESSION['endereco'])? "value='$_SESSION[endereco]'" : ""?> readonly="readonly" type="text" >
                                        </div>
                                        <div class="col-md-1">
                                            <span for="" class="help-block"><strong>Nº:</strong></span>
                                            <input id="numero" name="numero" class="form-control" placeholder="" required="" <?=isset($_SESSION['numero'])? "value='$_SESSION[numero]'" : ""?> type="text" >
                                        </div>
                                        <div class="col-md-3">
                                            <span for="" class="help-block"><strong>Bairro:</strong></span>
                                            <input id="bairro" name="bairro" class="form-control" placeholder="" required="" <?=isset($_SESSION['bairro'])? "value='$_SESSION[bairro]'" : ""?> readonly="readonly" type="text"  >
                                        </div>
                                        <div class="col-md-2">
                                            <span for="" class="help-block"><strong>Cidade:</strong></span>
                                            <input id="cidade" name="cidade" class="form-control" placeholder="" required="" <?=isset($_SESSION['cidade'])? "value='$_SESSION[cidade]'" : ""?> readonly="readonly" type="text">
                                        </div>
                                        <div class="col-md-1">
                                            <span for="" class="help-block"><strong>SP:</strong></span>
                                            <input id="uf" name="estado" class="form-control" placeholder="" required="" <?=isset($_SESSION['estado'])? "value='$_SESSION[estado]'" : ""?>  readonly="readonly" type="text">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span for="" class="help-block"><strong>Complemento:</strong></span>
                                            <input id="complemento" name="complemento" class="form-control" placeholder="Digite o Complemento" <?=isset($_SESSION['complemento'])? "value='$_SESSION[complemento]'" : ""?> type="text">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <span for="zona" class="help-block"><strong>Zona:</strong></span>
                                            <select name="zona" class="form-control" id="zona"  required="">
                                                <?= isset($_SESSION['zona'])  ? "<option value='$_SESSION[zona]'>$_SESSION[zona]</option>" : "<option value=''>Escolha</option>"?>
                                                <?= $_SESSION['zona'] == "Rural" ? "" : "<option value='Rural'>Rural</option>"?>
                                                <?= $_SESSION['zona'] == "Urbana" ? "" : "<option value='Urbana'>Urbana</option>"?>
                                            </select>
                                        </div>
                                        <div class="col-md-4"> 
                                            <span for="email" class="help-block"><strong>E-mail:</strong></span>
                                            <input id="email" class="form-control" name="email" placeholder="email@email.com"  <?=isset($_SESSION['email'])? "value='$_SESSION[email]'" : ""?> type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" >
                                        </div>
                                        <div class="col-md-3"> 
                                            <span for="cad" class="help-block"><strong>Celular:</strong></span>
                                            <input id="cel" name="cel" class="form-control"  <?=isset($_SESSION['celular'])? "value='$_SESSION[celular]'" : ""?>  placeholder="Informe o número do celular"type="text" maxlength="15" required>
                                        </div>
                                        <div class="col-md-3">
                                            <span id="tel" class="help-block"><strong>Telefone:</strong></span>
                                            <input id="telefone" name="tel" class="form-control" onkeypress="mask(this, mtel);" <?=isset($_SESSION['telefone'])? "value='$_SESSION[telefone]'" : ""?> placeholder="Informe o número do telefone"  type="text"    maxlength="14" >
                                        </div>
                                       
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3"> 
                                            <span for="cad" class="help-block"><strong>É profissional da Sáude:</strong></span>
                                            <div class="form-check form-check-inline">
                                                <label><input type="radio" id="saude_check" value="Sim" name="saude" <?= $_SESSION['saude'] == "Sim" ? "checked" : ""?> onClick="profissionalSaude()"  required>&nbsp;Sim</label>&nbsp;
												<label><input type="radio" value="Não" name="saude" <?= $_SESSION['saude'] == "Não" ? "checked" : ""?> id="saude" onClick="profissionalSaude()">&nbsp;Não</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ocupacao" style="display:none"> 
                                            <span id="tel" class="help-block"><strong>Ocupação:</strong></span>
                                            <input id="ocupacao" name="ocupacao" placeholder="Digite sua ocupacao" <?=isset($_SESSION['ocupacao'])? "value='$_SESSION[ocupacao]'" : ""?> class="form-control"  type="text" >
                                        </div>
                                        <div class="col-md-2"> 
                                            <span for="pur" class="help-block"><strong>Acamado:</strong></span>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="acamado" id="acamado" <?= $_SESSION['acamado'] == "Sim" ? "checked" : ""?> value="Sim" required="">
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                <input class="form-check-input" type="radio" name="acamado" <?= $_SESSION['acamado'] == "Não" ? "checked" : ""?> id="acamado" value="Não">
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div style="text-align:right">
                                        <input type="submit" class="btn btn-primary" name="enviar" value="Enviar" ></input>
                                    </div>                  
                                </fieldset>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('../include/mensagens.php');?>
        <script>
                // $('#nascimento').mask('00/00/0000');     
        </script>
        <script src="../assets/js/maskTel.js"></script>	
        <script src="../assets/js/mascaracel.js"></script>	
        <script src="../assets/js/maskCel.js"></script>	
        <script src="../assets/js/calculaidade.js"></script>	    
    </body>

   

</html>
