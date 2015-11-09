<?php
if(!isset($match)) { require 'classes/404.php'; die; };

include '../backend/classes/Entrada.php';

$entradas = new Entrada();
$entradas->Listar();



$max = count($entradas->Listado);

echo '<ul>';   

for ($i = 0; $i < $max; $i++) {
	 		
	 		$proFila = $entradas->Listado[$i];

	 		echo '<article>';
	 	

	 		echo '<h3><a class="entradas" href="';
	 		   
	 		echo  $router->generate("entradaBlog", array("idBlog" => $proFila['idEntrada'], "titBlog" => $proFila['titulo'] ));
			echo '">';


		  	echo $proFila["titulo"] ;
			echo '</a></h3>';

			echo "<br/>";

			echo '<p>';

			echo substr($proFila["contenido"],0,100) ;
			

			echo '</p>';

			echo '<a class="entradas" href="';
	 		   
	 		echo  $router->generate("entradaBlog", array("idBlog" => $proFila['idEntrada'], "titBlog" => $proFila['titulo'] ));
			echo '">ver más</a>';


			echo '</article>';   
				echo "<br/>";


        }


?>