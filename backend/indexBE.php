<?php

if(!isset($match)) { require 'classes/404.php'; die; };


include 'classes/Conector.php';
include 'classes/Usuario.php';



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
		<title>G-Admin - <?php echo $_SESSION['nombre']; ?></title>
		<link rel="stylesheet" href="../backend/style/style.css">
	</head>
	<body>
		
		<div class="lateralMenu">
		
			<div class="menuWp">
				<h1><?php echo $_SESSION['nombre']; ?></h1>

				<nav>
				<ul>
					<li><a href= "G-admin/paginas" title="Páginas">Páginas</a></li>
					<li><a href= "G-admin/portfolio" title="Trabajos">Administrar Portfolio</a>	</li>
					<li><a href= "G-admin/blog" title="BLOG">Administrar BLOG</a></li>
					<li><a href= "G-admin/media" title="BLOG">Gestor Multimedia</a></li>
				</ul>
				</nav>

			</div>

			
			<div class="overLay"></div>

			<div class="color"><div id="effect"></div></div>
		</div>


	</body>
	</html>


<?php

	}

?>




