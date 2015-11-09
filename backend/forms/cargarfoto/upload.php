<?php

header('Content-Type: application/json');

$subidos = [];
$permtidos = ["jpg","png"];

$exitosos = [];
$fallados = [];

$archivo = $_FILES['file'];



if(!empty($archivo)){



	foreach ($_FILES['file']["name"] as $key => $name) {

		if($_FILES['file']["error"][$key] === 0){// pregunto si hay error


			$temp = $_FILES['file']["tmp_name"][$key];

			$ext = explode(".", $name); //serparo lo q llega desp del punto.
			$ext = strtolower(end($ext));

			$file = md5_file($temp).time().'.'.$ext;
			
			
				if(in_array($ext, $permtidos) === true && move_uploaded_file($temp, 'uploads/'.$file) === true) // al mismo tiempo que las subo chequeo si se subieron bien
				{
					$exitosos[] = array(

						'name' => $name,
						'file' => $file
 					);
				
				} else{

					$fallados = array(
						'name' => $name
					);

				}
					
		}
		
		
		if(!empty($_POST['ajax'])){


		};

		// si nuestro javascript no esta disponible este formulario mostrara los datos por echo de php, convertido a json.
		echo json_encode(array(

			'Exitosas' => $exitosos,
			'Fallidas' => $fallados

		));

		# code...
	}

} else{

	echo "no llego nada";
}

?>