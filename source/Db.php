<?php
	
	namespace Source;
    use Exception;

	class Db{

		private static $pdo;

		public static function connect(){
		if(self::$pdo == null){
				try{
				self::$pdo = new \PDO('mysql:host='.DATABASE["host"].';dbname='.DATABASE["name"].'',''.DATABASE["username"].'',''.DATABASE["passwd"].'',array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				self::$pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
				}catch(Exception $e){
					echo 'Erro ao conectar com o BD: '.$e->getMessage();
					error_log($e->getMessage());
					die();
				}
			}

			return self::$pdo;
		}

	}



?>