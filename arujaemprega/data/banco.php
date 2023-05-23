<?php

class Banco
{
    private static $dbNome = 'bd_emprega_aruja';
    private static $dbHost = '10.1.3.211';
    private static $dbUsuario = 'root';
    private static $dbSenha = 'prefeitura@banco2019';

	
	
    private static $cont = null;
    
    public function __construct() 
    {
        die('A função Init nao é permitido!');
    }
    
    public static function conectar()
    {
        if(null == self::$cont)
        {
            try
            {
              		self::$cont =  new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbNome, self::$dbUsuario, self::$dbSenha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
            }
            catch(PDOException $exception)
            {
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


$pdo = Banco::conectar();
