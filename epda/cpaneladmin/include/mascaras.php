<script language=javascript type="text/javascript">
					
		
				$(document).ready(function(){
				$("#cpf").mask("000.000.000-00")
				$("#cnpj").mask("00.000.000/0000-00")
				$("#telefone").mask("(00) 0000-0000")
				$("#salario").mask("999.999.990,00", {reverse: true})
				$("#cep").mask("00.000-000")
				$("#dataNascimento").mask("00/00/0000")

				$("#rg").mask("999.999.999-W", {
				translation: {
				'W': {
				pattern: /[X0-9]/
				}
				},
				reverse: true
				})

				$("#rg2").mask("999.999.999-W", {
				translation: {
				'W': {
				pattern: /[X0-9]/
				}
				},
				reverse: true
				})

				var options = {
				translation: {
				'A': {pattern: /[A-Z]/},
				'a': {pattern: /[a-zA-Z]/},
				'S': {pattern: /[a-zA-Z0-9]/},
				'L': {pattern: /[a-z]/},
				}
				}

				$("#placa").mask("AAA-0000", options)

				$("#codigo").mask("AA.LLL.0000", options)

				$("#celular").mask("(00) 0000-00009")

				$("#celular").blur(function(event){
				if ($(this).val().length == 15){
				$("#celular").mask("(00) 00000-0009")
				}else{
				$("#celular").mask("(00) 0000-00009")
				}
				})
				})



				function mascara(o,f){
				v_obj=o
				v_fun=f
				setTimeout("execmascara()",1)
				}
				function execmascara(){
				v_obj.value=v_fun(v_obj.value)
				}
				function mtel(v){
				v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
				v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
				v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
				return v;
				}

				function mascaraMutuario(o,f){
				v_obj=o
				v_fun=f
				setTimeout('execmascara()',1)
				}

				function execmascara(){
				v_obj.value=v_fun(v_obj.value)
				}

				function cpfCnpj(v){

				//Remove tudo o que não é dígito
				v=v.replace(/\D/g,"")

				if (v.length <= 13) { //CPF

				//Coloca um ponto entre o terceiro e o quarto dígitos
				v=v.replace(/(\d{3})(\d)/,"$1.$2")

				//Coloca um ponto entre o terceiro e o quarto dígitos
				//de novo (para o segundo bloco de números)
				v=v.replace(/(\d{3})(\d)/,"$1.$2")

				//Coloca um hífen entre o terceiro e o quarto dígitos
				v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")

				} 

				return v

				}''


				</script>

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/jquery.zebra-datepicker.js"></script>