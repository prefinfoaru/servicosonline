<?php
    function buscaValoresCred($valor){
        for($i=1;$i<=12;$i++)
        {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://cliente.hysoft.com.br/Services/Ecommerce/v2/Simulator?Amount=".$valor."&Installments=".$i."&MethodPaymentId=2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Basic OTk1MTpGQTZDOTY1RS05MkM3LTQ3NDEtOUY0OC1DREZBQTRENTc0QTk="
            ),
            ));
            $response =  json_decode(curl_exec($curl));
            curl_close($curl);
            echo "<tr> <td> R$" .number_format($response->amount,2,",","."). " </td>";
            echo " <td> R$" .number_format( $response->amoutToPay,2,",","."). " </td>";
            echo " <td>" . $response->installments. " </td></tr>";
        }
        return $response;
    }
    function buscaValoresDeb($valor){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://cliente.hysoft.com.br/Services/Ecommerce/v2/Simulator?Amount=".$valor."&Installments=1&MethodPaymentId=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Basic OTk1MTpGQTZDOTY1RS05MkM3LTQ3NDEtOUY0OC1DREZBQTRENTc0QTk="
            ),
        ));
        $response =  json_decode(curl_exec($curl));
        curl_close($curl);
        echo "<tr> <td> R$" .number_format($response->amount,2,",","."). " </td>";
        echo " <td> R$" .number_format( $response->amoutToPay,2,",","."). " </td>";
        echo "</tr>";
        return $response;
    }
?>