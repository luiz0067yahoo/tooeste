<?php
	
	class conect {
		public static $instance;
		public static $servername_		=	"localhost";
		public static $username_		=	"servername_";
		public static $password_	=	"password_";
		public static $database_	=	"database_";
		private function __construct() {
		}

		public static function getInstance() {
			if (!isset(self::$instance)) {
					self::$instance = new PDO("mysql:host=".self::$servername_.";dbname=".self::$database_.";", self::$username_, self::$password_,
						array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
					);
					self::$instance->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);
					self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS,
					PDO::NULL_EMPTY_STRING);
				}
			return self::$instance;
		}
		public static function close() {
			self::$instance=null;
		}
	}





?>
