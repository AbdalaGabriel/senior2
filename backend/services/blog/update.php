<?php
if(!isset($match)) { require 'classes/404.php'; die; };
include '../backend/classes/Conector.php';
include '../backend/classes/Entrada.php';




//$idItem = $match["params"]["idItem"];


if(isset( $_POST["titulo"] )) {

$titulo =  $_POST["titulo"];
$contenido =  $_POST["contenido"];
$idEntrada = $_POST["idEntrada"];

$itemsBlog = new Entrada();
$itemsBlog->idEntrada = $idEntrada;
$itemsBlog->titulo = $titulo;
$itemsBlog->contenido = $contenido;
$itemsBlog->Modificar();

echo "Entrada modificada correctamente,";

echo '<a href="';
echo $router->generate("blog");
echo '">Volver atrás</a>';

/*
echo " ¿Esta seguro que desea eliminar este proyecto?";
echo "</br>";
echo $itFila["titulo"];
*/




} else{

	echo "No llego nada";
}






?>