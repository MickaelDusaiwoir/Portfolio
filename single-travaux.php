<?php 
	get_header(); 
?>

	<h1 class="hidden"><?php _e('Page du projet : '). the_title() ; ?></h1>
	
	<?php 
		include 'header_nav.php'; 
	?>

	<div id="container" role="main">
		
		<?php
		    if (have_posts()):
		        while (have_posts()):
		            the_post();
		?>

					<article id="single_travaux" itemscope itemtype="http://schema.org/CreativeWork">
						
						<figure>
							
							<?php 
								$src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'light_box');
							?>

							<a href="<?php echo $src[0]; ?>" title="<?php _e('Voir l\'image dans sa taille d\'origine'); ?>" class="thumbnail" ><?php the_post_thumbnail( 'middle_img', array( 'itemprop' => 'image')); ?></a>

						</figure>

						<div id="col_right">

							<h2 itemprop="name">
								<?php the_title(); ?>
							</h2>
							
							<div itemprop="description">
								<?php the_content(); ?>
							</div>

							<?php include 'share.php'; ?>

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

	<?php include 'script-share.php'; ?>
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