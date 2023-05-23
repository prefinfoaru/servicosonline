<?php include "../includes/topo_formcad_usuario.php"; ?>

<div class="container">

    <form class="form-horizontal" method="post" action="../data/insert/insert_dados_cadastrais.php">

        <!--CABEÇARIO -->
        <div class="panel panel-default">
            <h2><i class='far fa-address-card' style='font-size:36px'></i>Dados Cadastrais </h2><i
                style="color: #E77577">
                <h11>* Campo Obrigatório</h11>
            </i>
            <hr>

            <div class="form-group" align="center">
                <label class="col-md-1 control-label" for="Nome">&nbsp;&nbsp;Nome <h11>*</h11></label>
                <div class="col-md-10">
                    <input id="Nome" name="Nome" placeholder="Digite seu nome Completo" class="form-control" required=""
                        type="text" style="width: 98%">
                </div>
            </div>
            <!-- GRUPO **************************************************************************************************************************************************************************-->
            <div class="form-group" align="center">
                <label class="col-md-1 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;CPF <h11>*</h11>
                </label>
                <div class="col-md-2">
                    <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required=""
                        type="text" maxlength="14" style="width: 98%">
                </div>

                <label class="col-md-2 control-label" for="Nome" style="text-align: center">&nbsp;&nbsp;PIS /
                    NIS</label>
                <div class="col-md-2">
                    <input id="pis" name="pis" placeholder="Digite o seu PIS" class="form-control input-md" type="text"
                        style="width: 98%" maxlength="11">
                </div>

                <label class="col-md-1 control-label" for="Nome" style="text-align: left">Nascimento<h11>* &nbsp;</h11>
                </label>
                <div class="col-md-3">
                    <input id="dtnasc" name="dtnasc" placeholder="Informe a data do seu nascimento"
                        class="form-control input-md" required="" type="date" maxlength="10"
                        OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()" style="width: 98%">
                </div>
            </div>

            <div class="form-group" align="center">


                <label class="col-sm-1 control-label" for="Sexo" style="text-align: center">Sexo <h11>*</h11></label>
                <div class="col-md-3">
                    <select id="sexo" name="sexo" class="form-control" style="width: 97%" onChange="optionGenero()"
                        required>
                        <option>Masculino</option>
                        <option>Feminino</option>
                        <option>Homem Transgênero</option>
                        <option>Mulher Transgênero</option>
                        <option>Homem Transexual</option>
                        <option>Mulher Transexual</option>
                        <option>Cisgênero</option>
                        <option>Não sei responder</option>
                        <option>Prefiro não responder</option>
                        <option>Outros</option>
                    </select>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label" for="Estado Civil" style="text-align: center">Estado Civil
                        <h11>*</h11>
                    </label>
                    <div class="col-md-4">
                        <select id="Estado_Civil" name="Estado_Civil" class="form-control" style="width: 93%" required>
                            <option value="Solteiro(a)">Solteiro(a)</option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Divorciado(a)">Divorciado(a)</option>
                            <option value="Viuvo(a)">Viuvo(a)</option>
                            <option value="União estável">União estável</option>
                        </select><br>
                    </div>
                </div>

                <div class="form-group" id="Homem_transgenero_div" style="display: none">
                    <label class="col-md-2 control-label" for="Nome Usual" style="text-align: center">Nome Usual <h11>*
                        </h11></label>
                    <div class="col-md-9">
                        <input id="Homem_transgenero" name="NomeUsual" placeholder="Informe o seu nome"
                            class="form-control input-md" type="text" style="width: 93%" disabled><br>
                    </div>
                </div>
                <div class="form-group" id="Mulher_transgenero_div" style="display: none">
                    <label class="col-md-2 control-label" for="Nome Usual" style="text-align: center">Nome Usual <h11>*
                        </h11></label>
                    <div class="col-md-9">
                        <input id="Mulher_transgenero" name="NomeUsual" placeholder="Informe o seu nome"
                            class="form-control input-md" type="text" style="width: 93%" disabled><br>
                    </div>
                </div>
                <div class="form-group" id="Homem_transexual_div" style="display: none">
                    <label class="col-md-2 control-label" for="Nome Usual" style="text-align: center">Nome Usual <h11>*
                        </h11></label>
                    <div class="col-md-9">
                        <input id="Homem_transexual" name="NomeUsual" placeholder="Informe o seu nome"
                            class="form-control input-md" type="text" style="width: 93%" disabled><br>
                    </div>
                </div>
                <div class="form-group" id="Mulher_transexual_div" style="display: none">
                    <label class="col-md-2 control-label" for="Nome Usual" style="text-align: center">Nome Usual <h11>*
                        </h11></label>
                    <div class="col-md-9">
                        <input id="Mulher_transexual" name="NomeUsual" placeholder="Informe o seu nome"
                            class="form-control input-md" type="text" style="width: 93%" disabled><br>
                    </div>
                </div>

                <div class="form-group" align="center">
                    <label class="col-md-1 control-label" for="Nome" style="text-align: right">&nbsp;&nbsp;Cel<h11>*
                        </h11></label>
                    <div class="col-md-3">
                        <input id="phone" name="cel" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);"
                            placeholder="Informe o número do celular" class="form-control input-md" required=""
                            type="text" maxlength="15" style="width: 90%">
                    </div>

                    <label class="col-md-3 control-label" for="Nome"
                        style="text-align: center">&nbsp;&nbsp;Telefone</label>
                    <div class="col-md-4">
                        <input id="tel" name="tel" placeholder="Informe o número do telefone"
                            class="form-control input-md" type="text" maxlength="14" style="width: 90%">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-1 control-label" for="Nome" style="text-align: right">Outros
                        Cont</label>
                    <div class="col-md-10">
                        <input name="outrosCont" placeholder="Informe outros contatos" class="form-control input-md"
                            type="text" maxlength="100" style="width: 98%">
                    </div>


                </div>
                <!-- Search input-->
                <div class="form-group">
                    <label class="col-md-1 control-label" for="CEP" style="text-align: right">Cep <h11>*</h11></label>
                    <div class="col-md-4">
                        <input id="cep" name="cep" onblur="pesquisacep(this.value)" placeholder="Apenas números"
                            class="form-control input-md" required="" value="" type="search" maxlength="8"
                            pattern="[0-9]+$" style="width: 90%"><br>
                    </div>
                </div>

                <!-- Prepended text-->
                <div class="form-group" style="width: 98%">
                    <label class="col-md-1 control-label" for="prependedtext"></label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Rua</span>
                            <input id="rua" name="rua" class="form-control" placeholder="" required=""
                                readonly="readonly" type="text" style="width: 100%">
                        </div>

                    </div>

                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-addon">Nº <h11>*</h11></span>
                            <input id="numero" name="numero" class="form-control" placeholder="" required="" type="text"
                                style="width: 100%">
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Complemento </span>
                            <input id="complemento" name="complemento" class="form-control" placeholder="" type="text"
                                style="width: 100%">
                        </div>

                    </div>
                </div>

                <div class="form-group" style="width: 98%">
                    <label class="col-md-1 control-label" for="prependedtext"></label>

                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Bairro</span>
                            <input id="bairro" name="bairro" class="form-control" placeholder="" required=""
                                readonly="readonly" type="text" style="width: 100%">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Cidade</span>
                            <input id="cidade" name="cidade" class="form-control" placeholder="" required=""
                                readonly="readonly" type="text" style="width: 100%">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-addon">Estado</span>
                            <input id="uf" name="estado" class="form-control" placeholder="" required=""
                                readonly="readonly" type="text" style="width: 100%">
                        </div>
                    </div>

                </div>
                <!-- DIVISÃO -->
                <div class="form-group" align="center">
                    <label class="col-md-2 control-label" for="radios">Habilitado <h11>*</h11></label>
                    <div class="col-md-1">
                        <label required="" class="radio-inline" for="radios-0">
                            <input name="habilitado"  value="sim" type="radio" required>
                            SIM
                        </label>
                        <label class="radio-inline" for="radios-1">
                            <input name="habilitado"  value="não" type="radio">
                            NÃO
                        </label>
                    </div>

                    <label class="col-md-2 control-label" for="radios">Categoria<h11>*</h11></label>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control habilitado" id="sel1" name="categoria" disabled
                                style="width: 85%">
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                                <option>E</option>
                                <option>A - B</option>
                                <option>A - C</option>
                                <option>A - D</option>
                                <option>A - E</option>
                            </select>
                        </div>
                    </div>

                    <label class="col-md-2 control-label" for="radios">Veículo próprio <h11>*</h11></label>
                    <div class="col-md-1">
                        <label required="" class="radio-inline" for="radios-0">
                            <input name="veiculo"  value="sim" type="radio" required>
                            SIM
                        </label>
                        <label class="radio-inline" for="radios-1">
                            <input name="veiculo"  value="não" type="radio">
                            NÃO
                        </label>
                    </div>
                </div>

                <div class="form-group" align="center">
                    <label class="col-md-2 control-label" for="radios">Disponibilidade para viagem <h11>*</h11></label>
                    <div class="col-md-1">
                        <label required="" class="radio-inline" for="radios-0">
                            <input name="viagem"  value="sim" type="radio" required>
                            SIM
                        </label>
                        <label class="radio-inline" for="radios-1">
                            <input name="viagem"  value="não" type="radio">
                            NÃO
                        </label>
                    </div>

                    <label class="col-md-3 control-label" for="radios">Disponibilidade mudar de cidade<h11>*</h11>
                    </label>
                    <div class="col-md-1">
                        <label required="" class="radio-inline" for="radios-0">
                            <input name="mudar"  value="sim" type="radio" required>
                            SIM
                        </label>
                        <label class="radio-inline" for="radios-1">
                            <input name="mudar"  value="não" type="radio">
                            NÃO
                        </label>
                    </div>

                </div>
            </div>
            <hr>

            <div class="container form-group" align="center">
                <label class="col-md-1 control-label" for="prependedtext">Email <h11>*</h11></label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="email" name="email" class="form-control" placeholder="email@email.com" required=""
                            type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                    </div>
                </div> <label class="col-md-2 control-label" for="prependedtext">Confirmar Email <h11>*</h11></label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="confirm_email" name="confirm_email" class="form-control"
                            placeholder="email@email.com" required="" type="text"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" onChange="validateEmail()">
                    </div>
                </div>
            </div>

            <div class="container form-group">
                <label class="col-md-1 control-label" for="prependedtext">Senha <h11>*</h11></label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" autocomplete="off" type="password" class="form-control" name="password" placeholder="Senha"
                            required="">
                    </div>
                </div> <label class="col-md-2 control-label" for="prependedtext">Confirmar Senha <h11>*</h11></label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="confirm_password" type="password" class="form-control" name="confirm_password"
                            placeholder="Password" autocomplete="off" required="" onChange="validatePassword()">
                    </div>
                </div>
            </div>
            <hr>
            <div class="container form-group" style="text-align: center;">
                <b>Termo de uso do Site</b>
            </div>
            <div class="container form-group" style="text-align: center;">
                <textarea style="width:90%;min-height:300px; resize: none;" disabled>Termo de Uso

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
                <label class="form-check-label" for="exampleCheck1" style="text-align:center">Concordo com os
                    termos</label>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-1 control-label" for="Cadastrar"></label>
                <div class="col-md-8">
                    <button id="btnSave" name="btnSave" class="btn btn-success" type="Submit">Cadastrar</button>
                    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                </div>
            </div>

            <!-- HABILITAR E DESABILITAR INPUT DE CATEGORIA DA CNH -->
            <script>
            const radios = document.querySelectorAll("[name='habilitado']");
            const social = document.querySelectorAll(".habilitado");

            for (let i of radios) {
                i.onchange = function() {
                    for (let x of social) {
                        x.disabled = i.value == "sim" ? false : true;
                    }
                }
            }
            </script>
            <script src="../assets/js/maskTel.js"></script>
            <script src="../assets/js/maskCel.js"></script>
            <?php include "../includes/condicao_sexo.php "; ?>
            <?php include "../includes/valida-email.php "; ?>
            <?php include "../includes/valida-senha.php "; ?>
            <script src="../includes/valida_cpf_cnpj.js"></script>
            <script src="../includes/corrige_cpf_cnpj.js"></script>
            <script src="../assets/js/validacaocep.js"></script>
        </div>
</div>