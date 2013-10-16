<?php 
	get_header(); 
?>

<?php 
	include 'header_nav.php'; 
?>

	<h1 class="hidden"><?php _e('Page du projet : '). the_title() ; ?></h1>

	<div id="container" role="main">
		
		<?php
		    if (have_posts()):
		        while (have_posts()):
		            the_post();
		?>

					<article id="single_travaux">
						
						<figure>
							
							<?php 
								$src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'light_box');
							?>

							<a href="<?php echo $src[0]; ?>" title="<?php _e('Voir l\'image dans sa taille d\'origine'); ?>" class="thumbnail" ><?php the_post_thumbnail( 'middle_img', array( 'itemprop' => 'image')); ?></a>

						</figure>

						<div id="col_right">

							<h2>
								<?php the_title(); ?>
							</h2>
							
							<?php the_content(); ?>

						</div>

						<div id="container_comment" >

					    	<?php comments_template( '', true ); ?>

						</div>

					</article>

		<?php
		        endwhile;
		        wp_reset_postdata();
		    endif;
	    ?>

	</div>

	<script type="text/javascript" src="<?php echo( get_bloginfo('template_directory') ); ?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo( get_bloginfo('template_directory') ); ?>/js/jquery.heplbox.js"></script>
	<script>
        jQuery( function() {
            jQuery( '#single_travaux a.thumbnail' ).heplbox();
        } );
    </script>

<?php 
	get_footer(); 
?>