<?php
error_reporting(E_ALL);

/* Habilita a exibição de erros */
ini_set("display_errors", 1);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/ccirapi/api/auth/logar',
  CURLOPT_SSL_VERIFYPEER => 0,

	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POST => true,

  CURLOPT_POSTFIELDS => array('usuario' => 'viniciusol','password' => '#CCIRUSOINTERNOPREF@'),
));

$response = curl_exec($curl);

curl_close($curl);
var_dump($response) ;


