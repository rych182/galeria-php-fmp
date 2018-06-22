<?php
//Este archivo es el encargado de traer la foto



//Conectarnos a la base de dato, por me conecto a funciones.php
require 'funciones.php';

//conectandome a la BD igualito que en subir.php
$conexion = conexion('galeria_practica','root','');

if (!$conexion) {
	//También se puede hacer una redireccion a otro archivo en dado caso que falle
	die();
}

//capturamos el id
//Si la variable $_GET contiene el valor de id, ENTONCES lo va a guardar en $_GET pero con número entero
//DE OTRA FORMA queremos que esta variable sea igual a false
$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

if (!$id) {//si id es diferente osea false
	//De esta forma el usuario no ve la foto y lo enviamos al index
	//Esto se hace por seguridad para que no te inyecten codigo
	header('Location: index.php');
}

//Si el if de arriba es falso la consulta de abajo ya no se ejecuta

$statement = $conexion->prepare('SELECT * FROM fotos WHERE id = :id');
//Utilizamos nuestro arreglo para reemplazar el id que tenemos arriba
$statement->execute(array(':id' => $id ));

$foto = $statement->fetch();

//Si el usuario puso en el url un número de una página que no existe te lleva al index
if (!$foto) {
	header('Location: index.php');
}

require 'views/foto.view.php';

?>