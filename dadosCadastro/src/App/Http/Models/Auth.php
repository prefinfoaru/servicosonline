<?php

namespace Apps\Http\Models;

class Auth
{
    private static $table1 = 'usuarios';

    public static function verifyuser($dados)
    {
        if (isset($dados['usuario']) &&  isset($dados['password'])) {
            $user = $dados['usuario'];
            $password = $dados['password'];
            $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
            $query = $connPdo->prepare('SELECT * FROM  ' . self::$table1 . ' WHERE usuario=:usuario');
            $query->bindValue(":usuario", $user);
            $query->execute();
            if ($query->rowCount() > 0) {
                $row_dados = $query->fetch();
                if (password_verify($password, $row_dados['password'])) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
