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
			<h1 class="titulo">Mi galería con Php y Mysql</h1>
		</div>
	</header>

	<section class="fotos">
		<div class="contenedor">
			<!--Con esto traes las imágenes dinamicamente-->
			<?php foreach ($fotos as $foto):?>
				<div class="thumb">
					<a href="foto.php?id=<?php echo $foto['id']; ?>">
						<img src="fotos/<?php echo $foto['imagen']; ?>" alt="<?php echo $foto['titulo']; ?>">
					</a>
				</div>
			<?php endforeach;?>
			
			<!--PAGINACIÓN-->
			<div class="paginacion">
			
			<?php if ($pagina_actual > 1): ?>
				<a href="index.php?p=<?php echo $pagina_actual -1; ?>" class="izquierda"><i class="fa fa-long-arrow-left"></i> Página Anterior</a>
			<?php endif ?>


			<?php if ($total_paginas !== $pagina_actual): ?>
				<a href="index.php?p=<?php echo $pagina_actual + 1; ?>" class="derecha">Pagina siguiente <i class="fa fa-long-arrow-right"></i></a>
			<?php endif ?>	
				
				
			</div>

		</div>
	</section>

	<footer>
		<p class="copyright">Galería creada por <a href="http://ricgc.com">Ricardo Garrido</a></p>
	</footer>
</body>
</html>