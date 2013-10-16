<?php 
	
	add_action( 'widgets_init', 'portfolio_widgets_init' );
	add_action( 'after_setup_theme', 'portfolio_setup' );	
	add_action( 'init', 'create_post_type' );

	function portfolio_widgets_init() {

		register_sidebar( array(
			'name' => __( 'Main Sidebar', 'portfolio' ),
			'id' => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Secondary Sidebar', 'portfolio' ),
			'id' => 'sidebar-2',
			'description' => __( 'Une description', 'portfolio' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

	}

	function portfolio_setup() {

		register_nav_menu( 'primary', __( 'Primary Menu', 'portfolio' ) );

		add_theme_support('post-thumbnails');

        if ( function_exists('add_image_size') ) {
            add_image_size('semi_small', 280, 250, FALSE);
            add_image_size('small_img', 290, 250, FALSE);
            add_image_size('middle_img', 450, 390, TRUE);
            add_image_size('light_box', 1360, 768, FALSE);
            add_image_size('banner', 940, 783, FALSE);
            set_post_thumbnail_size(940, 220, true);
        }

        add_theme_support('post-formats', array('aside', 'link', 'gallery', 'status', 'quote', 'image'));

	}

	function create_post_type() {

		register_post_type( 'Travaux',
			array(
				'labels' => array(
					'name' => __( 'Travaux' ),
					'singular_name' => __( 'Travaux' )
				),
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'thumbnail', 'post-formats', 'excerpt', 'comments'),
			'taxonomies' => array( 'category', 'post_tag' )
			)
		);

		register_post_type( 'Presentation',
			array(
				'labels' => array(
					'name' => __( 'Présentation' ),
					'singular_name' => __( 'presentation' )
				),
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'thumbnail', 'post-formats', 'excerpt', 'custom-fields')
			)
		);

	}

	if ( ! function_exists( 'portfolio_comment' ) ) :

		function portfolio_comment( $comment, $args, $depth ) { ?>
			
			<li class="comment">

				<figure>
					<img src="<?php echo( get_bloginfo('template_directory') ); ?>/images/icon_unknown.jpg" width="60" height="60" alt="Image de profil" title="Image de profil" />
				</figure>

				<p class="metadata">
					<span class="comment-author" itemprop="author"><?php comment_author() ?></span> <span class="comment-time" itemprop="datePublished"><?php comment_date(); ?></span>
				</p>

				<div class="comment-text" itemscope="description">
					<?php comment_text(); ?>
				</div>
			
			</li>			

			<?php
		}

	endif;

	add_action( 'init', 'create_Travaux_tax' );

	function create_Travaux_tax () {
		register_taxonomy(
			'techniques',
			'travaux',
			array(
				'label' => __( 'Techniques' ),
				'rewrite' => array( 'slug' => 'techniques' ),
				'hierarchical' => true,
			)
		);

		register_taxonomy(
			'cms',
			'travaux',
			array(
				'label' => __( 'CMS' ),
				'rewrite' => array( 'slug' => 'cms' ),
				'hierarchical' => true,
			)
		);
	}