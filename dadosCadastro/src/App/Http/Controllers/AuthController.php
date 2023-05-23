<?php

namespace  Apps\Http\Controllers;

use Apps\Http\Models\Auth;

class AuthController
{
    public function logar()
    {
        // return Auth::verifyuser($_POST);
        if (!empty($_POST) && Auth::verifyuser($_POST) == true) {
            //Application Key
            $today = date('Y-m-d');
            $key = 'aaaa' . $today;
            //Header Token
            $header = [
                'typ' => 'JWT',
                'alg' => 'HS256'
            ];

            //Payload - Content
            $payload = [
                'name' => "$_POST[usuario]",
            ];

            //JSON
            $header = json_encode($header);
            $payload = json_encode($payload);

            //Base 64
            $header = base64_encode($header);
            $payload = base64_encode($payload);

            //Sign
            $sign = hash_hmac('sha256', $header . "." . $payload, $key, true);
            $sign = base64_encode($sign);

            //Token
            $token = $header . '.' . $payload . '.' . $sign;

            return $token;
        }
        throw new \Exception('Não Autenticado');
    }
    public  static function checkauth()
    {
        $httpHeader = apache_request_headers();

        if (isset($httpHeader['Authorization']) && $httpHeader['Authorization'] != null) {
            $today = date('Y-m-d');
            $bearer = explode(' ', $httpHeader['Authorization']);
            $token = explode('.', $bearer[1]);
          
            // var_dump($bearer);
            // var_dump($token);
            $header = $token[0];
            $payload = $token[1];
            $sign = $token[2];

            $key = 'aaaa' . $today;
            //Confirm Sign
            $valid = hash_hmac('sha256', $header . "." . $payload, $key, true);
            $valid = base64_encode($valid);
            $sign=stripslashes($sign);
      
            if ($sign === $valid) {
                return true;
            }
        }
        return false;
    }
}
