<?php
/* @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar e Bootstrap 4,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 */

class Banco
{
    private static $dbNome = 'bd_emprega_aruja';
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
