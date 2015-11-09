<?php
if(!isset($match)) { require 'classes/404.php'; die; };
include '../backend/classes/Conector.php';
include '../backend/classes/ItemsPortfolio.php';



$ds          = DIRECTORY_SEPARATOR;   

$storeFolder = 'fotosPortfolio';  
$base = '/SENIOR/backend/services/itemsPortfolio/fotosPortfolio/';


 
if (!empty($_FILES)) {

     
    $tempFile = $_FILES['file']['tmp_name'];                  
      
    $targetPath = dirname( __FILE__ ) .$ds.$storeFolder.$ds;  
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  
 
    move_uploaded_file($tempFile,$targetFile); 

    $targetFileForDB = $base.$_FILES['file']['name'];  


    $enlace = mysqli_connect("localhost", "root", "", "alquimia");
    $urlAdaptado =  mysqli_real_escape_string($enlace,$targetFileForDB);

	$subir = new ItemsPortfolio();
	$subir->urlImagen = $urlAdaptado; 



    $subir->imagenperteneceitemportfolio();


     
} 



?>     



