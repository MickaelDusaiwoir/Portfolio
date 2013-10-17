<?php 
	get_header(); 
?>

	<h1 class="hidden"><?php the_title() ; ?></h1>

	<?php 
		include 'header_nav.php'; 
	?>

	<div id="container" role="main">

		<div id="contact">

			<h2>
				Pour me contacter&nbsp;? C'est ici&nbsp;!
			</h2>

			<?php 

				include "form_contact.php";

			?>

		</div>

	</div>

<?php 
	get_footer(); 
?>