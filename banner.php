<div id="banner" role="banner">

	<!--  slider   -->

	<?php
	    $arg = array('post_type' => 'Travaux', 'posts_per_page' => 1, 'orderby' => 'rand');
	    $loop = new WP_query($arg);

	    if ($loop->have_posts()):
	        while ($loop->have_posts()):
	            $loop->the_post();
	            ?>
	                <a href="<?php the_permalink(); ?>" title="En savoir plus sur ' <?php the_title(); ?> '"><figure><?php the_post_thumbnail(); ?></figure></a>
	            <?php
	        endwhile;
	    else :
	    	?>
	    		<figure><img src="http://placehold.it/940x220" alt="" /></figure>
	    	<?php
	    endif;
    ?>

	<!-- <figure><img src="http://placehold.it/940x220" alt="" /></figure> -->

</div>