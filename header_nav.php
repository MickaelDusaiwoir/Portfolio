<header id="header" role="header">
	<div>
		<figure id="logo" itemscope itemprop="http://schema.org/Product" >
			<img src="http://placehold.it/120x60" alt="" itemprop="logo">
		</figure>
		<nav role="navigation" >
			
			<h2 class="hidden">
				Menu principal
			</h2>
			
			<?php 
			
				wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '' ) );

			?>
		
		</nav>
	</div>
</header>