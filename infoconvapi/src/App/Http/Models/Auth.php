<?php

namespace Apps\Http\Models;

const DBDRIVE = "mysql";
const DBHOST = "10.2.2.104";
const DBNAME = "bd_infoconv";
const DBUSER = "desenvolvimento";
const DBPASS = "prefeitura@banco2019";

class Auth
{
    private static $table1 = 'tb_usuarios_externos';

    public static function verifyuser($dados)
    {
        if (isset($dados['usuario']) &&  isset($dados['password'])) {
            $user = $dados['usuario'];
            $password = $dados['password'];
            $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
            $query = $connPdo->prepare('SELECT * FROM  ' . self::$table1 . ' WHERE nome_usuario=:usuario');
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
