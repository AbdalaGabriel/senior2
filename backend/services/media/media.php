<?php

if(!isset($match)) { require 'classes/404.php'; die; };
include '../backend/classes/Conector.php';
include '../backend/classes/Media.php';
  


?>
<?php if(!isset($match)) { require 'classes/404.php'; die; }; ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
		<title>G-Admin - <?php echo $_SESSION['nombre']; ?></title>
		<link rel="stylesheet" href="../../backend/style/style.css">
		<script src="http://cdn.rawgit.com/enyo/dropzone/master/dist/dropzone.js" ></script>
		<link rel="stylesheet" type="text/css" href="../../backend/external/css/foundation.css">
		<link rel="stylesheet" type="text/css" href="../../backend/external/css/foundation.min.css">
		<link rel="stylesheet" type="text/css" href="../../backend/external/css/normalize.css">
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>
	<?php
		include '../backend/structure/menu.php';
	?>

	<div class="contentWp">
			
			<div class="content">

				<h1>G-Media</h1>

				<h2>Administración de archivos.</h2>


	
				<form method="POST" enctype="multipart/form-data"  action="<?php echo $router->generate("mediaSubir") ?>"
			      class="dropzone"
			      id="my-awesome-dropzone">
					
					<input type="submit"  id="subirCon" value="Subir contenido" />

			  	</form>
				
				<div class="archivos">
			
				<h3>Sus Archivos</h3>
				<?php
	

				if ($gestor = opendir('C:\xampp\htdocs\SENIOR\backend\services\media\uploads')) {
				    while (false !== ($entrada = readdir($gestor))) {
				        if ($entrada != "." && $entrada != "..") {

				        	echo '<div class="mediaWp medium-4 large-2 columns " style="background:url(/SENIOR/backend/\services/itemsPortfolio/fotosPortfolio/'.$entrada.'")">';
				           /* echo '<img width="100" height="100" src="/SENIOR/backend/\services/itemsPortfolio/fotosPortfolio/'.$entrada.'" />'."\n"; //n significa enter en codigo fuente*/
				            echo '<a href="borrarfotos.php?nombrefoto='.$entrada.'">x</a>';
				            	echo '</div>';
				        }
				    }
				    closedir($gestor);
				}


					?>


				</div>

	</div>
			</div>

</body>
</html>