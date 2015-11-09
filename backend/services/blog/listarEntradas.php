<?php
if(!isset($match)) { require 'classes/404.php'; die; };
include '../backend/classes/Conector.php';
include '../backend/classes/Entrada.php';

$entradas = new Entrada();
$entradas->Listar();



$max = count($entradas->Listado);

echo '<ul>';   

for ($i = 0; $i < $max; $i++) {
	 		
	 		$proFila = $entradas->Listado[$i];


	 		echo '<li>';   

	 		echo '<a class="entradas" href="';
	 		   
	 		echo  $router->generate("entradaBlog", array("idBlog" => $proFila['idEntrada'], "titBlog" => $proFila['titulo'] ));
			echo '">';


		  	echo $proFila["titulo"] ;
			echo '</a>';

			echo "<br/>";

			echo '<a class="ItemsPortfolioDelete" data-nombreItem="';

			echo  $proFila['titulo'];

			echo '"';

			echo ' data-idItem="';

			echo  $proFila['idEntrada'];
    
     		echo '"';

			echo 'href="#"> Eliminars </a>';

			echo "<br/>";
			
			echo '<a class="ItemsPortfolioMOdifi" data-idItem="';

			echo  $proFila['idEntrada'];

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