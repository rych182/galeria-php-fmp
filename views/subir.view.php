<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilos.css">
	<title>Galeria</title>
</head>
<body>
	<header>
		<div class="contenedor">
			<h1 class="titulo">Subir foto</h1>
		</div>
	</header>

	<div class="contenedor">
		<!--enctype="multipart/form-data" sirve para que se pueda subir imagenes-->
		<form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<label for="foto">Selecciona tu foto</label>
			<input type="file" id="foto" name="foto">

			<label for="titulo">Título de la foto</label>
			<input type="text" id="titulo" name="titulo">

			<label for="text">Descripción:</label>
			<textarea name="texto" id="texto" placeholder="Ingresa una descripción">
			</textarea>
		
			<?php if (isset($error)): ?>
				<?php echo $error; ?>
			<?php endif ?>
			<input type="submit" class="submit" value="Subir foto">
		</form>
	</div>

	<footer>
		<p class="copyright">Galería creada por <a href="http://ricgc.com">Ricardo Garrido</a></p>
	</footer>
</body>
</html>