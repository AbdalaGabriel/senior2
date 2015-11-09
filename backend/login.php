<?php if(!isset($match)) { require 'classes/404.php'; die; }

?>

<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="../backend/style/style.css">
	<script src="../backend/js/function.js"></script>
</head>

<body>

<div class="wpLogin ">


	<div class="formWp">
	<div class="color"><div id="effect"></div></div>

		<form id="form_pro" action="<?php echo $router->generate("adminLogged") ?>" method="post" >
			
		    <label for="correo">E-mail </label>

			<input class="etiqueta" type="text" name="correo" id="correo" autocomplete="off"/>
		    
		    <label for="clave">Contrase&ntilde;a</label>

			<input class="etiqueta" type="password" name="clave" id="clave" autocomplete="off"/>
		    
		    <input class="submit" type="submit" value="Login!" />


		</form>

	</div>

</div>

</body>

</html>