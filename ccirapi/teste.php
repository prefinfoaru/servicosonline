<?php

// $curl = curl_init();

// curl_setopt_array($curl, array(
//     CURLOPT_URL => 'https://gateway.apiserpro.serpro.gov.br/consulta-ccir-trial/v1/consultarDadosCcirPorCodigoImovel/12345678900?cpfCnpj=22222222222',
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => '',
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 0,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => 'GET',
//     CURLOPT_HTTPHEADER => array(
//         'x-signature: 1',
//         'Authorization: Bearer Bearer 06aef429-a981-3ec5-a1f8-71d38d86481e'
//     ),
// ));

// $response = curl_exec($curl);
// $info = curl_getinfo($curl);
// curl_close($curl);
// if ($info["http_code"] != '200') {
//     echo 'Ocorreu um erro<br>';
// } else {

//     echo $response;
// }
$curl = curl_init();
//Criptografando a Consumer Key e Consumer Secret conforme é solicitado na API
$key = base64_encode("kRLp5DV451EP56LjhEm7bRAWez0a:8MDhcGSqTogBqiHImcyRqzrGwvca");
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://gateway.apiserpro.serpro.gov.br/token',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Basic ' . $key . ''
    ),
));
$response = curl_exec($curl);
$info = curl_getinfo($curl);
curl_close($curl);
echo $response;
