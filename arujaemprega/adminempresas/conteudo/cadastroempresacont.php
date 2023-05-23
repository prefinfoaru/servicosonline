<?php
session_start();
include("../data/banco.php");

$URL_ATUAL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$numprot = explode('res=', $URL_ATUAL, 2);


if (isset($numprot[1])) {
    $res    =   $numprot[1];
} else {
    $res = "";
}
?>


<link rel="stylesheet" href="../assets/fonts/material-icon/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="../assets/vendor/nouislider/nouislider.min.css">
<!-- Main css -->
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/sweetalert.css">

<script src="../assets/js/sweetalert.js" type="text/javascript"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../includes/corrige_cpf_cnpj.js" type="text/javascript"></script>
<script src="../includes/valida_cpf_cnpj.js" type="text/javascript"></script>

<script src="../assets/js/jsjs.js"></script>

<?php

if ($res  == 1) { ?>

<script>
swal.fire({
    icon: 'success',
    title: '<strong>Cadastrado com sucesso</strong>',


    html: '<hr><button  class="btn btn-default"><a href="../pages/login.php">OK</a></button>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>



<?php     } elseif ($res  == 2) {   ?>

<script>
swal.fire({
    icon: 'error',
    title: '<strong>CNPJ/CPF Já Cadastrado.</strong>',
    text: 'Verifique e tente novamente!.',

    html: '<hr><button  class="btn btn-default"><a href="../pages/cadastroempresa.php">OK</a></button>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>


<?php     } elseif ($res  == 3) {   ?>

<script>
swal.fire({
    icon: 'error',
    title: '<strong>Formato de imagem não aceito.</strong>',
    text: 'Verifique e tente novamente!.',

    html: '<hr><button  class="btn btn-default"><a href="../pages/cadastroempresa.php">OK</a></button>',
    showConfirmButton: false,
    allowOutsideClick: false
});
</script>


<?php     } ?>

<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="../assets/img/lateral.png" alt="">

                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form"
                        action="../data/insert/cadastroempresa.php" enctype="multipart/form-data">
                        <h5 align="right">
                            <font color="#E74C3C">* </font>Obrigatório o preenchimento
                        </h5>
                        <div class="form-row">

                            <div class="col-md-8">
                                <div class="form-input">
                                    <label for="cpf" class="required">CNPJ/CPF</label>
                                    <input type="text" name="cnpj" id="cnpj" size="14" maxlength="14"
                                        placeholder="Apenas numeros." required=""
                                        onblur="validarDados('cnpj', document.getElementById('cnpj').value)">
                                </div>
                            </div>



                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-input">
                                    <label for="razaosocial" class="required">Razão Social</label>
                                    <input type="text" name="razaosocial" required="">
                                </div>
                            </div>



                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-input">
                                    <label for="nomefantasia" class="required">Nome Fantasia</label>
                                    <input type="text" name="nomefantasia" required="">
                                </div>
                            </div>



                        </div>

                        <div class="form-row">
                            <div class="col-md-8">
                                <div class="form-input">
                                    <label class="required" for="CEP">Cep</label>

                                    <input id="cep" name="cep" placeholder="Apenas números" required="" value=""
                                        type="search" maxlength="8" pattern="[0-9]+$">
                                </div>

                            </div>
                            <div class="col-md-4">


                                <br><br>
                                <button type="button" class="btn btn-primary  "
                                    onclick="pesquisacep(cep.value)">Pesquisar</button>


                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-8">
                                <div class="form-input">
                                    <label class="control-label" for="prependedtext"></label>

                                    <div class="input-group">
                                        <span class="input-group-addon">Rua</span>
                                        <input id="rua" name="rua" class="form-control" placeholder="" required=""
                                            readonly="readonly" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-input">
                                    <label class="control-label" for="prependedtext"></label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Nº<font color="#E74C3C">* </font> </span>
                                        <input id="numero" name="numero" class="form-control" placeholder="" required=""
                                            type="text">
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-input">
                                    <label class="control-label" for="prependedtext"></label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Complemento</span>
                                        <input name="complemento" class="form-control" placeholder="" type="text">
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-5">
                                <div class="form-input">
                                    <label class="control-label" for="prependedtext"></label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Bairro</span>
                                        <input id="bairro" name="bairro" class="form-control" placeholder="" required=""
                                            readonly="readonly" type="text">
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-input">
                                    <label class="control-label" for="prependedtext"></label>

                                    <div class="input-group">
                                        <span class="input-group-addon">Cidade</span>
                                        <input id="cidade" name="cidade" class="form-control" placeholder="" required=""
                                            readonly="readonly" type="text">
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-input">
                                    <label class=" control-label" for="prependedtext"></label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Estado</span>
                                        <input id="estado" name="estado" class="form-control" placeholder="" required=""
                                            readonly="readonly" type="text">
                                    </div>


                                </div>
                            </div>

                        </div><br>
                        <div class="form-row">
                            <div class="col-md-12">


                                <div class="form-input">
                                    <label class="required" class="control-label" for="Nome">&nbsp;&nbsp;Ramo de
                                        Atividade</label>
                                    <select name="ramoatividade" class="form-control" required>
                                        <option value="">Selecione um ramo</option>
                                        <?php $sql_ramo = "SELECT * FROM bd_emprega_aruja.tb_ramoatividade";

                                        foreach ($pdo->query($sql_ramo) as $sql) {


                                            echo    '<option value="'   . $sql['descricao'] . '">'    . $sql['descricao']   . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-input">
                                    <label class="required" class="control-label"
                                        for="Nome">&nbsp;&nbsp;Telefone</label>

                                    <input id="tel" name="tel" placeholder="Informe o número do telefone" type="text"
                                        required="" maxlength="14" style="width: 100%">


                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-input">
                                    <label class=" control-label" for="Nome">&nbsp;&nbsp;Celular</label>

                                    <input id="phone" name="cel" onkeypress="mask(this, mphone);"
                                        onblur="mask(this, mphone);" placeholder="Informe o número do celular"
                                        type="text" maxlength="15" style="width: 100%">

                                </div>
                            </div>


                        </div><br>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-input">
                                    <label for="responsavel">Responsável para contato</label>
                                    <input type="text" name="responsavel"
                                        placeholder="Informe o nome do responsável para contato">
                                </div>
                            </div>



                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-input">
                                    <label class="required" class=" control-label" for="prependedtext">Email </label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-envelope"></i></span>
                                        <input id="email" name="email" placeholder="email@email.com" required=""
                                            type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-input">
                                    <label class="required" class=" control-label" for="prependedtext">Confirmar
                                        Email</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-envelope"></i></span>
                                        <input id="confirm_email" name="confirm_email" placeholder="email@email.com"
                                            required="" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                            onChange="validateEmail()">
                                    </div>

                                </div>
                            </div>

                        </div><br>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-input">
                                    <label class="required" class="control-label" for="prependedtext">Senha </label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="password" type="password" name="password" placeholder="Password"
                                            required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-input">
                                    <label class="required" class="control-label" for="prependedtext">Confirmar Senha
                                    </label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="confirm_password" type="password" name="confirm_password"
                                            placeholder="Password" required="" onChange="validatePassword()">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-12">

                                <label class="col-md-4 control-label" for="instituicao"
                                    style="text-align: right">&nbsp;&nbsp;Logo da Empresa<h11>*</h11></label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="imagem" id="imgInp"
                                        accept=".jpg,.png,.jpeg" required=""
                                        style="background-color: #F8D1D2 ; color: #141E4D ; font-size: 11px; width: 98%"><br>
                                    <img id="blah" style="width: 250px; height: 110px;margin-bottom:20px">
                                </div>

                            </div>

                        </div>
                        <div class="container form-group" style="text-align: center;">
                            <textarea style="width:100%; min-height:300px; resize: none;" disabled>Termo de Uso

Introdução

Este documento informa as responsabilidades, deveres e obrigações que todos os usuários assumem ao utilizarem o Portal da PREFEITURA MUNICIPAL DE ARUJÁ, bem como seus sítios e serviços. Ao utilizar o Portal, o usuário manifesta sua concordância com todas as condições impostas neste Termo de Uso.

Definições

•	Conteúdo Público: são documentos, dados e informações de interesse da sociedade, produzidos pela PREFEITURA MUNICIPAL DE ARUJÁ no exercício de suas funções e atividades, e que não tenham restrições de sigilo legal. Excluem-se desse conceito os símbolos e insígnias da PREFEITURA MUNICIPAL DE ARUJÁ;
•	Link: sinônimo de Hiperlink. É uma referência dentro de um documento em hipertexto a outras partes desse documento, ou a outro documento, ou página da internet. Links estabelecem ligações/vínculos entre endereços na Internet;
•	Portal: abrange os sítios da PREFEITURA MUNICIPAL DE ARUJÁ <https://prefeituradearuja.sp.gov.br/>;
•	Usuário: qualquer pessoa que acessa páginas ou conteúdo de acesso público ou área restrita do Portal da PREFEITURA MUNICIPAL DE ARUJÁ mediante cadastro.

Finalidade do Portal

O Portal da PREFEITURA MUNICIPAL DE ARUJÁ é um importante canal de informações e de serviços eletrônicos relacionados com a prestação de informação à população, arrecadação de tributos, gestão financeira, compras de governo, bem como suas obrigações acessórias, provendo importantes instrumentos de controle e acompanhamento das contas públicas, nos termos da legislação vigente.

Uso do conteúdo do Portal

As informações, os documentos e os dados disponíveis no Portal da PREFEITURA MUNICIPAL DE ARUJÁ são de caráter público e gratuito. Entretanto, a utilização de alguns serviços pode acarretar em coleta de dados ou estar condicionada ao prévio cadastro do usuário, mediante fornecimento de informações pessoais, as quais são acessadas apenas por profissionais autorizados. Para saber mais sobre quais informações podem ser coletadas, bem como seu uso pela PREFEITURA MUNICIPAL DE ARUJÁ, acesse a Política de Privacidade do Portal da PREFEITURA MUNICIPAL DE ARUJÁ.
A PREFEITURA MUNICIPAL DE ARUJÁ busca manter o conteúdo do Portal atualizado e completo. Por outro lado, a PREFEITURA MUNICIPAL DE ARUJÁ não se responsabiliza pela utilização, aplicação ou processamento que os usuários possam dar às informações que disponibiliza, sendo o usuário responsável pela finalidade do uso dessas informações.
Ao utilizar o Portal da PREFEITURA MUNICIPAL DE ARUJÁ, o usuário concorda em:

•	Não fornecer informações falsas ou desatualizadas para efetivar seu cadastro para o uso de serviços;
•	Não inutilizar ou modificar qualquer área do Portal;
•	Não tentar violar os mecanismos de proteção ao conteúdo do Portal e dos serviços que este oferece;
•	Não utilizar mecanismos automatizados de coleta de dados (robôs);
•	Não compartilhar senhas de acesso utilizadas em sistemas eletrônicos da PREFEITURA MUNICIPAL DE ARUJÁ e zelar por sua confidencialidade;
•	Não fazer uso indevido dos serviços disponibilizados.

A utilização de determinados serviços e conteúdos oferecidos por meio do Portal da PREFEITURA MUNICIPAL DE ARUJÁ pode estar submetida a condições de uso próprias que, conforme o caso, podem complementar este Termo de Uso. Portanto, é responsabilidade do usuário tomar ciência das respectivas condições de uso antes de utilizar tais conteúdos e serviços.

Utilização de Links

O Portal da PREFEITURA MUNICIPAL DE ARUJÁ contém links para outros sítios, que são disponibilizados para facilitar o acesso e dar comodidade aos usuários. A PREFEITURA MUNICIPAL DE ARUJÁ não se responsabiliza pelas práticas de privacidade ou pelos respectivos conteúdos destes.
A inserção de links e referências para o Portal PREFEITURA MUNICIPAL DE ARUJÁ em outros sítios é autorizada, observando-se as seguintes condições:

•	A PREFEITURA MUNICIPAL DE ARUJÁ não se responsabiliza por alterações no link do Portal;
•	Não é permitido a nenhum sítio utilizar como sua página inicial o acesso direto à página inicial do Portal da PREFEITURA MUNICIPAL DE ARUJÁ.

Direitos Autorais

Todo o conteúdo do Portal da PREFEITURA MUNICIPAL DE ARUJÁ, tais como textos, marcas, imagens e aplicativos exibidos e disponibilizados estão protegidos por direitos autorais e são de propriedade da PREFEITURA MUNICIPAL DE ARUJÁ, não sendo permitidas quaisquer modificações.
É permitida a reprodução do Conteúdo Público disponível no Portal com observância da legislação vigente e com a citação da fonte. Ressalte-se que a PREFEITURA MUNICIPAL DE ARUJÁ se exime de responsabilidade e não mantém qualquer vínculo com sítios não governamentais que possam, eventualmente, reproduzir o Conteúdo Público disponível em seu Portal.

Comunicação com o usuário

Em caso de dúvidas ou sugestões em relação ao conteúdo do Portal da PREFEITURA MUNICIPAL DE ARUJÁ entre em contato por meio dos canais de comunicação disponibilizados através do “Fale Conosco”.

Atualização das informações do usuário

Além dos casos obrigatórios previstos em lei, é dever dos usuários dos sistemas e serviços disponíveis no Portal da PREFEITURA MUNICIPAL DE ARUJÁ manter seus dados atualizados. Para isso, a PREFEITURA MUNICIPAL DE ARUJÁ oferece meios que possibilitam aos usuários atualizar e corrigir os dados preenchidos no cadastro. Essas mudanças poderão ser realizadas a qualquer momento, conforme necessário.

Disposições Gerais

A PREFEITURA MUNICIPAL DE ARUJÁ se reserva o direito de modificar este Termo de Uso ou quaisquer termos adicionais que sejam aplicáveis a um serviço para refletir alterações na legislação ou mudanças nos próprios serviços.
Cabe aos usuários manterem-se atualizados sobre este Termo de Uso, bem como sobre os termos de outros serviços que acessarem por meio do Portal da PREFEITURA MUNICIPAL DE ARUJÁ. 

</textarea><br>

                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1"
                                style="text-align:center; font-size: 13px;">Concordo com os termos</label>

                        </div>

                        <div class="form-submit">
                            <input type="submit" value="Cadastrar" class="submit" id="submit" name="submit" />
                            <button id="Cancelar" name="Cancelar" class="btn btn-danger btn-lg"
                                type="Reset">Limpar</button>
                        </div>

                        <script src="../assets/js/maskTel.js"></script>
                        <script src="../assets/js/maskCel.js"></script>
                        <?php include "../includes/valida-email.php "; ?>
                        <?php include "../includes/valida-senha.php "; ?>
                        <?php include "../includes/imagem_viewer.php"; ?>


                    </form>
                </div>
            </div>
        </div>
    </div>

</body>