<?php


if(!isset($match)) { require 'classes/404.php'; die; };

include '../backend/classes/Conector.php';
include '../backend/classes/Bloque.php';


$tituloPag = ""; 


if(isset($_GET["Pagina"])){

	$tituloPag =  $_GET["Pagina"];
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Páginas</title>
</head>
<body>
	

<h1>Bloques</h1>


<div class="pagesWp">
	
	<h2>Crear un nuevo bloque de información.</h2>

	
<form id="form_pro" action="<?php echo $router->generate("altaBlock") ?>" method="POST">
	
    <label for="titulo">Titulo</label>

	<input class="titulo" type="text" name="titulo" id="titulo" required />
    
    <label for="contenido">Contenido: </label>

	<input class="etiqueta" type="text" name="contenido" id="contenido" required />

	<label for="pagpertenece">Página a la que pertenece: </label>

	<input class="etiqueta" type="text" name="pagpertenece" id="pagpertenece" value="<?php 

		if($tituloPag != "" ){

			echo $tituloPag;

		}


	 ?>" required />

	<label for="ordenBloque">Orden que ocupará en página: </label>

	<input class="etiqueta" type="number" name="ordenBloque" id="ordenBloque" required />
    
    <input type="submit" />


</form>
	
	

</div>

	
</body>