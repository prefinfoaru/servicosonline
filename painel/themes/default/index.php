<div id="layout-content">
    <?php
    /*
     * ADAPTADO POR EDSON MORETTI -> www.edsonmoretti.com.br | contato@edsonmoretti.com.br
     */
    // Get the contents of the JSON file 
    if (!file_exists("config.json")) {
        echo 'Arquivo config.json não encontrado';
        return;
    }
    $c = file_get_contents("config.json");
    // Convert to array 
    $config = json_decode($c, true);
    $tipo = $config['tipo'];
    $dadoDoVideo = $config['dadoDoVideo'];
    switch ($tipo) {
        case 'm3u':
    ?>
            <iframe id="slides-container" src="chrome-extension://ckblfoghkjhaclegefojbgllenffajdc/player.html#<?php echo $dadoDoVideo; ?>" frameborder="0"></iframe>
        <?php
            break;
        case 'youtube':
        ?>
            <iframe id="slides-container" src="https://www.youtube.com/embed/Vf5RYnZZ3fM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
            <!-- <iframe  id="slides-container" src="https://www.youtube.com/embed?listType=playlist&list=<?php echo $dadoDoVideo; ?>&hl=pt&cc_lang_pref=pt&cc_load_policy=0&fs=0&mute=1&controls=0&autoplay=1&loop=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
        <?php
            break;
        case 'local':
        ?>
            <iframe id="slides-container" scrolling="no" src="./themes/default/videos/index.php" frameborder="0"></iframe>
    <?php
            break;
    }
    ?>
    <div id="barra-lateral">
        <div id="senha-container">
            <div id="logo">
                <img src="./img/logo.png">
            </div>
            <hr id="dividir">
            <div id="mensagem">

                <!-- MOSTRAR O NOME DO SERVIÇO-->
                <!-- <span>  {{ ultima.servico }}</span> -->
                <span>{{ ultima.mensagem }}</span>
            </div>
            <div class="row">
                <div>
                    <div id="senha" class="blink">
                        <span>{{ ultima.texto }}</span>
                    </div>
                </div>
                <div>
                    <div id="local" class="local">
                        <span>{{ ultima.local }}</span>
                    </div>
                    <div id="local-numero" class="numero-local">
                        <span>{{ ultima.numeroLocal }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="separador"></div>
        <div id="relogio-container">
            <iframe id="relogio" src="https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/painel/themes/default/relogio/index.htm" frameborder="0" scrolling="no"></iframe>
        </div>
    </div>
    <div id="historico">
        <div class="senhas">
            <div class="col-sm-3 senha-chamada {{ senha.styleClass }}" ng-repeat="senha in historico | limitTo: 4">
                <div class="nome">
                    <span> {{ senha.nomeCliente }}</span>
                </div>
                <div class="senha">
                    <span>{{ senha.texto }}</span>
                </div>
                <div class="local">
                    <span>{{ senha.local }}: {{ senha.numeroLocal }}</span>
                </div>
            </div>
        </div>
    </div>
</div>