<?php

if(!isset($match)) { require 'classes/404.php'; die; };
include '../backend/classes/Conector.php';
include '../backend/classes/ItemsPortfolio.php';









?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevo item Portfolio</title>
	<script src="http://tinymce.cachefly.net/4.2/tinymce.min.js"></script>
	
	<script>tinymce.init({selector:'textarea'});</script>
	

<script src="http://cdn.rawgit.com/enyo/dropzone/master/dist/dropzone.js" ></script>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>

	<h1>Agregar nuevo item</h1>

	<form id="form_pro" action="<?php echo $router->generate("altaItemProject") ?>" method="GET">
	
	   <p> <label for="titulo">Titulo </label>
		<input class="etiqueta" type="text" name="titulo" id="titulo"  required/></p>
	   <p>  <label for="descripcion">Descripción</label>
	   	 <textarea name="descripcion" id="descripcion"  required/> Easy! You should check out MoxieManager!</textarea>
	

		<input type="submit" value="Crear proyecto!" />
	    
	</form>

	
</body>
</html>