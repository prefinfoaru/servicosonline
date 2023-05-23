<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'data/banco.php';

// Seleciona os IDs e emails
$queryEmails = "SELECT * FROM bd_emprega_aruja.tb_cadastro_solicitante";

$i = 0;

foreach ($pdo->query($queryEmails) as $rowEmail)
{
    echo 'entrou no foreach';

    $id = $rowEmail['id_solicitante'];

    // Selecioa o nível hierarquico desejado pelo solicitante
    $queryHieraquia = $pdo->query("SELECT   
                                    np.id_nivel_profissional, 
                                    np2.id_nivel_profissional
                                        FROM 
                                            tb_objetivo_profissional as op
                                        INNER JOIN
                                            tb_pre_nivel_profissao as np
                                            ON op.nivel_hierarquico_minimo = np.tb_nivel_hierarquico
                                        INNER JOIN
                                            tb_pre_nivel_profissao as np2
                                            ON op.nivel_hierarquico_maximo = np2.tb_nivel_hierarquico
                                            AND op.id_solicitante = $id ORDER BY op.id_obj_prof DESC LIMIT 1");
    $rowHierarquia = $queryHieraquia->fetch();

    $hierarquia_minima = $rowHierarquia[0];
    $hierarquia_maxima = $rowHierarquia[1];

    // Seleciona a vaga de acordo com o nível hierarquico
    $queryVagas = "SELECT
                    cv.id_vaga,
                    cv.titulo,
                    cv.salario,
                    cv.descricao
                        FROM
                            tb_cadastro_vaga as cv
                        INNER JOIN
                            tb_pre_nivel_profissao as np
                            ON cv.hierarquia = np.tb_nivel_hierarquico
                            WHERE cv.status = 1 
                            AND np.id_nivel_profissional BETWEEN $hierarquia_minima AND $hierarquia_maxima
                                ORDER BY cv.data DESC LIMIT 3";
    $vagas = array();

    foreach ($pdo->query($queryVagas) as $row)
    {
        $vaga = '<div class="row">
                    <div>
                        <p>
                            <a href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/adminusuario/pages/loginvisu_vaga.php?vaga='.$row['id_vaga'].'&?ret=home" target="blank"><strong style="color: #3498db;">'.strtoupper($row['titulo']).'</strong></a> <span class="text-muted"> - Salário R$: '.$row['salario'].'</span> <br>
                            <p class="text-muted">'.substr(strip_tags($row['descricao']), 0, 97).'...</p>
                        </p>
                    </div>
                </div>';
        array_push($vagas, $vaga);
    }

    // echo $vagas[0];
    // echo $vagas[1];
    // echo $vagas[2];


    // Load Composer's autoloader
    require 'PHPMailer/vendor/autoload.php';

    $mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host         = 'smtp.office365.com';                   // Set the SMTP server to send through
    $mail->SMTPAuth     = true;                                   // Enable SMTP authentication
    $mail->Username     = 'noreply@aruja.sp.gov.br';              // SMTP username
    $mail->CharSet      = 'utf-8';
    $mail->Password     = 'Cds#info#2021@';                       // SMTP password
    $mail->SMTPSecure   = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port         = 587;


    $mail->Subject    = "Alerta de Vagas";
    $mail->From       = "dipam@aruja.sp.gov.br";
    $mail->FromName   = "Prefeitura do Municipio de Arujá";
    $mail->AddEmbeddedImage('assets/img/logotipo.png', 'Logotipo');

    //Corpo da Mensagem

    $mensagem = '


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta -equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .container
            {
                width: 500px;
                border-radius: 6px;
                margin: auto;
                margin-top: 12px;
                margin-bottom: 18px;
                padding-top: 2px;
                padding-bottom: 3px;
            }
            .row
            {
                padding-left: 16px;
            }
            .mt-1
            {
                margin-top: 15px;
            }
            .float-left
            {
                float: left;
                margin-right: 9px;
                border-radius: 4px;
            }
            .cbtn-00
            {
                background: #3498db;
                color: #ffffff;
                border: none;
                padding: 11px;
                border-radius: 4px;
                font-size: 15px;
                transition: 0.4s;
            }
            .cbtn-00:hover
            {
                background: #035397;
                cursor: pointer;
            }
            .title
            {
                font-size: 30px;
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                color: #3498db;
            }
            .text-muted
            {
                color: #989597;
            }
            .text-secondary
            {
                color: #6f7880;
            }
            .bg-00
            {
                background: #f4f4f4;
            }
            .bg-01
            {
                background: #3498db;
            }
            .bg-02
            {
                background: #ffffff;
            }
            .cmxy
            {
                margin-top: 40px;
                margin-bottom: 14px;
            }
            a
            {
                text-decoration: none;
            }
            a:hover
            {
                text-decoration: underline;
                color: #3498db;
            }
            p
            {
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            }
            hr
            {
                border: 0;
                height: 1px;
                background: #cccc;
                background-image: linear-gradient(to right, #fffcfc, #ccc3, #fffcfc);
                width: 470px;
            }
            body
            {
                padding-top: 15px;
            }
        </style>
    </head>
    <body class="bg-00">

        <div class="container"></div>

        <div class="container bg-01" align="center">
            <img src="cid:Logotipo" alt="Logotipo" width="250px">
        </div>

        <div class="container bg-02">
            <div class="row">
                <p class="title">Alerta de vagas</p>
            </div>
            <hr>
            <div class="row">
                <p class="text-muted">
                    Reunimos as algumas vagas disponíveis para você dar uma olhada. Esperamos que encontre algo!
                </p>
            </div>
            <br>
            '.$vagas[0].'<br>'.$vagas[1].'<br>'.$vagas[2].'
            <br>
            <div class="row cmxy">
                <div align="center">
                    <a href="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/" target="blank"><button type="button" class="cbtn-00">Ver todas</button></a>
                </div>
            </div>
        </div>

        <div class="container">
            <hr>
            <div class="row">
                <div class="col-md-12" align="center">
                    <p class="text-secondary">Prefeitura Municipal de Arujá</p>
                </div>
            </div>
        </div>

    </body>
    </html>


    ';

    $mail->Body = $mensagem;
    $email = $rowEmail['email'];

    //Corpo da mensagem em texto
    $mail->AltBody = 'conteudo do E-mail em texto';
    $mail->addAddress($email);     // Add a recipient
    // Content
    $mail->isHTML(true);

    if ($mail->send())
    {
        echo 'enviado';
    }
    else
    {
        echo 'não enviado';
    }
}

?>