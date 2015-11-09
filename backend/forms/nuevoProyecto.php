<?php

include '../classes/Conector.php';
include '../classes/Proyecto.php';





?>

<div id="portfolio">
	<h2>Crear un nuevo proyecto</h2>
	
    <form method="post" action=""  enctype="multipart/form-data">
    	
        <label for="nombreProyecto">Nombre del Proyecto: </label> <br />
        <input type="text" name="nombreProyecto" id="nombreProyecto"  /><br />

        <label for="descripcionPro">Nombre del Proyecto: </label><br />
        <input  type="text" name="descripcionPro" id="descripcionPro"  value="inserte una descripcion" /><br />
        
    	 <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $filaUsuario["idUsuario"]?>" />
         <input type="submit" name="enviar" value="Crear proyecto"/><br />
       
    </form>
    
    
</div>



</body>
</html>