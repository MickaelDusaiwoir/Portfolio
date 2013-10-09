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
            add_image_size('semi_smal', 300, 150, FALSE);
            add_image_size('semi_big', 460, 200, FALSE);
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
			'supports' => array('title', 'editor', 'thumbnail', 'post-formats', 'excerpt', 'comments')
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