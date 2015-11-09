<?php
if(!isset($match)) { require 'classes/404.php'; die; };
include '../backend/classes/Conector.php';
include '../backend/classes/Entrada.php';

$titBlog = $match["params"]["titBlog"];

$idEntrada = $match["params"]["idBlog"];

$titBlog = urldecode($titBlog);



$entrada = new Entrada();

$entrada->Listar($idEntrada);

$fila = $entrada->Listado[0];



?>     

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo  $titBlog ?></title>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

</head>
<body>

	<h1><?php echo $titBlog ?></h1>

	<main>
		
		<?php
		echo $fila["contenido"];

		?>
	</main>
	
</body>


<script>
	
$("img").each(function(){

var src = $(this).attr("src");
newSrc = src.replace("../../../", "/SENIOR/");
console.log(newSrc);

$(this).attr("src",newSrc);

});

//str.replace("Microsoft", "W3Schools");

</script>
</html>



