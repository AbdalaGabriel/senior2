<?php
if(!isset($match)) { require 'classes/404.php'; die; };
include '../backend/classes/Conector.php';
include '../backend/classes/Media.php';



$ds          = DIRECTORY_SEPARATOR;   

$storeFolder = 'uploads';  
$base = '/SENIOR/backend/services/media/uploads/';


 
if (!empty($_FILES)) {

     
    $tempFile = $_FILES['file']['tmp_name'];                  
      
    $targetPath = dirname( __FILE__ ) .$ds.$storeFolder.$ds;  
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  
 
    move_uploaded_file($tempFile,$targetFile); 

    $targetFileForDB = $base.$_FILES['file']['name'];  

    $enlace = mysqli_connect("localhost", "root", "", "alquimia");
    $urlAdaptado =  mysqli_real_escape_string($enlace,$targetFileForDB);

	$subir = new Media();
	$subir->url = $urlAdaptado; 



    $subir->Agregar();


     
} 



?>     

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Media - Subir archivos</title>
</head>
<body>
	<h1>Archivos subidos correctamente</h1>
	<a href="<?php echo $router->generate("media") ?>">Voler al gestor</a>

</body>
</html>



