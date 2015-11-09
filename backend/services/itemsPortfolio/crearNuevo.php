<?php

include '../../classes/Conector.php';
include '../../classes/ItemsPortfolio.php';

$ItemsPortfolio = new ItemsPortfolio();
$ItemsPortfolio->Listar();


$max = ($ItemsPortfolio->Listado);

$items = array();

for ($i = 0; $i < $max; $i++) {
	 		
	 		$proFila = $ItemsPortfolio->Listado[$i];

	 		$items[$i] = array(

								[

							    'cantItems' => $max,
			 					'titulo' => utf8_encode($proFila["titulo"]),
			 					'descr' =>utf8_encode($proFila["descripcion"]),
			 					'idItem' =>utf8_encode($proFila["idItem"]),
			 					
			 					],
							 
			 					 
		 			    );

        }

   echo json_encode($items);


?>