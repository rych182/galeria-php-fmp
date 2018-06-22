<?php

require 'funciones.php';
$fotos_por_pagina = 8;

//Para ver cual es la página en la que estamos
//Si la variable $_GET con el elemnto p esta declarado, lo guardaremos en un valor entero
//para que nadie intente inyectar código que no sea un número, de otra forma queremos que sea 1
$pagina_actual = (isset($_GET['p']) ? (int)$_GET['p'] : 1);

//Lo mismo que en la paginación, desde que post vamos a traer los 8 post
//Que sea mayor que 1, de otra manera, traeremos desde el 0
$inicio = ($pagina_actual > 1) ? $pagina_actual * $fotos_por_pagina - $fotos_por_pagina : 0;

$conexion = conexion('galeria_practica','root','');

if (!$conexion) {
	die();
}

//Traer las fotos de la base de datos
//SQL_CALC_FOUND_ROWS sirve para calcular cuantas fotos hay en la base de datos
$statement = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM fotos LIMIT $inicio, $fotos_por_pagina");


//Preparamos nuestra ejecución
$statement->execute();
$fotos = $statement->fetchAll();

//comprobar si no hay fotos
if (!$fotos) {
	header('Location: index.php');
}

//Que nos traiga todas las filas que encontro
$statement = $conexion->prepare("SELECT FOUND_ROWS() as total_filas");
$statement->execute();
$total_post = $statement->fetch()['total_filas'];

//calcular el total de páginas
$total_paginas = ceil($total_post / $fotos_por_pagina);

require 'views/index.view.php'; 

?>