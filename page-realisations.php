<?php 
	get_header(); 
?>

	<h1 class="hidden"><?php _e('Page travaux'); ?></h1>

	<?php 
		include 'header_nav.php'; 
	?>

	<div id="container" role="main">

		<?php 
			include 'banner.php';
		?>

		<div id="portfolio">
				
				<?php


					$i = 1;
					$u = 1;

					// The Query
					$the_query = new WP_Query( array( 'post_type' => 'Travaux' ) );

					// The Loop
					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) : 
							$the_query->the_post();
				?>
							
							<?php

								if ( $i <= 3 ) :

							?>

								<a href="<?php the_permalink(); ?>" class="small_img <?php echo ('small_img_'.$i); ?>" itemscope itemtype="http://schema.org/CreativeWork" itemprop="url" title="Voir l'entièreter du projet : <?php the_title(); ?>" >
									<article>

									  <?php the_post_thumbnail('small_img', array( 'itemprop'=> 'image' ) ); ?>

									  <h2 itemprop="name"><?php the_title(); ?></h2>

									</article></a>

							<?php 

								$i++;

								else :									
							?>

								<a href="<?php the_permalink(); ?>" class="middle_img <?php echo ('middle_img_'.$u); ?>" itemscope itemprop="http://schema.org/CreativeWork" itemprop="url" title="Voir l'entièreter du projet : <?php the_title(); ?>" >
									<article>

									  <?php the_post_thumbnail('middle_img', array( 'itemprop'=> 'image' ) ); ?>

									  <h2 itemprop="name"><?php the_title(); ?></h2>

									</article></a>


							<?php 

								$u = $u > 2 ? 1 : $u ;
								$i = $u == 2 ? 1 : $i ;
								$u++;

								endif;
							?>

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