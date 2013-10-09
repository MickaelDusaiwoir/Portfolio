<?php 
	get_header(); 
?>

<?php 
	include 'header_nav.php'; 
?>

	<h1 class="hidden"><?php _e('Page d\'accueil'); ?></h1>

	<div id="container" role="main">

		<?php 
			include 'banner.php';
		?>
	
		<div id="presentation" >
			
			<?php

				// The Query
				$the_query = new WP_Query( array( 'post_type' => 'presentation', 'meta-key' => 'post_name', 'meta_value' => 'presentation' ) );

				// The Loop
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : 
						$the_query->the_post();
			?>
						<article class="post" id="<?php the_ID(); ?>">

							<h1 role="heading" aria-level="1" class="post-title">
								<?php the_title(); ?></a>
							</h1>

							<?php the_content(); ?>

						</article>				
			<?php
					endwhile;
					wp_reset_postdata();
				endif;			
			?>

				<ul id="skill">
					<li><span class="bar graphic-design"></span><h3>Graphic Design</h3></li>
					<li><span class="bar html-css"></span><h3>Html // Css</h3>
					<li><span class="bar jquery"></span><h3>jQuery</h3>
					<li><span class="bar wordpress"></span><h3>Wordpress</h3>
					<li><span class="bar codeignieter"></span><h3>CodeIgnieter</h3></li>
					<li><span class="bar drupal"></span><h3>Drupal</h3></li>
				</ul>

		</div>

		<div id="last_post" >

			<?php

				// The Query
				$the_query = new WP_Query( array( 'post_type' => 'Travaux' ) );

				// The Loop
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : 
						$the_query->the_post();
			?>
						<article class="post" id="<?php the_ID(); ?>">

							<figure>

								<?php the_post_thumbnail('semi_small'); ?>

							</figure>

							<div>

								<h1 role="heading" aria-level="1" class="post-title">
									<a href="<?php the_permalink(); ?>" title="Pour suivre la lecture de <?php the_title(); ?> " ><?php the_title(); ?></a>
								</h1>

								<?php the_content(); ?>

							</div>

						</article>				
			<?php
					endwhile;
					wp_reset_postdata();
				endif;			
			?>

		</div>

	</div>

<?php 
	get_footer(); 
?>