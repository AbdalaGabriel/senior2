<?php

if(!isset($match)) { require 'classes/404.php'; die; };


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BLOG - Administración</title>

<script src="http://cdn.rawgit.com/enyo/dropzone/master/dist/dropzone.js" ></script>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	
</head>
<body>
	<h1>G-Blog</h1>
	<h2>Bievenido</h2>

	<h3>Nueva entrada</h3>

	<a href="<?php echo $router->generate("nuevaEntrada") ?>">Crear nueva entrada.</a>
	

	<h3>Sus Entradas</h3>

	<div class="contItems">
	<?php include '\SENIOR\backend\services\blog\listarEntradas.php' ?>
	</div>

</body>
</html>

<script>

	$(function(){

	

		$(document).on('click', '.itemBlogDelete', function(e) {

			var item = $(this);
			//alert("Estas seguro que querés eliminar " + item.attr("data-nombreItem") + " ?");

			$.ajax({

			  url: "/SENIOR/backend/services/blog/eliminar.php",
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

			  url: "/SENIOR/backend/services/blog/listarEntradasAjax.php",
			  dataType: 'json',
			  type: "GET",

				success:function(data){

		        	var respuestaAjax = data;
		        	console.log(respuestaAjax);
		        	numItems = respuestaAjax[0][0].cantItems;

					var i = 0;

					for(i=0; i<numItems; i++){

						$(".contItems").append('<div><p>'+ respuestaAjax[i][0].titulo + '</p></div>');
						$(".contItems").append('<div><a class="itemBlogDelete" data-nombreItem="'+respuestaAjax[i][0].titulo+'" data-idItem="'+respuestaAjax[i][0].idItem+'"href="#">Eliminar</a></div>');
						$(".contItems").append('<div><a class="itemBlogModify" data-nombreItem="'+respuestaAjax[i][0].titulo+'" data-idItem="'+respuestaAjax[i][0].idItem+'"href="blog/modificar/'+respuestaAjax[i][0].idItem+'/'+respuestaAjax[i][0].titulo+'">Modificar / Agregar Fotos</a></div>');
						$(".contItems").append("<br/>");
					}

		        }

			});
	}

	





	});
	


	</script>