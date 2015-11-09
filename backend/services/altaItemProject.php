<?php


if(!isset($match)) { require 'classes/404.php'; die; };

include '../backend/classes/Conector.php';
include '../backend/classes/ItemsPortfolio.php';

if(isset($_GET["titulo"])){


	$titulo = $_GET["titulo"];
	$descripcion = $_GET["descripcion"];


	$itemPort = new ItemsPortfolio();
	$itemPort->titulo = $titulo;
	$itemPort->descripcion = $descripcion;

	$itemPort->Agregar();

	echo utf8_decode ("Nuevo proyecto ".$titulo." creado correctamente");
	echo utf8_decode ("Agregue imágenes a su proyecto");







	?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload</title>
</head>
<body>

		<form action="subirimagenes" method="post" enctype="multipart/form-data">
		<input type="file" name="files[]" multiple>
		<input type="submit" value="Upload">
	</form>


</body>
</html>




	
	
	<?php


	



} else{

	echo "lo siento, su consulta llego vacía.";
}



?>