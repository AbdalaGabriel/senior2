<?php

session_start();




define('BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/SENIOR/frontend/');

require '../backend/classes/AltoRouter.php';
$router = new AltoRouter();
$router->setBasePath('/SENIOR/frontend');


//Index


$router->map('GET|POST','/', 'home.php');



//BACKEND 

$router->map('GET|POST','/admin', '../backend/login.php', 'admin');
$router->map('GET|POST','/G-admin', '../backend/indexBE.php', 'adminLogged');


	// Items portfolio 
	
	$router->map('GET|POST','/G-admin/portfolio', '../backend/imagenesPortfolio.php', 'portfolio');
	$router->map('GET|POST','/G-admin/alta-item', '../backend/services/itemsPortfolio/altaItemProject.php', 'altaItemProject');
	$router->map('GET|POST','/G-admin/alta-item/subirfoto', '../backend/services/itemsPortfolio/uploads.php', 'subirfotos');
	$router->map('GET|POST','/G-admin/services/listarItems', '../backend/services/itemsPortfolio/listarItems.php', 'listarItems');
	$router->map('GET|POST','/G-admin/portfolio/nuevo', '../backend/services/itemsPortfolio/nuevo.php', 'nuevoItem');
	$router->map('GET|POST','/G-admin/portfolio/[*:titPro]/', '../backend/services/itemsPortfolio/item.php', 'itemPortfolio');
	$router->map('GET|POST','/G-admin/modificar/[*:idItem]/[*:titPro]', '../backend/services/itemsPortfolio/modificarItem.php', 'modificarItem');
	$router->map('GET|POST','/G-admin/modificar/[*:idItem]/[*:titPro]', '../backend/services/itemsPortfolio/borrarItem.php', 'borrarItem');

	//$router->map('GET|POST','/G-admin/services/eliminarItems', '../backend/services/itemsPortfolio/eliminar.php', 'eliminarItems');




	//$router->map('GET|POST','/G-admin/services/eliminarItems/[i:idItem]', '../backend/services/itemsPortfolio/eliminar.php', 'eliminarItems');


	// Páginas

	$router->map('GET|POST','/G-admin/paginas', '../backend/services/loadPage.php', 'paginas');
	$router->map('GET|POST','/G-admin/proyectos', '../backend/services/listarProyectos.php', 'proyectos');
	$router->map('GET|POST','/G-admin/nueva-pagina', '../backend/services/newPage.php', 'nuevaPag');
	$router->map('GET|POST','/G-admin/alta-pagina', '../backend/services/altaPag.php', 'altaPag');
	

	// Bloques

	$router->map('GET|POST','/G-admin/nuevo-bloque', '../backend/services/newBlock.php', 'nuevoBloque');
	$router->map('GET|POST','/G-admin/alta-bloque', '../backend/services/altaBlock.php', 'altaBlock');


   // Clientes

	$router->map('GET|POST','/clientes', '../backend/loginCliente.php', 'clienteLog');
	$router->map('GET|POST','/G-client', '../backend/clienteBe.php', 'clienteLogged');

	$router->map('GET|POST','/G-client/entrega', '../backend/loadEntrega.php', 'entregas');
	$router->map('GET|POST','/G-client/tareas', '../backend/loadTareas.php', 'tareas');


	// BLOG 
	
	$router->map('GET|POST','/G-admin/blog', '../backend/services/blog/blogpage.php', 'blog');
	$router->map('GET|POST','/G-admin/blog/nueva-entrada', '../backend/services/blog/new.php', 'nuevaEntrada');
	$router->map('GET|POST','/G-admin/blog/nueva-entrada/alta', '../backend/services/blog/altaNuevaEntrada.php', 'altaNuevaEntrada');
	$router->map('GET|POST','/G-admin/blog/listar', '../backend/services/blog/listarEntradas.php', 'listarEntradas');
	$router->map('GET|POST','/G-admin/blog/listarHome', '../backend/services/blog/listarEntradasHome.php', 'listarEntradasHome');
	$router->map('GET|POST','/G-admin/blog/[*:idBlog]/[*:titBlog]/', '../backend/services/blog/entrada.php', 'entradaBlog');
	$router->map('GET|POST','/G-admin/blog/modificar/[*:idBlog]/[*:titBlog]', '../backend/services/blog/modificar.php', 'modificarEntrada');
	$router->map('GET|POST','/G-admin/blog/modificar/ok', '../backend/services/blog/update.php', 'updateEntrada');


	// MULTIMEDIA

	$router->map('GET|POST','/G-admin/media', '../backend/services/media/media.php', 'media');
	$router->map('GET|POST','/G-admin/media/subir', '../backend/services/media/mediaSubir.php', 'mediaSubir');


//FRONTEND


$router->map('GET|POST','/pagina', 'page.php', 'pagina');




$match = $router->match();

if($match)
{
    require $match['target'];
}
else
{
    require '../backend/classes/404.php';
}
?>



