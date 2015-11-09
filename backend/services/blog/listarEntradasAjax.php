<?php

include '../../classes/Conector.php';
include '../../classes/Entrada.php';

$entrada = new Entrada();
$entrada->Listar();


$max = count($entrada->Listado);

$items = array();

for ($i = 0; $i < $max; $i++) {
	 		
	 		$fila = $entrada->Listado[$i];

	 		$items[$i] = array(

								[

							    'cantItems' => $max,
			 					'titulo' => utf8_encode($fila["titulo"]),
			 					'descr' =>utf8_encode($fila["contenido"]),
			 					'idItem' =>utf8_encode($fila["idEntrada"]),
			 					
			 					
			 					],
							 
			 					 
		 			    );

        }

   echo json_encode($items);


?>