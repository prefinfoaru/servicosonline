<!DOCTYPE html>
<html>

<head>

    <head>


        <?php
        require_once 'meta.php';
        alterarLinksLocais("footer", "servicos.prefeituradearuja.sp.gov.br", "10.1.1.21");
        alterarLinksLocais("footer", "srvlvr.prefeituradearuja.sp.gov.br", "10.2.2.55");
        ?>
        <link rel="stylesheet" href="css/climatempocptec.css" />
        <link rel="stylesheet" media="all" href="css/jquery.selectbox.css" />
        <link rel="stylesheet" href="css/skin.css" />
        <link rel="stylesheet" href="iptu2016/reemissaodecarneslista/css/iptu.css" />
        <link rel="stylesheet" href="css/css_aruja.css" />
        <link rel="stylesheet" href="css/lista-fotos.css" />
        <script src="js/jquery.jcarousel-configuracao.js"></script>
        <script src="js/jquery.selectbox-0.6.1.js"></script>
        <!--- -->

        <script src="iptu2016/reemissaodecarneslista/js/iniciarFormularioIptu.js"></script>

        <?php if (!testeInterno()) { ?>
            <script src="js/google-analytics.js"></script>
        <?php } ?>


        <!--
Data: 04/12/2017
Programador: Lincoln Lacerda de Carvalho
não utilizar jquery para o modal pois o site já faz uma chamada do arquivo em pmarujaweb\js\google-analytics.js -->



        <!--inico do modal  04/12/2017 -->
        <script type="text/javascript">
            $(document).ready(function() {

                var maskHeight = $(document).height();
                var maskWidth = $(window).width();

                $('#mask').css({
                    'width': maskWidth,
                    'height': maskHeight
                });

                $('#mask').fadeIn(1000);
                $('#mask').fadeTo("slow", 0.6);

                //Get the window height and width
                var winH = $(window).height();
                var winW = $(window).width();

                $('#dialog2').css('top', winH / 2 - $('#dialog2').height() / 2);
                $('#dialog2').css('left', winW / 2 - $('#dialog2').width() / 2);

                $('#dialog2').fadeIn(2000);

                $('.window .close').click(function(e) {
                    e.preventDefault();

                    $('#mask').hide();
                    $('.window').hide();

                });

                $('#mask').click(function() {
                    $(this).hide();
                    $('.window').hide();
                });

            });
        </script>


        <style type="text/css">
            #mask {
                position: absolute;
                left: 0;
                top: 0;
                z-index: 9000;
                background: #A9A9A9;


                display: none;
            }

            #boxes .window {
                position: absolute;
                left: 0;
                top: 0px;
                width: 100%;
                height: 100%;
                display: none;
                z-index: 9999;
                padding: 2px;
            }

            #boxes #dialog2 {
                width: 790px;
                height: 500px;

            }

            .close {
                display: block;
                text-align: right;
                font: normal 12px Verdana, Geneva, sans-serif;
                font-style: normal;
                color: #696969;
                background: #BECCCF;
                border: 1px solid #bbb;
                box-shadow: 0px 1px 10px #d1cfd1;
                -moz-box-shadow: 0px 1px 10px #d1cfd1;
                -webkit-box-shadow: 0px 1px 10px #d1cfd1;
                border-radius: 5px 5px 5px 5px;
                -moz-border-radius: 5px 5px 5px 5px;
                -webkit-border-radius: 5px 5px 5px 5px;
                padding: 15;
                margin-left: 720px;



            }

            #link {
                position: absolute;
                left: 0;
                top: 0;
                z-index: 9000;
                margin-top: 465px;
                margin-left: 300px;
                font-weight: 200;



            }

            #link2 {
                position: absolute;
                left: 0;
                top: 0;
                z-index: 9000;
                margin-top: 524px;
                margin-left: 198px;
            }


            #link3 {
                position: absolute;
                left: 0;
                top: 0;
                z-index: 9000;
                margin-top: 290px;
                margin-left: 18px;
                font: normal 12px Verdana, Geneva, sans-serif;

                color: black;



            }

            a:link {
                color: #464747;
                text-decoration: underline;
            }

            a:visited {
                color: #464747;
                text-decoration: underline;
            }

            a:hover {
                color: #464747;
                text-decoration: underline;
            }

            a:active {
                color: #464747;
                text-decoration: underline;
                background-color: #000000;
            }


            #myImg {
                border-radius: 5px;
                cursor: pointer;
                transition: 0.3s;
            }

            #myImg:hover {
                opacity: 0.7;
            }

            /* The Modal (background) */
            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                padding-top: 100px;
                /* Location of the box */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.9);
                /* Black w/ opacity */
            }

            /* Modal Content (image) */
            .modal-content {
                margin: auto;
                display: block;
                width: 80%;
                max-width: 700px;
            }

            /* Caption of Modal Image */
            #caption {
                margin: auto;
                display: block;
                width: 80%;
                max-width: 700px;
                text-align: center;
                color: #ccc;
                padding: 10px 0;
                height: 150px;
            }

            body {
                font-family: Arial, Helvetica, sans-serif;
            }

            #myImg {
                border-radius: 5px;
                cursor: pointer;
                transition: 0.3s;
            }

            #myImg:hover {
                opacity: 0.7;
            }

            /* The Modal (background) */
            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                padding-top: 100px;
                /* Location of the box */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.9);
                /* Black w/ opacity */
            }

            /* Modal Content (image) */
            .modal-content {
                margin: auto;
                display: block;
                width: 180%;
                max-width: 800px;
            }

            /* Caption of Modal Image */
            #caption {
                margin: auto;
                display: block;
                width: 80%;
                max-width: 700px;
                text-align: center;
                color: #ccc;
                padding: 10px 0;
                height: 150px;
            }

            /* Add Animation */
            .modal-content,
            #caption {
                -webkit-animation-name: zoom;
                -webkit-animation-duration: 0.6s;
                animation-name: zoom;
                animation-duration: 0.6s;
            }

            @-webkit-keyframes zoom {
                from {
                    -webkit-transform: scale(0)
                }

                to {
                    -webkit-transform: scale(1)
                }
            }

            @keyframes zoom {
                from {
                    transform: scale(0)
                }

                to {
                    transform: scale(1)
                }
            }

            /* The Close Button */
            .close2 {
                position: absolute;
                top: 15px;
                right: 35px;
                color: #f1f1f1;
                font-size: 40px;
                font-weight: bold;
                transition: 0.3s;
            }

            .close2:hover,
            .close2:focus {
                color: #bbb;
                text-decoration: none;
                cursor: pointer;
            }

            /* 100% Image Width on Smaller Screens */
            @media only screen and (max-width: 900px) {
                .modal-content {
                    width: 300%;
                }
            }

            a.nounderline:link {
                text-decoration: none;
            }
        </style>

    </head>

<body>


    <div id="boxes">


        <!-- Janela Modal com Bloco de Nota -->
        <div id="dialog2" class="window">

            <button type="button" class="close" data-dismiss="modal"> x Fechar </button>
            <!-- Tamanho do logo quando for alterado tem que alterar o  css  -->


            <!--- botão fechar -->

            <div id="link1">
                <!---<img src="imagens/Arrecadamento.png" width="850"  height="560"  />-->
                <img src="revisaoplanodiretor/img/planodiretor.png" width="750" height="500" />



                <div id="link">


                    <a href="revisaoplanodiretor/index.php" target="_blank" style="font-size: 18px;"><img src="imagens/botao.png" width="160" height="40"></a>


                </div>

                <div id="link2">

                    <!--<a href="http://www.prefeituradearuja.sp.gov.br/notice.php?Id=4919" target="_blank">Leia mais...</a>-->

                </div>

                <!---
      <div id="link3">
      	
      <a href="http://www.prefeituradearuja.sp.gov.br/notice.php?Id=4809" target="_blank"> NOT&Iacute;CIAS</a>
      
      </div>
       -->


            </div>



        </div>
        <!--    <img src="imagens/COVIDATUAL.png" >-->

    </div>
    <!-- Fim Janela Modal com Bloco de Nota com imagem  04/12/2017 -->

    <!-- Máscara para cobrir a tela -->
    <div id="mask"></div>
    <div class="container">
        <?php
        require_once 'header.php';
        require_once 'tabs.php';

        ?>



        <?php

        include 'covid.php';




        //	require_once 'exibenoticias.php';
        //	exibenoticias('gov',$db);
        ?>


    </div>
    <div class="body_content left">
        <div class="body_list_notice left">
            <span id="idcptec">
            </span>
        </div>
        <div class="body_services_online right">
            <div class="body_title_box left">Serviços On-line</div>
            <div id="wraper">
                <select id="default-usage-select">
                    <?php require_once 'services.php'; ?>
                </select>
                <select id="default-usage-select2">
                    <?php require_once 'servicespfreq.php'; ?>
                </select>
                <select id="default-usage-select3">
                    <?php require_once 'servicescomofazerpara.php'; ?>
                </select>
                <span class="text_under_select left">
                    <span class="text_under_select left">
                        <!-- Colocar Texto aqui --><br>
                        <!--	<img id="myImg" src="imagens/MeioAmbiente/residuos/Sem título-2.jpg" alt="" width="340px" height="180px"> <br> -->
                        <!--	<a href="http://arujapmgirs.wixsite.com/pmgirs" target="_blank"><img  src="imagens/MeioAmbiente/residuos/Sem título-2.jpg" alt="" width="340px" height="180px"></a> --><br>

                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                            <span class="close2">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                        </div>

                        <script>
                            // Get the modal
                            var modal = document.getElementById('myModal');

                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                            var img = document.getElementById('myImg');
                            var modalImg = document.getElementById("img01");
                            var captionText = document.getElementById("caption");
                            img.onclick = function() {
                                modal.style.display = "block";
                                modalImg.src = this.src;
                                captionText.innerHTML = this.alt;
                            }

                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close2")[0];

                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() {
                                modal.style.display = "none";
                            }
                        </script>


                        <?php require_once 'temporario.php'; ?>
                    </span>
            </div>
        </div>

        <div style="margin-top:-50px " class="body_main_people left">
            <span class="title_services_people left">Principais Serviços</span>


            <a class="main_services left" href="cadcestas/index.php" id="bg_main_people2" target="_blank" style="color: red">Cadastro Emergencial da Merenda Escolar</a>

            <a class="main_services left" href="https://docs.google.com/forms/d/e/1FAIpQLSePsGaFuya3ljzq95ndbRVmdeLW4iQKEE9ZWSYFpTtSuGlWhA/viewform" id="bg_main_people2" target="_blank" style="color: red">Cadastro de Artistas e Trabalhadores da Cultura</a>
            <a class="main_services left" href="https://docs.google.com/forms/d/e/1FAIpQLScqlaCiD4LzfRIZrHyl72gXqxE09n9Sn6Ed4cMGYyPDcYAx-Q/viewform" id="bg_main_people2" target="_blank" style="color: red">Cadastro de Espaços e Empresas Culturais</a>

            <a class="main_services left" href="morador/m_main1.php" id="bg_main_people1" target="_blank">Minha Casa</a>


            <a class="main_services left" href="negocios.php" id="bg_main_people" target="_blank">Minha Empresa</a>

            <!-- Alteração Efetuada em 08/01/2019 por Vinicius
					<a class="main_services left" href="morador/m_main2.php" id="bg_main_people2" target="_blank">Meus Impostos</a>
					-->
            <a class="main_services left" href="http://servicos.prefeituradearuja.sp.gov.br:8080/tbw/loginWeb.jsp?execobj=ServicosWebSite" id="bg_main_people2" target="_blank">Meus Impostos</a>


            <a class="main_services left" href="morador/m_main3.php" id="bg_main_people3" target="_blank">Minha Educação</a>

            <a class="main_services left" href="morador/m_main4.php" id="bg_main_people33" target="_blank">Minha Saúde</a>

            <a class="main_services left" href="morador/m_main5.php" id="bg_main_people34" target="_blank">Minha Assistência e Inclusão Social</a>

            <a class="main_services left" href="morador/m_main7.php" id="bg_main_people6" target="_blank">Meu Transporte e Meu Veículo</a>

            <a class="main_services left" href="morador/m_main6.php" id="bg_main_people7" target="_blank">Meu Emprego Minha Renda</a>

            <a class="main_services left" href="negocios/n_main4.php" id="bg_main_people9" target="_blank">Minha Vida Esportiva</a>

            <a class="main_services left" href="negocios/n_main8.php" id="bg_main_people8" target="_blank">Minha Rua</a>


            <span class="text_under_main left">
                <!-- Colocar Texto aqui -->
            </span>
        </div>
        <div class="body_meet_aruja left" style="height: 150px ; margin-top: 100px;">
            <span class="title_meet left">Conheça Arujá</span>
            <span class="text_meet left">
                Arujá é uma antiga povoação situada a nordeste da capital paulista,

                entre as serras da Cantareira e do Mar, junto à Rodovia Presidente Dutra,
                às margens do Ribeirão Baquirivu-Guaçu, afluente do rio Tietê.
            </span>
            <div class="left" id="lista-fotos">
                <ul>
                    <?php require_once 'php/index/lista-fotos.php'; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>
    </div>
    <!--Start of Tawk.to Script-->

    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();

        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];


            s1.async = true;
            s1.src = 'https://embed.tawk.to/5e71f3baeec7650c3320c63d/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);


        })();
    </script>



    <!--End of Tawk.to Script-->
    <script>
        $("#aciona-iptu").click(function() {
            iniciarFormularioIptu();
        });
    </script>
    <?php
    require_once 'iptu2016/reemissaodecarneslista/formulario.php';
    require_once 'php/index/configurar-selectbox.php';
    require_once 'cabecalhofancybox.php';
    ?>

</body>

</html>