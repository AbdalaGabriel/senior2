

<?php

if(isset($_GET["nombrefoto"])){


	$foto = $_GET["nombrefoto"];


		if(file_exists('fotos/'.$foto)){

		if ( unlink('fotos/'.$foto) )  {

			echo "boraddo";

		} else {

			echo "no borro";

		}

	} else{

		echo "ese archivo a borrar no existe o ya ha sido borrado";
	}


} else {

	echo "usted no selecciono ningun archivo";
}


;


?>