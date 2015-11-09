<?php

include '../../classes/Conector.php';
include '../../classes/Entrada.php';




//$idItem = $match["params"]["idItem"];


if(isset( $_GET["idItem"] )) {

$idItem =  $_GET["idItem"];

$itemsBlog = new Entrada();
$itemsBlog->idEntrada = $idItem;
$itemsBlog->Eliminar();

//$itFila = $ItemsPortfolio->Listado[0];


echo "ok";

/*
echo " ¿Esta seguro que desea eliminar este proyecto?";
echo "</br>";
echo $itFila["titulo"];
*/




} else{

	echo "No llego nada";
}






?>