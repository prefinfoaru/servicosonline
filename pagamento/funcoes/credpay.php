<?php

function credPayInfo($valor)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_URL => "https://gw2-homolog.credpay.com.br/api/simulador/obterTaxas",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{  \r\n    \"valor\": $valor,\r\n    \"servico\": 1\r\n}",
        CURLOPT_HTTPHEADER => array(
            "x-api-key: 1c30434a-5a92-42c6-86db-a7d635a98a02",
            "Content-Type: application/json",
            "Cookie: connect.sid.gateway=s%3AMnLugb0R1MJZE9rOOMsLuI3-d-VQHWox.2s%2B8tXXYdP4U8Odc6NKzq3HG6c2JZIpUD73BzXfK8FE"
        ),
    ));
    $response =  json_decode(curl_exec($curl));
    curl_close($curl);
    return $response;
}

$response = credPayInfo($valor);


function credPayCred()
{
    global $response;

    for ($i = 11; $i >= 0; $i--) {
        echo "<tr> <td> R$" . number_format($response->valor, 2, ",", ".") . " </td>";
        echo " <td> R$" . number_format($response->credito[$i]->valorTotal, 2, ",", ".") . " </td>";
        echo " <td>" . $response->credito[$i]->parcela . " </td></tr>";
    }
}

function credPayDeb()
{
    global $response;
    foreach ($response->debito as $parcela) {
        echo "<tr> <td> R$" . number_format($response->valor, 2, ",", ".") . " </td>";
        echo " <td> R$" . number_format($parcela->valorTotal, 2, ",", ".") . " </td>";
    }
}
