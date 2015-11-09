<?php


include '../backend/classes/Conector.php';
include '../backend/classes/Proyecto.php';
include '../backend/classes/Entregas.php';



	if(isset($_GET["idPro"])){


		$idProyecto = $_GET["idPro"];

		$entrega = new Entregas();
		$entrega->ListarPorProyecto($idProyecto);

		$max = count($entrega->Listado);
		
		if (empty($max)) {

			echo "Esta entrega no tiene proyectos";
		}	


		for ($i = 0; $i < $max; $i++) {
				 		
				 	$entregaFila = $entrega->Listado[$i];

				 	
				 	echo '<li>';
				 	echo '<a href="http://localhost/SENIOR/backend/loadTareas.php?idEntrega='.$entregaFila["idEntrega"].'">';           
					echo $entregaFila["titulo"] ;
					echo '</a>';
					echo '</li>';
					

		 }
		


  	} else{

  		echo "no hay entregas para mostrar";
  	}



	?>
	