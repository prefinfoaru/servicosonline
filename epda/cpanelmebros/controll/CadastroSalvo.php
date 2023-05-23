<?php 

include "conexao.php";
include "./consulta/sql.php";

$protocoloentrada = date("Ymd") . mt_rand();


?>
<br><br><br><br><br><br>
<i class="fas fa-chalkboard-teacher"></i><i class="fas fa-chalkboard-teacher"></i> <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

             
                  <div class="col-lg-9 main-chart">
                  
             
                      <!-- includir  aqui a paginas  ***//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                      
                      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                      
            
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<head>
<style>
    h11 {
    color:red;
}

#logo {
        width:50%;
        height:50%;
}

.panel-heading{
    font-size:150%;
}

    
    </style>
    <script>
    
       
    function limpa_formulario_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
            
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulario_cep();
            alert("CEP não encontrado.");
            document.getElementById('cep').value=("");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep !== "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulario_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulario_cep();
        }
    }

function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i);
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
 
function idade (){
    var data=document.getElementById("dtnasc").value;
    var dia=data.substr(0, 2);
    var mes=data.substr(3, 2);
    var ano=data.substr(6, 4);
    var d = new Date();
    var ano_atual = d.getFullYear(),
        mes_atual = d.getMonth() + 1,
        dia_atual = d.getDate();
        
        ano=+ano,
        mes=+mes,
        dia=+dia;
        
    var idade=ano_atual-ano;
    
    if (mes_atual < mes || mes_atual == mes_aniversario && dia_atual < dia) {
        idade--;
    }
return idade;
} 
  
  
function exibe(i) {
    
   
        
	document.getElementById(i).readOnly= true;
	    
		
	
    
}

function desabilita(i){
    
     document.getElementById(i).disabled = true;    
    }
function habilita(i)
    {
        document.getElementById(i).disabled = false;
    }


function showhide()
 {
       var div = document.getElementById("newpost");
       
       if(idade()>=18){
 
    div.style.display = "none";
}
else if(idade()<18) {
    div.style.display = "inline";
}

 }


  function abrir(){
    document.getElementById('janela').style.display='';
      window.open('iframe2.php', "iframejanela");
}
	/*

 Verificando se é CNPJ OU CPF

*/
function verifica_cpf_cnpj ( valor ) {

    // Garante que o valor é uma string
    valor = valor.toString();
    
    // Remove caracteres inválidos do valor
    valor = valor.replace(/[^0-9]/g, '');

    if (valor.length != 11 || 
		valor == "00000000000" || 
		valor == "11111111111" || 
		valor == "22222222222" || 
		valor == "33333333333" || 
		valor == "44444444444" || 
		valor == "55555555555" || 
		valor == "66666666666" || 
		valor == "77777777777" || 
		valor == "88888888888" || 
		valor == "99999999999"){    
            return false;	
        }	
    // Verifica CPF
    if ( valor.length === 11 ) {
        return 'CPF';
    } 
    
    // Verifica CNPJ
    else if ( valor.length === 14 ) {
        return 'CNPJ';
    } 
    
    // Não retorna nada
    else {
        return false;
    }
    
} // verifica_cpf_cnpj

/*
 calc_digitos_posicoes
 
 Multiplica dígitos vezes posições
 
 @param string digitos Os digitos desejados
 @param string posicoes A posição que vai iniciar a regressão
 @param string soma_digitos A soma das multiplicações entre posições e dígitos
 @return string Os dígitos enviados concatenados com o último dígito
*/
function calc_digitos_posicoes( digitos, posicoes = 10, soma_digitos = 0 ) {

    // Garante que o valor é uma string
    digitos = digitos.toString();

    // Faz a soma dos dígitos com a posição
    // Ex. para 10 posições:
    //   0    2    5    4    6    2    8    8   4
    // x10   x9   x8   x7   x6   x5   x4   x3  x2
    //   0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196
    for ( var i = 0; i < digitos.length; i++  ) {
        // Preenche a soma com o dígito vezes a posição
        soma_digitos = soma_digitos + ( digitos[i] * posicoes );

        // Subtrai 1 da posição
        posicoes--;

        // Parte específica para CNPJ
        // Ex.: 5-4-3-2-9-8-7-6-5-4-3-2
        if ( posicoes < 2 ) {
            // Retorno a posição para 9
            posicoes = 9;
        }
    }

    // Captura o resto da divisão entre soma_digitos dividido por 11
    // Ex.: 196 % 11 = 9
    soma_digitos = soma_digitos % 11;

    // Verifica se soma_digitos é menor que 2
    if ( soma_digitos < 2 ) {
        // soma_digitos agora será zero
        soma_digitos = 0;
    } else {
        // Se for maior que 2, o resultado é 11 menos soma_digitos
        // Ex.: 11 - 9 = 2
        // Nosso dígito procurado é 2
        soma_digitos = 11 - soma_digitos;
    }

    // Concatena mais um dígito aos primeiro nove dígitos
    // Ex.: 025462884 + 2 = 0254628842
    var cpf = digitos + soma_digitos;

    // Retorna
    return cpf;
    
} // calc_digitos_posicoes

/*
 Valida CPF
 
 Valida se for CPF
 
 @param  string cpf O CPF com ou sem pontos e traço
 @return bool True para CPF correto - False para CPF incorreto
*/
function valida_cpf( valor ) {

    // Garante que o valor é uma string
    valor = valor.toString();
    
    // Remove caracteres inválidos do valor
    valor = valor.replace(/[^0-9]/g, '');


    // Captura os 9 primeiros dígitos do CPF
    // Ex.: 02546288423 = 025462884
    var digitos = valor.substr(0, 9);

    // Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito
    var novo_cpf = calc_digitos_posicoes( digitos );

    // Faz o cálculo dos 10 dígitos do CPF para obter o último dígito
    var novo_cpf = calc_digitos_posicoes( novo_cpf, 11 );

    // Verifica se o novo CPF gerado é idêntico ao CPF enviado
    if ( novo_cpf === valor ) {
        // CPF válido
        return true;
    } else {
        // CPF inválido
        return false;
    }
    
} // valida_cpf

/*
 valida_cnpj
 
 Valida se for um CNPJ
 
 @param string cnpj
 @return bool true para CNPJ correto
*/
function valida_cnpj ( valor ) {

    // Garante que o valor é uma string
    valor = valor.toString();
    
    // Remove caracteres inválidos do valor
    valor = valor.replace(/[^0-9]/g, '');

    
    // O valor original
    var cnpj_original = valor;

    // Captura os primeiros 12 números do CNPJ
    var primeiros_numeros_cnpj = valor.substr( 0, 12 );

    // Faz o primeiro cálculo
    var primeiro_calculo = calc_digitos_posicoes( primeiros_numeros_cnpj, 5 );

    // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
    var segundo_calculo = calc_digitos_posicoes( primeiro_calculo, 6 );

    // Concatena o segundo dígito ao CNPJ
    var cnpj = segundo_calculo;

    // Verifica se o CNPJ gerado é idêntico ao enviado
    if ( cnpj === cnpj_original ) {
        return true;
    }
    
    // Retorna falso por padrão
    return false;
    
} // valida_cnpj

/*
 valida_cpf_cnpj
 
 Valida o CPF ou CNPJ
 
 @access public
 @return bool true para válido, false para inválido
*/
function valida_cpf_cnpj ( valor ) {

    // Verifica se é CPF ou CNPJ
    var valida = verifica_cpf_cnpj( valor );

    // Garante que o valor é uma string
    valor = valor.toString();
    
    // Remove caracteres inválidos do valor
    valor = valor.replace(/[^0-9]/g, '');


    // Valida CPF
    if ( valida === 'CPF' ) {
        // Retorna true para cpf válido
        return valida_cpf( valor );
    } 
    
    // Valida CNPJ
    else if ( valida === 'CNPJ' ) {
        // Retorna true para CNPJ válido
        return valida_cnpj( valor );
    } 
    
    // Não retorna nada
    else {
        return false;
    }
    
} // valida_cpf_cnpj

/*
 formata_cpf_cnpj
 
 Formata um CPF ou CNPJ

 @access public
 @return string CPF ou CNPJ formatado
*/
function formata_cpf_cnpj( valor ) {

    // O valor formatado
    var formatado = false;
    
    // Verifica se é CPF ou CNPJ
    var valida = verifica_cpf_cnpj( valor );

    // Garante que o valor é uma string
    valor = valor.toString();
    
    // Remove caracteres inválidos do valor
    valor = valor.replace(/[^0-9]/g, '');


    // Valida CPF
    if ( valida === 'CPF' ) {
    
        // Verifica se o CPF é válido
        if ( valida_cpf( valor ) ) {
        
            // Formata o CPF ###.###.###-##
            formatado  = valor.substr( 0, 3 ) + '.';
            formatado += valor.substr( 3, 3 ) + '.';
            formatado += valor.substr( 6, 3 ) + '-';
            formatado += valor.substr( 9, 2 ) + '';
            
        }
        
    }
    
    // Valida CNPJ
    else if ( valida === 'CNPJ' ) {
    
        // Verifica se o CNPJ é válido
        if ( valida_cnpj( valor ) ) {
        
            // Formata o CNPJ ##.###.###/####-##
            formatado  = valor.substr( 0,  2 ) + '.';
            formatado += valor.substr( 2,  3 ) + '.';
            formatado += valor.substr( 5,  3 ) + '/';
            formatado += valor.substr( 8,  4 ) + '-';
            formatado += valor.substr( 12, 14 ) + '';
            
        }
        
    } 

    // Retorna o valor 
    return formatado;
    
} // formata_cpf_cnpj 
	 

     // Testando a validação usando jQuery
$(function(){

    // ## EXEMPLO 3
    // Aciona a validação e formatação ao sair do input
    $('#cpf').blur(function(){
    
        // O CPF ou CNPJ
        var cpf_cnpj = $(this).val();
        
        // Testa a validação e formata se estiver OK
        if ( formata_cpf_cnpj( cpf_cnpj ) ) {
            $(this).val( formata_cpf_cnpj( cpf_cnpj ) );
        } else {
            alert('Digite um cpf válido!');
            document.getElementById('cpf').value=("");
        }
        
    });

});
                           
     function rg(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/(\d{2})(\d{3})(\d{3})(\d{1})$/,"$1.$2.$3-$4");
    return v;
}                
                                
								
		function ApenasLetras(e, t) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        } else if (e) {
            var charCode = e.which;
        } else {
            return true;
        }
        if (
            (charCode > 64 && charCode < 91) || 
            (charCode > 96 && charCode < 123) ||
            (charCode > 191 && charCode <= 255) // letras com acentos
        ){
            return true;
        } else {
            return false;
        }
    } catch (err) {
        alert(err.Description);
    }
}				


    </script>
</head>
<body>

<form class="form-horizontal" method="post" action="././data/SalvaRequerimento.php">
<fieldset>
<div class="panel panel-default" style="color: #363434 ; background-color:#F8F8F8">
    <div class="panel-heading" align="center">Formulário para Solicitação de Requerimento</div>
    
    <div class="panel-body">
<div class="form-group">
<!--
<div class="form-group">   
<div class="col-md-4 control-label">
    <img id="logo" src="http://blogdoporao.com.br/wp-content/uploads/2016/12/Faculdade-pitagoras.png"/>
</div>
<div class="col-md-4 control-label">
    <h1>Cadastro de Cliente</h1>
    
</div>
</div>
    -->
<div class="col-md-11 control-label">
        <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
    
</div>  
</div>
<form action="../data/SalvaRequerimento.php" method="post">
    
    <input type="hidden" name="numeroprotocolo" value="<?php echo $protocoloentrada ?>"
<!-- Text input-->
    <div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Protocolo<h11>*</h11></label>  
  <div class="col-md-3">
  <input id="protocolo" name="protocolo" placeholder="<?php echo 'epda'.$protocoloentrada ?>" class="form-control input-md"  required="" type="text" disabled>
  </div>
</div>
    
<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Nome <h11>*</h11></label>  
  <div class="col-md-9">
  <input id="Nome" name="nome" placeholder="Digite seu nome Completo" class="form-control input-md" required="" type="text" autofocus>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">RG<h11>*</h11></label>  
  <div class="col-md-4">
  <input id ="rg" name="rg" maxlength="13" placeholder="RG não incluir ( . ou -)" class="form-control input-md " required="" type="text" maxlength="11"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
  </div> 
    
   
  <label class="col-md-1 control-label" for="Nome">CPF<h11>*</h11></label>  
  <div class="col-md-4">
  <input id="cpf" name="cpf" placeholder="CPF não incluir ( . ou -)" class="form-control input-md" required="" type="text" maxlength="11" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
  </div>
  <!--
  <label class="col-md-1 control-label" for="Nome">Nascimento<h11>*</h11></label>  
  <div class="col-md-2">
  <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
</div> -->

<!-- Multiple Radios (inline) -->

  <div class="col-md-4"> 

  </div>
</div>

        <hr>
<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Telefone <h11>*</h11></label>
  <div class="col-md-3">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
      <input id="tel" name="tel" class="form-control" placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
      OnKeyPress="formatar('## #####-####', this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57" >
    </div>
  </div>
  
    <label class="col-md-1 control-label" for="prependedtext">Celular<h11>*</h11></label>
     <div class="col-md-3">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
      <input id="cel" name="cel" class="form-control" placeholder="XX XXXXX-XXXX" type="text" maxlength="13"  pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
      OnKeyPress="formatar('## #####-####', this)" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
    </div>
  </div>
 </div> 

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Email <h11>*</h11></label>
  <div class="col-md-5">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input id="email" name="email" class="form-control" placeholder="email@email.com" required="" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" >
    </div>
  </div>
</div>


<!-- Search input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="CEP">CEP <h11>*</h11></label>
  <div class="col-md-2">
    <input id="cep" name="cep" placeholder="Apenas números" class="form-control input-md" required="" value="" type="search" maxlength="8" pattern="[0-9]+$">
  </div>
  <div class="col-md-2">
      <button type="button" class="btn btn-primary" onclick="pesquisacep(cep.value)">Pesquisar</button>
    </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Endereço</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Rua</span>
      <input id="rua" name="rua" class="form-control" placeholder="" required="" readonly="readonly" type="text">
    </div>
    
  </div>
    <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon">Nº <h11>*</h11></span>
      <input id="numero" name="numero" class="form-control" placeholder="" required=""  type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
    </div>
    
  </div>
  
  <div class="col-md-3">
    <div class="input-group">
     <span class="input-group-addon">Complemento </span>
      <input id="complemento" name="complemento" class="form-control" placeholder="" type="text">
    </div>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
    
    <div class="col-md-3">
    <div class="input-group">
   <span class="input-group-addon">Bairro</span>
      <input id="bairro" name="bairro" class="form-control" placeholder="" required="" readonly="readonly" type="text">
    </div>
    
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Cidade</span>
      <input id="cidade" name="cidade" class="form-control" placeholder="" required=""  readonly="readonly" type="text">
    </div>
    
  </div>
  
   <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon">Estado</span>
      <input id="estado" name="estado" class="form-control" placeholder="" required=""  readonly="readonly" type="text">
    </div>
    
  </div>
</div>
<hr>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-2 control-label" for="Estado Civil">Assunto<h11>*</h11></label>
  <div class="col-md-4">
     <select id = 'assunto' name="assunto" class="form-control" required>
						<option value="" class="form-control">Selecione um Assunto</option>
						<?php

						foreach ($pdo->query($Query_assunto) as $row) { ?>

							<option value="<?php echo $row['assunto']; ?>" class="form-control"><?php echo $row['assunto']; ?></option>


						<?php

						}
						?>
						<br>

					</select>
  </div>
  
  <!-- Prepended checkbox -->

  
  <div class="col-md-3">

    
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
    
  <label class="col-md-2 control-label" for="selectbasic">Descrição <h11>*</h11></label>
  
  <div class="col-md-4">
    <textarea class="form-control" rows="10" id="descricao" name="descricao" required></textarea>
  </div>


<!-- Text input-->

  <label class="col-md-1 control-label" for="profissao">P/ fins de<h11>*</h11></label>  
  <div class="col-md-4">
  <textarea class="form-control" rows="10" id="pfs" name="pfs" required></textarea>
    
  </div>
</div>

 <hr>
<div id="newpost">
   <div class="form-group">
    <div class="col-md-12 control-label">
        <h4 style="background-color: #F1CBCB" align="center" required>Envio de Documentos</h4>
    </div>
    </div>
    
    <div class="form-group">
  <label class="col-md-12 control-label" for="Nome"> 
  <div class="col-md-12" align="center">
       <a href="#" onclick="window.open('http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/cpanel/include/anexos.php?protocolo=<?php echo 'epda'.$protocoloentrada  ?>', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=500, HEIGHT=800');"><button type="button" class="btn btn-primary" class="form-control">Clique para Anexar Arquivos</button></a>      </label> 
  </div>
</div>
    <hr>
    


<!-- Multiple Radios (inline) -->

  <label class="col-md-12 control-label" for="radios">Caso seja necessário o envio de notificações referente a este requerimento, autorizo que as mesma sejam enviuadas através do email informado nos dados pessoais: <h11>*</h11></label>
  <div class="col-md-12" align="center"> <br>
    <label required="" class="radio-inline" for="radios-0" >
      <input name="notificacao" id="notificacao" value="1" type="radio" required checked>
      Sim 
    </label> 
    <label class="radio-inline" for="radios-1">
      <input name="notificacao" id="notificacao" value="2" type="radio">
      não 
    </label>
  </div>
</div>




<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-12 control-label" for="Cadastrar"></label>
  <div class="col-md-12" align="right">
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Enviar Requerimento</button>
    
  </div>
</div>
</div>
</div>
</div>


</fieldset>
</form>

</body>
</html>
                
                    </div>
                    </div>
 

                                       <?php 
                  
                  include "include/MenuLateralDireita.php";
                  include "include/footer.php";
                            
                  
                  ?>
					
                  