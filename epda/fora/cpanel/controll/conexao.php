

<?php

class Banco
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

//banco SQL SERVER Aruja12

define('DB_HOST', "10.1.1.6");
define('DB_USER', "desenvolvimento");
define('DB_PASSWORD', "prefeitura@banco2019");
define('DB_NAME', "ARUJADB");
define('DB_DRIVER', "sqlsrv");

class Conexao
{
	private static $connection;

	private function __construct()
	{
	}

	public static function getConnection()
	{

		$pdoConfig  = DB_DRIVER . ":" . "Server=" . DB_HOST . ";";
		$pdoConfig .= "Database=" . DB_NAME . ";";

		try {
			if (!isset($connection)) {
				$connection =  new PDO($pdoConfig, DB_USER, DB_PASSWORD);
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			return $connection;
		} catch (PDOException $e) {
			$mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
			$mensagem .= "\nErro: " . $e->getMessage();
			throw new Exception($mensagem);
		}
	}
}

?>



