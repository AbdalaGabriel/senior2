<div class="lateralMenu">
		
			<div class="menuWp">
				<h1><?php echo $_SESSION['nombre']; ?></h1>

				<nav>
				<ul>
					<li><a href= "<?php echo $router->generate("paginas") ?>" title="Páginas">Páginas</a></li>
					<li><a href= "<?php echo $router->generate("portfolio") ?>" title="Trabajos">Administrar Portfolio</a>	</li>
					<li><a href= "<?php echo $router->generate("blog") ?>" title="BLOG">Administrar BLOG</a></li>
					<li><a href= "<?php echo $router->generate("media") ?>" title="BLOG">Gestor Multimedia</a></li>
				</ul>
				</nav>

			</div>

			
			<div class="overLay"></div>

			<div class="color"><div id="effect"></div></div>
		</div>
