<?php 
	get_header(); 
?>

<?php 
	include 'header_nav.php'; 
?>

	<h1 class="hidden"><?php _e('Page du projet : '). the_title() ; ?></h1>

	<div id="container" role="main">

		<?php 
			include 'banner.php';
		?>
		
		<?php
		    if (have_posts()):
		        while (have_posts()):
		            the_post();
		?>

					<article id="single_travaux">
						
						<figure>
							
							<?php 
								$src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
							?>

							<a href="<?php echo $src[0]; ?>" title="<?php _e('Voir l\'image dans sa taille d\'origine'); ?>"><?php the_post_thumbnail( 'middle_img', array( 'itemprop'=> 'image' )); ?></a>

						</figure>

						<div>

							<h2>
								<?php the_title(); ?>
							</h2>
							
							<?php the_content(); ?>

						</div>

					</article>

		<?php
		        endwhile;
		    endif;
	    ?>

	</div>

<?php 
	get_footer(); 
?>