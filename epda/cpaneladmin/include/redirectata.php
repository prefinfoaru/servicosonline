<?php


echo $buscar = $_POST['buscar'];
echo header('Location: http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/epda/cpaneladmin/index.php?p=atafinal&?protocolo='.$buscar);