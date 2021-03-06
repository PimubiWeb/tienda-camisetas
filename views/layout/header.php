<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Tienda de Camisetas</title>
		<link rel="stylesheet" href="<?=base_url?>assets/css/styles.css" />
	</head>
	<body>
		<div id="container">
			<!-- CABECERA -->
			<header id="header">
				<div id="logo">
					<img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta Logo" />
					<a href="<?=base_url?>">
						Tienda de camisetas
					</a>
				</div>
			</header>

			<!-- MENU -->
			<?php $categorias = Utils::showCategorias(); ?>
			<nav id="menu">
				<ul>
					<li>
						<a href="<?=base_url?>">Inicio</a>
					</li>
					
					
					<?php
					//LISTAMOS TODAS LAS CATEGORIAS
					for($i = 0 ; $i < count($categorias) ; $i++){
						echo "<li>";
						echo "<a href='".base_url."categoria/ver&id=".$categorias[$i]['id']."'>";
							echo "<h4>".$categorias[$i]['nombre']."</h4>";
						echo "</a>";
						echo "</li>";
					}
					?>
					
				</ul>
			</nav>

			<div id="content">

			<a href=""></a>