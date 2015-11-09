<?php
if(!isset($match)) { require 'classes/404.php'; die; };

include '../backend/classes/Conector.php';
include '../backend/classes/Pagina.php';

?>


	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>G-Admin - <?php echo $_SESSION['nombre']; ?></title>
		<link rel="stylesheet" href="../../backend/style/style.css">
		<link rel="stylesheet" type="text/css" href="../../backend/external/css/foundation.css">
		<link rel="stylesheet" type="text/css" href="../../backend/external/css/foundation.min.css">
		<link rel="stylesheet" type="text/css" href="../../backend/external/css/normalize.css">
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

		<script src="../../backend/external/js/foundation.min.js"></script>
	</head>
	<body>

	<?php
		include '../backend/structure/menu.php';
	?>

		<div class="contentWp">
			
			<div class="content">
			
				<h1>Sus páginas</h1>

				<div class="pageWp small-12 columns">
			
			<?php
			
				$page = new Pagina();
				$page->Listar();
				$max = count($page->Listado);

				for ($i = 0; $i < $max; $i++) {
					 		
			 		$pageFila = $page->Listado[$i];
				 	
			 		
				 		echo '<div class="beTable titlePageWp medium-8 columns">';
					 		echo '<a href="http://localhost/SENIOR/frontend/pagina?urlF='.$pageFila["urlFriendly"].'">';           
						  	echo $pageFila["titulo"] ;
						  	echo '</a>';
					  	echo '</div>';

					  	echo '<div class="beTable editPageWp medium-2 columns">';
					  		echo '<a href="">';           
						  	echo "modificar";
						  	echo '</a>';

					  	echo '</div>';

					  	echo '<div class="beTable deletePageWp medium-2 columns">';

					  		echo '<a href="">';           
						  	echo "borrar";
						  	echo '</a>';

					  	echo '</div>';

					
		        }

				?>
				</div>
			</div>

		</div>
	</body>
	</html>
