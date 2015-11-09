<?php
if(!isset($match)) { require 'classes/404.php'; die; };
include '../backend/classes/Conector.php';
include '../backend/classes/ItemsPortfolio.php';

$ItemsPortfolio = new ItemsPortfolio();
$ItemsPortfolio->Listar();



$max = count($ItemsPortfolio->Listado);

echo '<ul>';   

for ($i = 0; $i < $max; $i++) {
	 		
	 		$proFila = $ItemsPortfolio->Listado[$i];


	 		echo '<li>';   

	 		echo '<a class="ItemsPortfolio" href="';
	 		   
	 		echo  $router->generate("itemPortfolio", array("titPro" => $proFila['titulo'] ));
			echo '">';


		  	echo $proFila["titulo"] ;
			echo '</a>';

			echo "<br/>";

			echo '<a class="ItemsPortfolioDelete" data-nombreItem="';

			echo  $proFila['titulo'];

			echo '"';

			echo ' data-idItem="';

			echo  $proFila['idItem'];
    
     		echo '"';

			echo 'href="#"> Eliminars </a>';

			echo "<br/>";
			
			echo '<a class="ItemsPortfolioMOdifi" data-idItem="';

			echo  $proFila['idItem'];

			echo '"';

			echo 'href="';

			echo "#";

			//echo  $router->generate("eliminarItems", array("idItem" => $proFila['idItem'] ));

			echo '" > Modificar / Agregar fotos</a>';

			echo '</li>';   
				echo "<br/>";


        }

echo '</ul>'; 

?>