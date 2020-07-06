<?php require_once('conexion.php');?>
<?php require_once('helpers.php');?>
<!DOCTYPE html>
<html lang="es">
	
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Blog de videjuegos</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	
	<body>
		<header id="header">
			<div id="logo">
				<a href="index.php">
					<h1>Blog de videojuegos</h1>
				</a>
			</div>
			<!--menu-->
			<nav id="nav">
				<ul>
					<li><a href="index.php">Inicio</a></li>
					<?php
						$categorias=obtenerCategorias($db);
						while($categoria=mysqli_fetch_assoc($categorias)):
					?>
					<li><a href="index.php"><?=$categoria['nombre'];?></a></li>
					<?php endwhile;?>
					<li><a href="index.php">Sobre mi</a></li>
					<li><a href="index.php">Contacto</a></li>
				</ul>
			</nav>
			<div class="clearfix"></div>
		</header>
	<div id="container">																					