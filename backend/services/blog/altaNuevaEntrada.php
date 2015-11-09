<?php


if(!isset($match)) { require 'classes/404.php'; die; };

include '../backend/classes/Conector.php';
include '../backend/classes/Entrada.php';

if(isset($_POST["titulo"])){


	$titulo = $_POST["titulo"];
	$redaccion = $_POST["redaccion"];

	setlocale(LC_TIME,"es_ES");
	$fecha =  strftime("%A %d de %B del %Y");

	$autor = "gabi";

	$entrada = new Entrada();
	$entrada->titulo = $titulo;
	$entrada->contenido = $redaccion;
	$entrada->fecha = $fecha;
	$entrada->autor = $autor;

	$entrada->Agregar();

	
	?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Entrada creada correctamente.</title>
		

<script src="http://cdn.rawgit.com/enyo/dropzone/master/dist/dropzone.js" ></script>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>

<h1><?php echo 	$titulo ?></h1>
<h2>Creada correctamente</h2>

<a href="<?php echo $router->generate("blog") ?>">Volver.</a>

</body>
</html>

	
	
<?php


} else{

	echo "lo siento, su consulta llego vacía.";
}



?>