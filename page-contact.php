<?php 
	get_header(); 
?>

	<h1 class="hidden"><?php _e('Page du projet : '). the_title() ; ?></h1>

	<?php 
		include 'header_nav.php'; 
	?>

	<div id="container" role="main">

		<?php 
			include 'banner.php';
		?>

		

	</div>

<?php 
	get_footer(); 
?>