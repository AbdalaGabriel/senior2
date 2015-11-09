<?php


if(!isset($match)) { require 'classes/404.php'; die; };

include '../backend/classes/Conector.php';
include '../backend/classes/Pagina.php';


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Páginas</title>
</head>
<body>
	

<h1>Paginas</h1>

<div class="">
	<h2>Crear nueva</h2>
	<a href="<?php echo $router->generate("nuevaPag") ?>">Crear Nueva Página</a>
</div>

<div class="pagesWp">
	
	<h2>Estas son sus páginas</h2>

	<?php

	$page = new Pagina();
	$page->Listar();

	$max = count($page->Listado);

	for ($i = 0; $i < $max; $i++) {
		 		
		 		$pageFila = $page->Listado[$i];

		 		echo '<div class="proyecto">';
		 		echo '<a href="http://localhost/SENIOR/frontend/pagina?urlF='.$pageFila["urlFriendly"].'">';           
			  	echo $pageFila["titulo"] ;
			  	echo '</a>';
				echo '</div>';

	  }

	?>
	

</div>

</body>