<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Curriculo</title>
     <!-- Font Icon -->
     <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./assets/js/valida_cpf_cnpj.js"></script>
    <script src="./assets/js/corrige_cpf_cnpj.js"></script>
    <script src="./assets/js/mascaras.js"></script>
  
</head>
<body>
<?php include('padrao/header.php');?>
<div class="main">
<div class="container">
    <div class="signup-content">
        <div class="signup-img">
            <img src="assets/img/lateral.png" alt="">
            <div class="signup-img-content">
               
            </div>
        </div>
        <div class="signup-form">
            <form method="POST" class="register-form" id="register-form">
                <div class="form-row">
                    <div class="form-group">
                         <div class="form-input">
                            <label for="cpf" class="required">CPF</label>
                            <input type="text" name="cpf" id="cpf" />
                        </div>
                        <div class="form-input">
                            <label for="nome" class="required">Nome Completo</label>
                            <input type="text" name="nome" id="nome" />
                        </div>
                        <div class="form-input">
                            <label for="data" class="required">Data de Nascimento</label>
                            <input type="date" name="data" id="data" />
                        </div>
                        <div class="form-input">
                            <label for="email" class="required">E-mail</label>
                            <input type="email" name="email" id="email" />
                        </div>
                        <div class="form-input">
                            <label for="confirmar" class="required">Confirmar E-mail</label>
                            <input type="email" name="confirmar" id="confirmar" />
                        </div>
                        <div class="form-input">
                            <label for="telefone" class="required">Telefone</label>
                            <input type="text" name="celular" id="celular" />
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="form-input">
                            <label for="genero" class="required">Gênero</label>
                            <select name="genero" class="genero">
                                <option value="masculino" class="genero">Masculino</option>
                                <option value="feminino" class="form-group">Feminino</option>
                            </select>
                        </div>
                        <div class="form-select">
                            <div class="form-input">
                                <label for="cep" class="required">Cep</label>
                                <input type="text" name="cep" id="cep" />
                            </div>
                            <div class="form-input">
                                <label for="endereco" class="required">Endereço</label>
                                <input type="text" name="endereco" id="endereco" />
                            </div>
                        </div>
                        <div class="form-radio">
                            <div class="form-input">
                                <label for="numero" class="required">Numero</label>
                                <input type="text" name="numero" id="numero" />
                            </div>
                            <div class="form-input">
                                <label for="complemento" class="required">Complemento</label>
                                <input type="text" name="complemento" id="complemento" />
                            </div>
                        </div>
                        <div class="form-input">
                                <label for="bairro" class="required">Bairro</label>
                                <input type="text" name="bairro" id="bairro" />
                            </div>      
                    </div>
                </div>
                <div class="form-submit">
                    <input type="submit" value="Enviar" class="submit" id="submit" name="submit" />
                    <input type="submit" value="Limpar" class="submit" id="reset" name="reset" />
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</body>

</html>
<?php include('padrao/footer.php');?>