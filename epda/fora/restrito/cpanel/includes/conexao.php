<?php


class Banco
{
    private static $dbNome = 'atualizaiptu';
    private static $dbHost = '10.2.2.55';
    private static $dbUsuario = 'BDSitio_01';
    private static $dbSenha = 'impre@sh_01';

    public function __construct()
    {
        die('A função Init nao é permitido!');
    }

    public static function conectar()
    {
        if (null == self::$cont) {
            try {
                self::$cont =  new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbNome, self::$dbUsuario, self::$dbSenha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            } catch (PDOException $exception) {
                die($exception->getMessage());
            }
        }
        return self::$cont;
    }

    public static function desconectar()
    {
        self::$cont = null;
    }
}

class Conexao
{

    private static $dbNome = 'bd_sol_hr';
    private static $dbHost = 'pmaruja14.pma.local';
    private static $dbUsuario = 'desenvolvimento';
    private static $dbSenha = 'prefeitura@banco2019';
    private static $cont = null;


    public function __construct()
    {
        die('A função Init nao é permitido!');
    }

    public static function conectar()
    {
        if (null == self::$cont) {
            try {
                self::$cont =  new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbNome, self::$dbUsuario, self::$dbSenha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            } catch (PDOException $exception) {
                die($exception->getMessage());
            }
        }
        return self::$cont;
    }

    public static function desconectar()
    {
        self::$cont = null;
    }
}
