<?php


include '../backend/classes/Conector.php';
include '../backend/classes/Proyecto.php';
include '../backend/classes/Tareas.php';



	if(isset($_GET["idEntrega"])){


		$idEntrega = $_GET["idEntrega"];

		$entrega = new Tareas();
		$entrega->ListarPorEntrega($idEntrega);

		$max = count($entrega->Listado);
		
		if (empty($max)) {

			echo "Esta entrega no tiene tareas";
		}	


		for ($i = 0; $i < $max; $i++) {
				 		
				 		$entregaFila = $entrega->Listado[$i];

				 	
				 	echo '<li>';
				 	//echo '<a href="http://localhost/SENIOR/frontend/loadTareas?idEntrega='.$entregaFila["idEntrega"].'">';           
					echo $entregaFila["titulo"] ;
					//echo '</a>';
					echo '</li>';
					

		 }
		


  	} else{

  		echo "no hay entregas para mostrar";
  	}



	?>
