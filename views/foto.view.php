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
			<h1 class="titulo">Foto: <?php if (!empty($foto['titulo'])) {
				echo $foto['titulo'];
			} 
			echo $foto['imagen']; ?></h1>
		</div>
	</header>

	<div class="contenedor">
		<div class="foto">
			<img src="fotos/<?php echo $foto['imagen']; ?>" alt="">
			<p class="texto"><?php echo $foto['texto']; ?></p>
			<a href="index.php" class="regresar"><i class="fa fa-long-arrow-left"></i> Regresar</a>
		</div>
	</div>

	<footer>
		<p class="copyright">Galería creada por <a href="http://ricgc.com">Ricardo Garrido</a></p>
	</footer>
</body>
</html>