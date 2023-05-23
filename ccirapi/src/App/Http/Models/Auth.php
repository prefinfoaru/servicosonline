<?php

namespace Apps\Http\Models;

class Auth
{
    private static $table1 = 'tb_usuarios';
    private static $table2 = 'tb_usuariorestritos';

    public static function verifyuser($dados)
    {
        if (isset($dados['usuario']) &&  isset($dados['password'])) {
            $user = $dados['usuario'];
            $password = $dados['password'];
            $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
            $connPdo2 = new \PDO(DBDRIVE2 . ':host=' . DBHOST2 . ';dbname=' . DBNAME2, DBUSER2, DBPASS2);
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
                $query2 = $connPdo2->prepare('SELECT * FROM  ' . self::$table2 . ' WHERE usuario=:usuario');
                $query2->bindValue(":usuario", $user);
                $query2->execute();
                if ($query2->rowCount() > 0) {
                    $row_dados = $query2->fetch();
                    if ($password == "#CCIRUSOINTERNOPREF@") {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }
}
