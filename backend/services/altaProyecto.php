
<?php

 
include '/classes/Conector.php';
include '/classes/Usuario.php';
include '/classes/Proyecto.php';
include '/classes/Upload.php';
include '/classes/Imagen.php';

$titulo =  $_POST["nombreProyecto"];
$descripcion =  $_POST["descripcionPro"];
$idUsuario = $_POST["idUsuario"];
 

$pro = new Proyecto();
$pro->titulo = $titulo;
$pro->descripcion = $descripcion;
$pro->idUsuario = $idUsuario;
$pro->Agregar();

$nombre_imagen = "file";
$upload = new Upload('file', array('image/jpeg', 'image/png', 'image/gif'), 'img/', "".$nombre_imagen.date("YmdHi"));

if($upload->url != null)
{
	
	
	
	$pro->Listar($idUsuario);
	$filaPro = $pro->Listado[0];
		
	$img = new Imagen();
	$img->idProyecto = $filaPro["idProyecto"];
	$img->url = $upload->url;
	$img->Agregar();
	
	
	$img->ListarPorProyecto($filaPro["idProyecto"],"DESC");
	$imgFila = $img->Listado[0];

	
	$pro->fotoPortada = $imgFila["idImagen"];
	$pro->idProyecto = $imgFila["idProyecto"];
	$pro->Modificar();
	
	


	
	
	echo 'Nuevo proyecto agregado exitosamente';

}
else
echo 'No se pudo cargar la imagen';

echo '<a href="';
echo $router->generate("perfil", array("idUsuario" => $_SESSION['id'], "nombreUsuario" => $_SESSION['nombre']));
echo '"> Volver al Perfil</a>';


?>