<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cargar foto</title>

<style>
    .bar{
        width: 100%;
        background: grey;
        padding: 1em;
        margin: 1em;
       /* box-shadow: inset 0 1px 3px rgba(0,0,0,0.2);*/
        border-radius: 3px;

    }

    .fill{
        height: 20px;
        display: block;
        background: blue;
        width: 0;
        border-radius: 3px;

        transition:width 0.8s ease;
    }

    .textBar{
        padding: 1em;
        color:white;
    }
    
    .uploads a{
        display: block;
    }

</style>

</head>
<body>



<?php
/*if ($gestor = opendir('C:\xampp\htdocs\cargarfoto\fotos')) {
    while (false !== ($entrada = readdir($gestor))) {
        if ($entrada != "." && $entrada != "..") {
            echo '<img src="fotos/'.$entrada.'" />'."\n"; //n significa enter en codigo fuente

            echo '<a href="borrarfotos.php?nombrefoto='.$entrada.'">borrar</a>';
        }
    }
    closedir($gestor);
}*/
?>



<form action="upload.php" method="post" enctype="multipart/form-data" id="uploadForm">
    <fieldset>
        <legend>Subir fotos</legend>
        <input type="file" id="archivos" name="file[]" required multiple>
        <input type="submit" id="submit" name="submit" value="Subir">
    </fieldset>
    

    <div class="bar">
        <span id="pb" class="fill">
            <span class="textBar" id="pt">
                10%
            </span>
        </span>
    </div>

    <div id="uploads" class="uploads">
        Archivos subidos:

        <a href="">archivos</a>

        <p>Estos archivos no se subierson:</p>
        
        <span>archivos</span>

    </div>

</form>

<script src="js/upload.js"></script>
<script>

    var f = document.getElementById("archivos");
    var pb = document.getElementById("pb");
    var pt = document.getElementById("pt");

    document.getElementById("submit").addEventListener('click', function(e){
        e.preventDefault();//prevenimos el comporatmiento default, que salga a buscar upload.php por action, para que procese pro ajax.
        console.log("clikeado!");
  
        app.uploader({
            archivos: f,
            barraProgreso: pb,
            textoProgreso: pt,
            procesador: 'upload.php',

            finished: function(data){
                console.log(data);
            },

            error: function(){
                console.log("not working");
            }

        });
    });

</script>
	
</body>
</html>