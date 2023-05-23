<?php

namespace Apps\Http\Controllers;

use Apps\Http\Models\AuthApi;
use Exception;

class AuthApiController
{
    public static function logar()
    {
        if (AuthController::checkauth()) {
            try {
                return  AuthApi::apisearch();
            } catch (Exception $e) {
                throw new \Exception("Ocorreu um erro " . $e);
            }
        }
        throw new \Exception("Desculpe, mas você não tem permissão para acessar");
    }
}
