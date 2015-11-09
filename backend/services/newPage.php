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


<div class="pagesWp">
	
	<h2>Crear una nueva página</h2>

	
<form id="form_pro" action="<?php echo $router->generate("altaPag") ?>" method="GET">
	
    <label for="titulo">Titulo</label>

	<input class="titulo" type="text" name="titulo" id="titulo" />
    
    <label for="urlF">Proporcione una url amigable para esta pagina</label>

	<input class="etiqueta" type="text" name="urlF" id="urlF" />
    
    <input type="submit" />


</form>
	
	

</div>

	
</body>