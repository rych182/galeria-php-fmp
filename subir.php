<?php
//En la base de datos solo almacenaremos la ruta, y las fotos se almacenaran en el servidor

//Para poder utilizar la funcion del archivo funciones.php que contiene la conexion
require 'funciones.php';

//Conexión a la base de datos utilizando la conexion del archivo funciones.php
$conexion = conexion('galeria_practica','root','');

//si no hay conexion
if (!$conexion) {
	die();
}

//comprobar que el usuario haya enviado los datos
//$_FILES nos va a guardar en un arreglo información que tengamos de los archivos
//comprobamos si los datos se enviaron por el metodo POST y $_FILES no esté vacía
//De estár vacía, significa que no envió el archivo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
	
	//getimagesize: retorna una arreglo con las propiedades de la imagen,pero si no
	//es una imagen nos va a devolver un error, así nos damos cuenta si el usuario 
	//realmente envió una imagen ya que puede selecccionar otro tipo de archivo
	
	//$_FILES: nos devuelve un arreglo con las caracteristicas de la imagen
	//como nombre,tipo de archivo, donde se guarda la imagen temporalmente,
	// si hay error y el tamaño
	
	//el @ es para que no marque un error de tipo NOTICE
	$check = @getimagesize($_FILES['foto']{'tmp_name'});
	if ($check !== false) {
		$carpeta_destino = 'fotos/';
		$archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
		move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);

		//Preparamos nuestra consulta SQL
		$statement = $conexion->prepare('
			INSERT INTO fotos (titulo,imagen, texto)
			 VALUES (:titulo, :imagen, :texto)
			 ');

		//Ejecutamos la consulta reemplazando los placeholders
		$statement->execute(array(
			':titulo' => $_POST['titulo'],
			':imagen' => $_FILES['foto']['name'],
			':texto' => $_POST['texto']
			));
	
		//Una vez terminada la consulta redirigimos al usuario
		header('Location: index.php');
	}else{
		$error = "El archivo no es una imagen o es muy pesado!";
	}
}

require 'views/subir.view.php';

//Variables globales similares
// $_GET
// $_POST
// $_SESSION

?>