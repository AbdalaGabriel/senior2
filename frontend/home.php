

<?php if(!isset($match)) { require 'classes/404.php'; die; 


};?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gabriel Abdala - Diseño Multimedial</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" href="style/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
</head>

<body>
<header>
	
	<div class="logoWp">
		<h1 class="logo">Gabriel Abdala</h1>
	</div>

	<div class="menuTrigger">
			<a id="trigMenu" href="#">Menú</a>
		</div>

		<div class="menu">
		<nav>
			<ul>
				<?php	include '../backend/services/loadPage.php';	?>

			</ul>
		</nav>
	</div>

</header>

<main class="reset">
	
	<section id="mainPage"  class="page reset">
		<h2 class="reset mainTitle">Code, design and 3D</h2>
		<a class="goDown" href="">Go down</a>
	</section>

	<section class="page reset">
			
		<section id="trabajos"  class="medium-7 columns seccionInside">

			<h2 class="reset"> Latest Works</h2>

			<div class="gGrid">
					
				<article class="medium-6 columns"><a href="#"><img src="/img/foto1.jpg" alt=""></a></article>
				<article class="medium-6 columns"><a href="#"><img src="/img/foto1.jpg" alt=""></a></article>
				<article class="medium-6 columns"><a href="#"><img src="/img/foto1.jpg" alt=""></a></article>
				<article class="medium-6 columns"><a href="#"><img src="/img/foto1.jpg" alt=""></a></article>


			</div>

		</section>
		

		<section id="noticias" class="medium-5 columns seccionInside">

			<h2 class="reset">Latest Notes</h2>

			<?php

				include 'C:\xampp\htdocs\SENIOR\backend\services\blog/listarEntradasHome.php';

				?>


		</section>



	</section>


</main>

<footer class="reset">
	<h2 class="reset">G</h2>
</footer>

  
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
