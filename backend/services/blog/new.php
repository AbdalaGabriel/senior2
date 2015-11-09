<?php

if(!isset($match)) { require 'classes/404.php'; die; };
include '../backend/classes/Conector.php';
include '../backend/classes/ItemsPortfolio.php';




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevo item Portfolio</title>
	<script src="http://tinymce.cachefly.net/4.2/tinymce.min.js"></script>
	<script>tinymce.init({selector:'textarea'});</script>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/SENIOR/backend/external/tinymce/tinymce.min.js"></script>
	<link rel="stylesheet" href="/SENIOR/backend/style/style.css">

	 <script type="text/javascript">
        tinymce.init({
            selector: "#redaccion"
        });
    </script>

	<script src="/SENIOR/backend/js/media.js"></script>


</head>
<body>

	<h1>Agregar nueva entrada al blog</h1>



	<form id="form_pro" action="<?php echo $router->generate("altaNuevaEntrada") ?>" method="POST">
	
	   <p> <label for="titulo">Titulo </label>
		<input class="etiqueta" type="text" name="titulo" id="titulo"  required/></p>
	   
	    <p> <label for="redaccion">Contenido</label>
	   	 <textarea name="redaccion" id="redaccion"  required/>Comience a redactar el contenido de su nueva nota.</textarea>
	
		<input type="submit" value="Crear proyecto!" />
	    
	</form>
	

<a class="triggerPop" href="#">Agregar Imágenes</a>

<div class="popWp">
<div class="popup">

<?php
if ($gestor = opendir('C:\xampp\htdocs\SENIOR\backend\services\media\uploads')) {

	echo '<h1>Seleccionar archivos</h1>';
	echo '<form>';

    while (false !== ($entrada = readdir($gestor))) {
        if ($entrada != "." && $entrada != "..") {

        	echo '<input class="imgs" type="checkbox" name="';
        	echo  $entrada;
        	echo '" value="/SENIOR/backend/services/itemsPortfolio/fotosPortfolio/'.$entrada.'">';
            echo '<img width="100" height="100" src="/SENIOR/backend/services/itemsPortfolio/fotosPortfolio/'.$entrada.'" />'."\n"; //n significa enter en codigo fuente


     
        }
    }
    closedir($gestor);
        echo '<input id="ok" type="submit" value="OK" />';
    echo '</form>';
}

?>

</div>
</div>	
</body>

<script>


	var cadenaimg = "";


	$(".triggerPop").click(function(){
		
		$(".popWp").css("display","block");
		//insertarImagenes();


	});



	$("#ok").click(function(){

		event.preventDefault();
		countChecked();
		$(".popWp").css("display","none");

	});

	var countChecked = function() {
  		
  		var n = $( "input:checked" ).length;

  		var imgs = $("input:checkbox:checked").map(function(){
	      return $(this).val();
	    }).get(); 

	    console.log(imgs);


	    for (i=0;i<n;i++){

	    	cadenaimg = cadenaimg + '<img width="100" height="100" src="' + imgs[i] + '"/>';

	    }


	    console.log("cadena img vale" + cadenaimg);

		insertarImagenes();


 		
	};


	function insertarImagenes(){

	
			//$('#tinymce').css("display","none");
		   console.log("entre");
		    tinyMCE.activeEditor.selection.setContent(cadenaimg);
		 

	}






</script>
</html>