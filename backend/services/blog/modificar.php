<?php
if(!isset($match)) { require 'classes/404.php'; die; };
include '../backend/classes/Conector.php';
include '../backend/classes/Entrada.php';


$titPro = $match["params"]["titBlog"];
$idItem = $match["params"]["idBlog"];

$titPro = urldecode($titPro );

if($titPro != ""){

$entrada = new Entrada();
$entrada->Listar();


$proFila = $entrada->Listado[0];


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar ítem - <?php  echo $titPro ?> </title>
		<script src="http://tinymce.cachefly.net/4.2/tinymce.min.js"></script>
	
	<script>tinymce.init({selector:'textarea'});</script>
	

<script src="http://cdn.rawgit.com/enyo/dropzone/master/dist/dropzone.js" ></script>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>

	<h1>Modificar Entrada - <?php  echo $titPro ?> </h1>

	<form id="form_pro" action="<?php echo $router->generate("updateEntrada") ?>" method="POST">
	
	   <p> <label for="titulo">Titulo </label>
		<input class="etiqueta" type="text" name="titulo" id="titulo" placeholder="<?php echo $titPro ?>" required/></p>
	   <p>  <label for="contenido">Descripción</label>
	   	 <textarea name="contenido" id="contenido"  required/> <?php echo $proFila["contenido"] ?></textarea>
		
		<input class="etiqueta" type="hidden" name="idEntrada" id="idEntrada" value="<?php echo $proFila["idEntrada"] ?>" required/></p>

		<input type="submit" value="Modificar" />
	    
	</form>


	
	
</body>
</html>



<?php




}else{

	echo "No hay ningún item para modificar.";
}




?>     



