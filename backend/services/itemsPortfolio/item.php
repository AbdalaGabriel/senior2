<?php
if(!isset($match)) { require 'classes/404.php'; die; };
include '../backend/classes/Conector.php';
include '../backend/classes/ItemsPortfolio.php';

$titPro = $match["params"]["titPro"];

$titPro = urldecode($titPro);

echo "hola";

echo $titPro;



if ($gestor = opendir('C:\xampp\htdocs\SENIOR\backend\services\itemsPortfolio\fotosPortfolio')) {
    while (false !== ($entrada = readdir($gestor))) {
        if ($entrada != "." && $entrada != "..") {
            echo '<img width="100" height="100" src="/SENIOR/backend/\services/itemsPortfolio/fotosPortfolio/'.$entrada.'" />'."\n"; //n significa enter en codigo fuente

            echo '<a href="borrarfotos.php?nombrefoto='.$entrada.'">borrar</a>';
        }
    }
    closedir($gestor);
}


?>     



