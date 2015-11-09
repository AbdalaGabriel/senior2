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
		

<script src="http://cdn.rawgit.com/enyo/dropzone/master/dist/dropzone.js" ></script>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>


<form method="POST" enctype="multipart/form-data"  action="<?php echo $router->generate("subirfotos") ?>"
      class="dropzone"
      id="my-awesome-dropzone">
		
			<input type="submit" value="Subir fotis!" />

  </form>

</body>
</html>




	
	
	<?php


	



} else{

	echo "lo siento, su consulta llego vacía.";
}



?>