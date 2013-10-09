<?php 
	get_header(); 
?>

<?php 
	include 'header_nav.php'; 
?>

	<div id="container" role="main">

		<?php 
			include 'banner.php';
		?>
	
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
			else:
				//no post found
			endif;			
		?>


	</div>

<?php 
	get_footer(); 
?>