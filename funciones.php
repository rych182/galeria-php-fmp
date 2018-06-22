<?php

function conexion($bd,$usuario,$pass){
	try {
		//conexion
		$conexion = new PDO("mysql:host=localhost;dbname=$bd",$usuario,$pass);
		//si esta todo bien, nos regresa la conexion
		return $conexion;
	} catch (PDOExcepcion $e) {
		
		//Si hay algún error, retornamos false
		return false;	
	}
}

?>