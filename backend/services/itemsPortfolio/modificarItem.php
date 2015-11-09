<?php
if(!isset($match)) { require 'classes/404.php'; die; };
include '../backend/classes/Conector.php';
include '../backend/classes/ItemsPortfolio.php';


$titPro = $match["params"]["titPro"];
$idItem = $match["params"]["idItem"];

$titPro = urldecode($titPro );

if($titPro != ""){

$ItemsPortfolio = new ItemsPortfolio();
$ItemsPortfolio->Listar();


$proFila = $ItemsPortfolio->Listado[0];


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

	<h1>Modificar ítem - <?php  echo $titPro ?> </h1>

	<form id="form_pro" action="<?php echo $router->generate("altaItemProject") ?>" method="GET">
	
	   <p> <label for="titulo">Titulo </label>
		<input class="etiqueta" type="text" name="titulo" id="titulo" placeholder="<?php echo $titPro ?>" required/></p>
	   <p>  <label for="descripcion">Descripción</label>
	   	 <textarea name="descripcion" id="descripcion"  required/> <?php echo $proFila["descripcion"] ?></textarea>
	

		<input type="submit" value="Crear proyecto!" />
	    
	</form>


	<div class="images">
		<h1>Imágenes</h1>
		<a href="">Subír más imágenes</a>

		<h2>Existentes: </h2>

		<?php
			
			$ItemsPortfolio ->ListarItemImages($idItem);

			$max = count($ItemsPortfolio->Listado);

			echo '<ul>';   

			for ($i = 0; $i < $max; $i++) {
				 		
				 		$proFila = $ItemsPortfolio->Listado[$i];

				 		echo '<li>';
				 		echo '<img src="';
				 		echo $proFila["urlImagen"];
				 		echo '" />';
				 		echo '</li>';

			}	 		
			

			echo '</ul>';

			?>

	</div>
	
</body>
</html>



<?php




}else{

	echo "No hay ningún item para modificar.";
}




?>     



