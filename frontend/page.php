

<?php

//require '../backend/classes/AltoRouter.php';

include '../backend/classes/Conector.php';
include '../backend/classes/Pagina.php';
include '../backend/classes/Bloque.php';

$page = new Pagina();
$bloques = new Bloque();

if(isset($_GET["urlF"])){


$idPag = $_GET["urlF"];



$page->Listar("'$idPag'");

$max = count($page->Listado);

for ($i = 0; $i < $max; $i++) {
	 		
	 		$pageFila = $page->Listado[$i];

	 		echo '<div class="proyecto">';           
		  	echo $pageFila["titulo"] ;
			echo '</div>';

			$bloques -> ListarBloquesSegunPagina($pageFila["idPagina"]);
			$maxBloque = count($bloques->Listado);
		

			for ($j = 0; $j < $maxBloque; $j++) {


	 			$bloqueFila = $bloques->Listado[$j];
	 			echo '<div class="proyecto">';           
			  	echo $bloqueFila["titulo"] ;
			  	echo "</br>";
			  	echo $bloqueFila["contenido"] ;
				echo '</div>';

			}

        }


include '../backend/services/urlFriendlies.php';


}else{
	"lo sentimos...";
}

?>