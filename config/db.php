<?php

use PDO;
use PDOException;

class Database{
	// public static function connect(){
	// 	$db = new mysqli('localhost', 'root', '', 'tienda');
	// 	$db->query("SET NAMES 'utf8'");
	// 	return $db;
	// }

	//FUNCION QUE DEVUELVE UNA CONEXION CON LA BASE DE DATOS
	public static function connect(){
		try{
			$db = new PDO('mysql:dbname='.dbnombre.';host='.dbhost.';charset=utf8', dbuser, dbpass);
			return $db;
		}catch(PDOException $e){
			header('Location: '.base_url.'error/index');
		}
	}

}

