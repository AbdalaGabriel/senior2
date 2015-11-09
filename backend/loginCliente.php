<?php if(!isset($match)) { require 'classes/404.php'; die; }

?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	

<form id="form_pro" action="<?php echo $router->generate("clienteLogged") ?>" method="post">
	
    <label for="correo">E-mail </label>

	<input class="etiqueta" type="text" name="correo" id="correo" />
    
    <label for="clave">Contraseña</label>

	<input class="etiqueta" type="password" name="clave" id="clave" />
    
    <input type="submit" value="Login!" />


</form>

</body>
</html>