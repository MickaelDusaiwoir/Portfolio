<div id="comments" itemscope="http://schema.org/Comment">

	<h2>
		<?php comments_number('Tous les commentaires&nbsp;(0)', 'Tous les commentaires&nbsp;(1)', 'Tous les commentaires&nbsp;(%)'); ?>
	</h2>

	<?php if ( have_comments() ) : ?>

		<ol id="all-comments">

			<?php 
				while ( have_comments() ) : the_comment();
			?>
				
				<li class="comment" >

					<figure>
						<img src="<?php echo( get_bloginfo('template_directory') ); ?>/images/icon_unknown.jpg" width="60" height="60" alt="Image de profil" title="Image de profil" />
					</figure>

					<p class="metadata">
						<span class="author" itemprop="author"><?php comment_author() ?></span> <span class="time" itemprop="datePublished"><?php comment_date(); ?></span>
					</p>

					<div class="comment-text" itemscope="description">
						<?php comment_text(); ?>
					</div>

				</li>

			<?php 
				endwhile;
			?>

		</ol>

	<?php 
		else :
	?>

		<p id="no_comment" itemprop="description">
			<?php _e('Il n\'y a aucun commentaire'); ?>
		</p>

	<?php endif; ?>

</div>

<?php comment_form(); ?>