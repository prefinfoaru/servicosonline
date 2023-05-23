<?php

$sql1 = $pdo->query("SELECT * FROM bd_gcma.tb_carrosel ORDER BY id ASC LIMIT 1");
$img1 = $sql1->fetch();
$id1 = $img1['id'];

$sql2 = $pdo->query("SELECT * FROM bd_gcma.tb_carrosel");

echo '
  <div class="carousel-item active">
    <img src="'.$img1['imagem'].'" class="d-block w-100" alt="gcma">
  </div>
';

foreach ($sql2 as $img2) {
  if ($img2['id'] == $id1) {
    echo '';
  }else {
    echo '
      <div class="carousel-item">
        <img src="'.$img2['imagem'].'" class="d-block w-100" alt="gcma">
      </div>
    ';
  }
}
