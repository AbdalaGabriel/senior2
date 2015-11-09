<?php


if(!isset($match)) { require 'classes/404.php'; die; };

include '../backend/classes/Conector.php';
include '../backend/classes/Bloque.php';
include '../backend/classes/Pagina.php';

if(isset($_POST["titulo"])){


	$titulo = $_POST["titulo"];
	$contenido = $_POST["contenido"];
	$pagpertenece = $_POST["pagpertenece"];
	$ordenBloque = $_POST["ordenBloque"];


	$bloque = new Bloque();
	$bloque->titulo = $titulo;
	$bloque->contenido = $contenido;
	$bloque->ordenBloque = $ordenBloque;


	// Conseguir id de pagina en base a nombre que llega, por post.
		

	$pagina = new Pagina();
	$pagina ->ListarPorTitulo("'".$pagpertenece."'");
	$filaPag = $pagina->Listado[0];


	$bloque->idPagina = $filaPag["idPagina"]; 

	// Agregar nuevo Bloque y relacionarlo con página.

	$agregar1 = $bloque->Agregar();
	

	if($agregar1 == true){

		// Hago segunda consulta que relacion bloque con pag.

		echo "Nuevo bloque: ".$titulo." creado correctamente";

		$bloque ->ListarBloquesPorTitulo("'".$titulo."'");
		
		$filabloque = $bloque->Listado[0];

		$idNuevoBloque = $filabloque["idBloque"];

		$bloque->idBloque = $idNuevoBloque;

		$agregar2 = $bloque->AgregarRelacionPag();

		if($agregar2){

			echo " relacionado satisfactoriamente con ".$pagpertenece;

		} else{

			echo "no se ha podido relacionar correctamente, verifique los nombres de página y bloque, por favor";
		}

	} else{

	   echo "ha habido un problema";
	}

	

	?>
	



	<?php


} else{

	echo "lo siento, su consulta llego vacía.";
}



?>