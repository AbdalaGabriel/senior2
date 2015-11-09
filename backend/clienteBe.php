<?php

if(!isset($match)) { require 'classes/404.php'; die; };


include 'classes/Conector.php';
include 'classes/Usuario.php';
include 'classes/Proyecto.php';


if(isset( $_POST["correo"])   ){

	$correo = $_POST["correo"];
	$pasword =$_POST["clave"];

	$_SESSION['correo'] = $correo;
	$_SESSION['clave'] = $pasword;


	//verificamos le usuario logueado para acceder a los datos de nombre y id y guardarlos en variables de sesion;

	$usLog = new Usuario();
	$usLog->VerficarUsuario($_SESSION['correo'],$_SESSION['clave']);

	$filaUsuarioLog = $usLog->Verificar[0];

	$_SESSION['nombre'] = $filaUsuarioLog["nombre"];
	$_SESSION['id'] = $filaUsuarioLog["idUsuario"];



	echo "Bienvenido, ";
	echo $_SESSION['nombre'];
	

	listBackendActions();


} else if (isset($_SESSION['nombre'])) { // si vuelvo desde otro lado quiero q me mantenga la sesion, entonces pregunto si ya esta seteada.
	
	$usLog = new Usuario();
	$usLog->VerficarUsuario($_SESSION['correo'],$_SESSION['clave']);
	$filaUsuarioLog = $usLog->Verificar[0];

} else{

	echo "no tiene permiso para ver esta pagina";
};


function listBackendActions(){

?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>G-Client</title>
	</head>
	<body>

		
		<ul>
			<li><a href= "G-admin/paginas" title="Páginas">Crear un nuevo proyecto.</a></li>
		</ul>

		<h2>Estos son sus proyectos</h2>

		<?php

		$proyecto = new Proyecto();
		$proyecto->Listar($_SESSION['id']);

		$max = count($proyecto->Listado);

		for ($i = 0; $i < $max; $i++) {
			 		
			 		$proFila = $proyecto->Listado[$i];

			 		echo '<div class="proyecto">';
			 		echo '<a href="http://localhost/SENIOR/backend/loadEntrega.php?idPro='.$proFila["idProyecto"].'">';         
				  	echo $proFila["nombre"] ;
				  	echo '</a>';
					echo '</div>';

		    }



		?>


	</body>
	</html>


<?php

	}

?>




