<?php


if(!isset($match)) { require 'classes/404.php'; die; };

include '../backend/classes/Conector.php';
include '../backend/classes/Pagina.php';

if(isset($_GET["titulo"])){


	$titulo = $_GET["titulo"];
	$urlF = $_GET["urlF"];


	$page = new Pagina();
	$page->titulo = $titulo;
	$page->urlFriendly = $urlF;

	$page->Agregar();

	echo "Nueva página".$titulo." creada correctamente";
	echo "comienze a agregar bloques a su página; "

	?>
	
	<a href="<?php echo $router->generate("nuevoBloque") ?>?Pagina=<?php echo $titulo ?>">Crear Bloques</a>


	<?php


} else{

	echo "lo siento, su consulta llego vacía.";
}



?>