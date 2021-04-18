<?php

class Conexion{
	
	static public function conectar(){
		$conexionDb = new PDO("mysql:host=localhost;dbname=cirujanos","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		return $conexionDb;
	}

	// public function conectar(){
	// 	$conexionDb = new PDO("mysql:host=localhost;dbname=latienda_productos","latienda_product","wKtntz8WTvM38c3Fop",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //                       PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	// 	return $conexionDb;
	// }
}
