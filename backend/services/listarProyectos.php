<?php

include '../backend/classes/Conector.php';
include '../backend/classes/Proyectos.php';

$proyecto = new Proyecto();
$proyecto->Listar();



$max = count($proyecto->Listado);

for ($i = 0; $i < $max; $i++) {
	 		
	 		$proFila = $proyecto->Listado[$i];

	 		echo '<div class="proyecto">';           
		  	echo $proFila["nombre"] ;
			echo '</div>';

        }

?>