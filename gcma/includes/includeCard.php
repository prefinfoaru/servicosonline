<?php

$sql = $pdo->query("SELECT * FROM bd_gcma.tb_card");

foreach ($sql as $card) {
  if ($card['possui_url'] == 'sim') {
    echo '
      <div class="col-md-3 mb-3">
        <a class="link-card" href="' . $card['url'] . '" target="blank">
          <div class="card card-index">
            <div class="card-body text-center rounded">
              <span class="text-dark-blue"><i class="' . $card['icone'] . '"></i></span>
              <div class="card-text">
                ' . $card['texto'] . '
              </div>
            </div>
          </div>
        </a>
      </div>
    ';
  } else {
    echo '
      <div class="col-md-3 mb-3">
        <div class="card card-index">
          <div class="card-body text-center rounded">
            <span class="text-dark-blue"><i class="' . $card['icone'] . '"></i></span>
            <div class="card-text">
              ' . $card['texto'] . '
            </div>
          </div>
        </div>
      </div>
    ';
  }
}
