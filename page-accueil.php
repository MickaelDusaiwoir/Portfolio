<?php 
	get_header(); 
?>

<?php 
	include 'header_nav.php'; 
?>

	<h1 class="hidden" role="heading" aria-level="1"><?php _e('Page d\'accueil'); ?></h1>

	<div id="container" role="main">

		<?php 
			include 'banner.php';
		?>
	
		<section id="presentation" >

			<h1 class="hidden" role="heading" aria-level="1"><?php _e('Je me présente'); ?></h1>
			
			<?php

				// The Query
				$the_query = new WP_Query( array( 'post_type' => 'presentation', 'meta-key' => 'post_name', 'meta_value' => 'presentation') );

				// The Loop
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : 
						$the_query->the_post();
			?>
						<article class="post" id="<?php the_ID(); ?>" itemscope itemprop="http://schema.org/BlogPosting" >

							<h1 role="heading" aria-level="1" class="post-title" itemprop="name">
								<?php the_title(); ?></a>
							</h1>
							
							<div itemprop="description">

								<?php the_content(); ?>

							</div>

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

		</section>

		<section id="last_post" >

			<h1 role="heading" aria-level="1"><?php _e('Mes derniers travaux'); ?></h1>

			<?php

				// The Query
				$the_query = new WP_Query( array( 'post_type' => 'Travaux', 'posts_per_page' => 3  ) );

				// The Loop
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : 
						$the_query->the_post();
			?>
						<article class="post" id="<?php the_ID(); ?>" itemscope itemprop="http://schema.org/BlogPosting">

							<figure>

								<?php the_post_thumbnail('semi_small', array( 'itemprop'=> 'image' ) ); ?>

							</figure>

							<div>

								<h2 role="heading" aria-level="1" class="post-title" itemprop="name">
									<a href="<?php the_permalink(); ?>" title="Pour suivre la lecture de <?php the_title(); ?>" itemprop="url" ><?php the_title(); ?></a>
								</h2>								

								<div itemprop="description">

									<?php the_content(); ?>

								</div>

							</div>

						</article>				
			<?php
					endwhile;
					wp_reset_postdata();
				endif;			
			?>

		</section>

	</div>

<?php 
	get_footer(); 
?>