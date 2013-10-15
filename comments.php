<div id="comments" itemscope="http://schema.org/Comment">

	<h2>
		<?php comments_number('Tous les commentaires&nbsp;(0)', 'Tous les commentaires&nbsp;(1)', 'Tous les commentaires&nbsp;(%)'); ?>
	</h2>

	<?php if ( have_comments() ) : ?>

		<ol id="all-comments">

			<?php wp_list_comments('type=comment&callback=portfolio_comment'); ?>

		</ol>


		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-above">
				<h1 class="assistive-text hidden"><?php _e( 'Comment navigation', 'portfolio' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Anciens commentaires', 'portfolio' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Commentaires r&eacute;cents &rarr;', 'portfolio' ) ); ?></div>
			</nav>
		<?php endif; // check for comment navigation ?>

	<?php 
		else :
	?>

		<p id="no_comment" itemprop="description">
			<?php _e('Il n\'y a aucun commentaire'); ?>
		</p>

	<?php endif; ?>

</div>

<?php comment_form(); ?>