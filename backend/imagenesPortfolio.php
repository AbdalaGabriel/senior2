<?php

if(!isset($match)) { require 'classes/404.php'; die; };

?>


	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>G-Admin - <?php echo $_SESSION['nombre']; ?></title>
		<link rel="stylesheet" href="../../backend/style/style.css">
		<link rel="stylesheet" type="text/css" href="../../backend/external/css/foundation.css">
		<link rel="stylesheet" type="text/css" href="../../backend/external/css/foundation.min.css">
		<link rel="stylesheet" type="text/css" href="../../backend/external/css/normalize.css">
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

		<script src="../../backend/external/js/foundation.min.js"></script>
	</head>
	<body>



	<?php
		include '../backend/structure/menu.php';
	?>
	
	<div class="contentWp">
			
		<div class="content">
			

	<h2>Acciones</h2>

	<a href="<?php echo $router->generate("nuevoItem") ?>">Agregar nuevo proyecto</a>
	


	<h1>G-Portfolio</h1>
	<h2>sus proyectos...</h2>

	
	<div class="contItems">

     <?php include "/backend/services/itemsPortfolio/listarItems.php" ?>
	
	</div>

			</div>

		</div>
	</body>
	</html>


	<script>

	$(function(){

	

		$(document).on('click', '.ItemsPortfolioDelete', function(e) {

			var item = $(this);
			//alert("Estas seguro que querés eliminar " + item.attr("data-nombreItem") + " ?");

			$.ajax({

			  url: "../../backend/services/itemsPortfolio/eliminar.php",
			  data: {'idItem': item.attr("data-iditem")  },
		      type: "GET",

				success:function(data, textStatus, jqXHR){

		        	var respuesta = data;
		        	console.log(data);

		        	actualizarLista();

		        }

			});


		});

	actualizarLista();

	function actualizarLista(){

			$(".contItems").empty();

			$.ajax({

			  url: "../../backend/services/itemsPortfolio/listarItemsAjax.php",
			   dataType: 'json',
			  type: "GET",

				success:function(data){

		        	var respuestaAjax = data;
		        	console.log(respuestaAjax);
		        	numItems = respuestaAjax[0][0].cantItems;

					var i = 0;

					for(i=0; i<numItems; i++){

						$(".contItems").append('<div><p>'+ respuestaAjax[i][0].titulo + '</p></div>');
						$(".contItems").append('<div><a class="ItemsPortfolioDelete" data-nombreItem="'+respuestaAjax[i][0].titulo+'" data-idItem="'+respuestaAjax[i][0].idItem+'"href="#">Eliminar</a></div>');
						$(".contItems").append('<div><a class="ItemsPortfolioModify" data-nombreItem="'+respuestaAjax[i][0].titulo+'" data-idItem="'+respuestaAjax[i][0].idItem+'"href="modificar/'+respuestaAjax[i][0].idItem+'/'+respuestaAjax[i][0].titulo+'">Modificar / Agregar Fotos</a></div>');
						$(".contItems").append("<br/>");
					}

		        }

			});
	}

	





	});
	


	</script>
