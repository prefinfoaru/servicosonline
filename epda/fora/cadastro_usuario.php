<?php
session_start();
include 'select.php';
include 'fuction.php'; ?>
<meta charset="utf-8">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">

        <div align="center">
            <h2 style="color:#114A6F ; font-size: 15px;"><img src="cpanel/img/brasao/brasão.png" width="50px" height="70px"><br>Horas Extra<br> <i style="font-size: 10px">(SISTEMA DE GERENCIAMENTO DE DOCUMENTOS ENTRE A EDUCAÇÃO E O RH)</i></h2>
        </div>


        <div class="panel-group" id="accordion">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDadosGerais">
                            Dados Profissionais
                        </a>
                    </h4>
                </div>

                <div id="collapseDadosGerais" class="panel-collapse collapse in">
                    <div class="panel-body">

                        <form action="salva_cadastro.php" method="post" required>
                            <div class="row">

                                <div class="col-xs-2">
                                    <label>Matrícula:</label>
                                    <input type="text" class="form-control" name="matricula" required placeholder="Matrícula">
                                </div>

                                <div class="col-xs-10">
                                    <label>Nome:</label>
                                    <input type="text" class="form-control" id="logradouro" name="nome" required placeholder="Nome Completo">
                                </div>



                                <div class="col-xs-6">
                                    <label>Função:</label>
                                    <select class="form-control" id="sel1" name="funcao" required>
                                        <option value="">Selecione uma Função</option>
                                        <?php
                                        foreach ($pdo->query($sql) as $row) { ?>

                                            <option value="<?php echo utf8_encode($row['funcao']); ?>"><?php echo utf8_encode($row['funcao']); ?></option>


                                        <?php

                                        }
                                        ?>

                                    </select>
                                </div>

                                <div class="col-xs-3">
                                    <label>Regime:</label><BR>
                                    <input type="radio" name="regime" value="CLT">CLT </input>&nbsp;&nbsp;
                                    <input type="radio" name="regime" value="MAGISTRADO">MAGISTRADO
                                </div>

                                <div class="col-xs-3">
                                    <label>Carga Horária:</label>
                                    <select class="form-control" id="sel1" name="carga" required>
                                        <option value="">Selecione uma Carga Horária</option>
                                        <?php
                                        foreach ($pdo->query($sql2) as $row) { ?>

                                            <option value="<?php echo utf8_encode($row['carga']); ?>"><?php echo utf8_encode($row['carga']); ?></option>


                                        <?php

                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>

                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseLocalizacao">
                            Dados para Contato:
                        </a>
                    </h4>
                </div>

                <div id="collapseLocalizacao" class="panel-collapse collapse in">
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-xs-2">
                                <label>Tel/cel:</label>
                                <input type="text" name="tel" id="tel" class="form-control" maxlength="15" required="" />

                            </div>

                            <div class="col-xs-6">
                                <label>Email:</label>
                                <input type="email" class="form-control" name="email" value="" required>
                                <span class="help-block" style="color: red">* Todas a Movimentações e Protocolos seram enviadas ao email cadastrado.</span>
                            </div>



                        </div>

                    </div>
                </div>


            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSocial">
                            Cadastro de Acesso
                        </a>
                    </h4>
                </div>
                <div id="collapseSocial" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-xs-5">
                                <label>Digite uma Senha</label>
                                <input type="password" class="form-control" id="site" name="senha1" pattern="[a-zA-Z0-9]+" required>
                            </div>

                            <div class="col-xs-5">
                                <label>Observações</label>
                                <i style="color:#908E8E">* Para cadastro da Senha seguir a informações abaixo:</i><br>
                                <i style="color:#908E8E ">- Não conter nenhuma ancentuação ou caracter especial <br>
                                    - Somente conter Letras e Numeros</i>
                            </div><br><br><br><br>

                            <?php
                            if (isset($_SESSION['msg'])) {
                                echo '<div class="alert alert-Danger style="text-align: center">' . $_SESSION['msg'] . '</div>';
                                unset($_SESSION['msg']);
                            }
                            if (isset($_SESSION['msg2'])) {
                                echo '<div class="alert alert-success style="text-align: center">' . $_SESSION['msg2'] . '</div>';
                                unset($_SESSION['msg2']);
                            }
                            ?>
                            <div id="campo_login"> </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- panel-group -->
        </div>

        <br />
        <button type="submit" class="btn btn-default">Salvar</button>

        <a href="index.php" class="btn btn-danger " role="button">voltar</a>
        </form>

    </div>
</div>