<?php

include '../../classes/Conector.php';
include '../../classes/ItemsPortfolio.php';




//$idItem = $match["params"]["idItem"];


if(isset( $_GET["idItem"] )) {

$idItem =  $_GET["idItem"];

$ItemsPortfolio = new ItemsPortfolio();
$ItemsPortfolio->idItem = $idItem;
$ItemsPortfolio->EliminarItem();

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